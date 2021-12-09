@extends('layouts.app')

@section('content')


@php
/*
TODO: 
Make search input field and use typeahead to display clickable search results redirecting to, 
character/id. 
*/
@endphp


<div class="container">
<div class="row align-items-center">


  <table class="table table-striped" id="table_id">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Species</th>
        <th scope="col">Origin</th>
      </tr>
    </thead>
    <tbody>
@foreach ($get_all_characters as $item)
        <tr>
        <td class="align-middle w-25"><a href="/character/{{$item['id']}}"> <img src="{{$item['image']}}" alt="{{$item['name']}}" class="w-25 p-0 img-fluid"> </a></td>
        <td class="align-middle"><a href="/character/{{$item['id']}}"> {{$item['name']}}</a></td>
        <td class="align-middle">{{$item['species']}}</td>
        <td class="align-middle">{{$item['origin']['name']}}</td>
        </tr>
@endforeach 
</tbody>
</table>



@php
{{
/*
TODO: 
Needs error handling for instance if I go to url; /page/4twt 
This should be redirected back or show error 404. 
Same if I go to a non Key value for instance /page/4735623 
This should also return to a 404 page or redirect back with error custom message. 
*/



/*
Check if a page number exists, if greater than 1 then get the page route id so it can passed to 
pagination and increment/decremented. 
*/
if ( request()->route('id') > 1 ) {
$pageno = request()->route('id');
} else {
$pageno = 1;
}

/*
Store a rounded number in variable $total_pages after calculating total objects divided by page total
*/
$total_pages = ceil($get_all_characters_info['count'] / $get_all_characters_info['pages']);



echo '
<div class="container border-top text-center">
<div class="row align-items-center pt-4 pb-4">
<nav aria-label="Page navigation example">
<ul class="pagination">';


  if($pageno <= 1) { 
  echo '<li class="disabled page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Prev</span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
  
} 
else { 

echo '<li class="page-item">
          <a class="page-link" href="page/'.($pageno - 1).'" aria-label="Next">
            <span aria-hidden="true"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Prev</span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
}
/*
Using request object route method; request()->route('id') 
to determine current $pageno number and then finding if $total_pages 
equal or greater so we can end the pagination link
*/
if($pageno >= $total_pages) { 
  echo '<li class="disabled page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&Next&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
} 
/*
If $total_pages is not equal or greater we can continue to increment pagination link
*/
else { 
  echo '<li class="page-item">
          <a class="page-link" href="page/'.($pageno + 1).'" aria-label="Next">
            <span aria-hidden="true">Next&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </li>';

}

echo'
</li>
</ul>
</nav>
</div>
</div>';


}}
@endphp




</div>
</div>
@endsection