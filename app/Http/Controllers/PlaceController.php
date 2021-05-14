<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Config;

class PlaceController extends Controller
{
  public function api1(Request $request){

    $key = config('services.api.id');
    $server = config('services.api.server');

    $userquery=$request->userquery;

    $collection=Http::get('https://api.foursquare.com/v2/venues/search', [
      'client_id' => $key,
      'client_secret' => $server,
      'limit' => 22,
      'radius' => 500,
      'v' => 20180323,
      'll' => '40.99908,28.8738',
      'query' => $userquery,
    ])->json(['response','venues']);
    echo config('ip.id');

          //dd($collection);

          return view('places', ['collection'=>$collection]);

  }


  public function details($id){

    $key = config('services.api.id');
    $server = config('services.api.server');

    $collection=Http::get('https://api.foursquare.com/v2/venues/'.$id, [
      'client_id' => $key,
      'client_secret' => $server,
      'v' => 20180323,
    ])->json(['response','venue']);



    return view('details',['place' => $collection]);
  }



}
