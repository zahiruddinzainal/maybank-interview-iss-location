<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssController extends Controller
{
    public function index(){
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544');
        $location = json_decode($response->getBody(), true);
        dd($location);

        return view('index')->with(compact('location'));
    }
}
