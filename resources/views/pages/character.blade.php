@extends('layouts.app')

@section('content')

<div class="container">
<div class="row align-items-center pt-4 pl-0 pr-0">
<div class="col-md-3 text-left pl-0">
<button onclick="history.back()" class="btn btn-outline-primary rounded-0"><i class="fas fa-chevron-left"></i> Back</button>
</div>
<div class="col-md-6 text-center">
&nbsp;
</div>
<div class="col-md-3 text-right">
&nbsp;
</div>
</div>



<div class="row pt-4 pl-0 pr-0">
<div class="col-md-4 p-0 d-inline-block pr-lg-2 pr-md-2 p-sm-0 p-xs-0">
<div class="col-md-12 p-0 py-1 text-center bg-dark text-white"><h3>{{$get_character['name']}}</h3></div>
<div class="col-md-12 p-0"><img src="{{$get_character['image']}}" alt="{{$get_character['name']}}" class="img-fluid w-100 h-100 p-0"></div>
</div>

<div class="col-md-8 pl-0 pr-0 d-inline-block">
    <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th colspan="3" class="w-100">Character Details</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{$get_character['name']}}</td>
                <td> &nbsp; </td>
              </tr>
          <tr>
            <td>Status</td>
            <td>{{$get_character['status']}}</td>
            <td> &nbsp; </td>
          </tr>
          <tr>
            <td>Species</td>
            <td>{{$get_character['species']}}</td>
            <td> &nbsp; </td>
          </tr>
          <tr>
            <td>Type</td>
            <td>{{$get_character['type']}}</td>
            <td> &nbsp; </td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>{{$get_character['gender']}}</td>
            <td> &nbsp; </td>
          </tr>
          <tr>
            <td>Origin</td>
            <td>{{$get_character['origin']['name']}}</td>
            <td> &nbsp; </td>
          </tr>
          <tr>
            <td>Location</td>
            <td>{{$get_character['location']['name']}}</td>
            <td> &nbsp; </td>
          </tr>
        </tbody>
    </table>
</div>


</div>
</div>

<div class="container">
<div class="row align-items-center p-0">
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">Episodes</th>
</tr>
</thead>
<tbody>


  @php
  /*
  TODO: 
  Get episode data such as; name, episode, air_date 
  */
  @endphp
  
@foreach($get_character['episode'] as $episode)
<tr>
<td>{{ $episode }}</td>
</tr>
@endforeach




</tbody>
</table>
</div>
</div>



@endsection