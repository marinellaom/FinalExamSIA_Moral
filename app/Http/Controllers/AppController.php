<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class AppController extends Controller
{
    
    public function list(Request $request){

      $value1 = $request->input("q");
      $value2 = $request->input("language");

      if(is_null($request)){
        $data = Http::get("http://dataservice.accuweather.com/locations/v1/cities/search?apikey=cnreQTFUZEOeU0yu0mndVtduPTfKNDW6&q=Batangas&language=en-us&details=false")->json();
        return view("welcome", ['data'=>$data]);
      }

      
      $data = Http::get("http://dataservice.accuweather.com/locations/v1/cities/search?apikey=cnreQTFUZEOeU0yu0mndVtduPTfKNDW6&q=$value1&language=$value2&details=false")->json();
      
      return view("welcome", ['data'=>$data]);
    }
}
