<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
  public function api1(Request $request){


    $userquery=$request->userquery;

    $url = "https://api.foursquare.com/v2/venues/search?client_id=GK3LUJWIJGJ32MOGVY2CKRS01CT5R2ONQJJAJOPVJ5HERXZ1&client_secret=X4M34R40GMMTKFJ0MXBQ3P4E4Z2KEI3RHMXDBQGAYIGJWSJB&v=20180323&limit=12&ll=40.99908,28.87386&radius=10000&query=cafe";


    $json = file_get_contents($url);
    $elements = json_decode($json,true);

    $collection=Http::get('https://api.foursquare.com/v2/venues/search', [
      'client_id' => 'GK3LUJWIJGJ32MOGVY2CKRS01CT5R2ONQJJAJOPVJ5HERXZ1',
      'client_secret' => 'X4M34R40GMMTKFJ0MXBQ3P4E4Z2KEI3RHMXDBQGAYIGJWSJB',
      'limit' => 22,
      'radius' => 500,
      'v' => 20180323,
      'll' => '40.99908,28.8738',
      'query' => $userquery,
    ])->json(['response','venues']);


          $json2=json_encode($collection);

          //dump($collection);

          return view('places', ['collection'=>$collection]);

  }


  public function details($id){
    $collection=Http::get('https://api.foursquare.com/v2/venues/'.$id, [
      'client_id' => 'GK3LUJWIJGJ32MOGVY2CKRS01CT5R2ONQJJAJOPVJ5HERXZ1',
      'client_secret' => 'X4M34R40GMMTKFJ0MXBQ3P4E4Z2KEI3RHMXDBQGAYIGJWSJB',
      'v' => 20180323,
    ])->json(['response','venue']);



    return view('details',['place' => $collection]);
  }



}
