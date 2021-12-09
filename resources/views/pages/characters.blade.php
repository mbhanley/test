@extends('layouts.app')

@section('content')

<div class="container">
<div class="row align-items-center">


  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <th scope="col">Picture</th>
          <th scope="col">Name</th>
          <th scope="col">Species</th>
          <th scope="col">Origin</th>
          </tr>
    </thead>
    <tbody>
@foreach ($get_characters as $item)


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

if (request()->route('id') > 1) {
$pageno = request()->route('id');
} else {
$pageno = 1;
}



$total_pages = $get_characters_info['pages'];

echo '
<div class="container border-top">
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
          <a class="page-link" href="'.($pageno - 1).'" aria-label="Next">
            <span aria-hidden="true"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Prev</span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
}

if($pageno >= $total_pages) { 
  echo '<li class="disabled page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">Next&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
} 
else { 
  echo '<li class="page-item">
          <a class="page-link" href="'.($pageno + 1).'" aria-label="Next">
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