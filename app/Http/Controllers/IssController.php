<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class IssController extends Controller
{
    public function index(){
        return view('index');
    }

    public function locator(){
        return view('locator.index');
    }

    public function search(Request $request){

        $requested_date = new \DateTime($request->date);

        //TO GET TIME AND LOCATIONS FOR REQUESTED TIME
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/satelite/25544/timestamp/'. $request->date);
        $location_input = json_decode($response->getBody(), true);

        //TO GET TIME AND LOCATIONS BEFORE EVERY 10 MINUTES
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/before/satelite/25544/timestamp/'. strtotime($request->date));
        $locations_before = json_decode($response->getBody(), true);

        //TO GET TIME AND LOCATIONS AFTER EVERY 10 MINUTES
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/after/satelite/25544/timestamp/'. strtotime($request->date));
        $locations_after = json_decode($response->getBody(), true);

        return view('locator.result')->with(compact('requested_date', 'location_input', 'locations_before', 'locations_after'));
    }

    public function visualizer(){

        $now = Carbon::now()->format('H:i:s d-m-Y');

        //TO GET TIME AND LOCATIONS FOR REQUESTED TIME
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/satelite/25544/timestamp/'. $now);
        $location_at = json_decode($response->getBody(), true);

        //TO GET TIME AND LOCATIONS BEFORE EVERY 10 MINUTES
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/before/satelite/25544/timestamp/'. strtotime($now));
        $locations_before = json_decode($response->getBody(), true);

        //TO GET TIME AND LOCATIONS AFTER EVERY 10 MINUTES
        $url = new \GuzzleHttp\Client();
        $response = $url->get('http://api.test/api/after/satelite/25544/timestamp/'. strtotime($now));
        $locations_after = json_decode($response->getBody(), true);

        return view('visualizer.index')->with(compact('now', 'location_at', 'locations_before', 'locations_after'));
    }


    public function map(Request $request){
        $location_at = json_decode($request->location_at)[0];
        $locations_before = json_decode($request->locations_before);
        $locations_after = json_decode($request->locations_after);
        return view('locator.map')->with(compact('location_at', 'locations_before', 'locations_after'));
    }

    public function more(){
        return view('more.index');
    }

    public function apod(){
        $api_key = 'haQeCa13UlufBW7H8LCzm2NgSX9ZTGEYv1Ciu2uf';
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.nasa.gov/planetary/apod?api_key='. $api_key);
        $data = json_decode($response->getBody(), true);
        // dd($data);
        return view('more.apod')->with(compact('data'));
    }

    public function mars(){
        $api_key = 'haQeCa13UlufBW7H8LCzm2NgSX9ZTGEYv1Ciu2uf';
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.nasa.gov/insight_weather/?api_key='. $api_key.'&feedtype=json&ver=1.0');
        $data = json_decode($response->getBody(), true);
        // dd($data);
        return view('more.mars')->with(compact('data'));
    }

    
}
