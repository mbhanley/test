<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;




class FetchApiController extends Controller {

/*
SUMMARY: initially I was going to use cURL for better file handling but after using 
json_decode to create arrays Laravel did not like this and was proving difficult 
to pass over to the page view. 

After some reseach I found out that Guzzle features have been implimented into Laravel 8 
https://laravel.com/docs/8.x/http-client 

Illuminate\Http\Client\Response 
Allowing access to JSON response data directly. 
return Http::dd()->get('https://rickandmortyapi.com/api/character');

As for access/auth tokens there are none set on the public Api and I did not import data into a DB 
but rather use the raw JSON collected data to save time. 
*/


/*
Gets object results from info & results, JSON response to be displayed on index url 
Index file: ( views/pages/api.blade.php )
*/
  public function get_all_characters(){
    $get_all_characters = Http::get('https://rickandmortyapi.com/api/character');
    $get_all_characters->json();
    return view('pages.api')->with(
      [
      'get_all_characters_info' => $get_all_characters['info'], 
      'get_all_characters' => $get_all_characters['results']
      ]
    );

  }


/*
Gets results from JSON response to be displayed on /character/id url 
*/
  public function get_character($id){
    $get_character = Http::get('https://rickandmortyapi.com/api/character/'.$id);
    $get_character->json();
    return response()->view('pages.character', compact('get_character'));
    
  }


/*
Gets objects info & results from JSON response to be displayed on /page/id url 
*/
  public function get_characters($id){
    $get_characters = Http::get('https://rickandmortyapi.com/api/character/?page='.$id);
    $get_characters->json();
    return view('pages.characters')->with(
      [
      'get_characters_info' => $get_characters['info'], 
      'get_characters' => $get_characters['results']
      ]
    );

  }


/*
TODO: 
Show residents on page in a table with photo and link back to character, 
also make clickable residents link on the character page. 
*/
  public function get_character_locations($id){
    $get_character_locations = Http::get('https://rickandmortyapi.com/api/location/'.$id);
    $get_character_locations->json();

    return response()->view('pages.locations', compact('get_character_locations'));
  }

  
/*
TODO: 
Get episode by fetching returned episode url results and starting a new request in a 
for loop to get episode data such as S01E2 etc.
*/
  public function get_character_episodes($id){
    $get_character_episodes = Http::get('https://rickandmortyapi.com/api/episode/'.$id);
    $get_character_episodes->json();

    return response()->view('pages.character', compact('get_character_episodes'));
  }


 } 

