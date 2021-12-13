<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssController extends Controller
{
    public function index(){
        return view('index');
    }

    public function locator(){
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544');
        $location = json_decode($response->getBody(), true);
        // dd($location);

        return view('locator.index')->with(compact('location'));
    }

    public function search(Request $request){

        $requested_date = new \DateTime($request->date);
        $locations_before = collect();
        $locations_after = collect();
        $times_before = collect();
        $times_after = collect();

        //TO GET TIME AND LOCATIONS AFTER EVERY 10 MINUTES

        $date = new \DateTime($request->date);
        $round= 10;
        for($count = 0; $count < $round ; $count++){
            $date->modify("+10 minutes");
            $times_after->push([
                'masa' => $date->format('H:i A, j F Y'),
                'timestamp' => strtotime($date->format('H:i:s')),
            ]);
        }



        foreach($times_after as $after){
            $url = new \GuzzleHttp\Client();
            $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='. $after['timestamp']);
            $location = json_decode($response->getBody(), true);


            $locations_after->push([
                'masa' => $after['masa'],
                'timestamp' => $after['timestamp'],
                'longitude' => $location[0]['longitude'],
                'latitude' => $location[0]['latitude'],
            ]);

        }

        // dd($locations_after);

        //TO GET TIME AND LOCATIONS BEFORE EVERY 10 MINUTES

        $date = new \DateTime($request->date);
        $round= 10;
        for($count = 0; $count < $round ; $count++){
            $date->modify("-10 minutes");
            $times_before->push([
                'masa' => $date->format('H:i A, j F Y'),
                'timestamp' => strtotime($date->format('H:i:s')),
            ]);
        }

        foreach($times_before as $before){
            $url = new \GuzzleHttp\Client();
            $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='. $before['timestamp']);
            $location = json_decode($response->getBody(), true);

            $longitude = $location[0]['longitude'];
            $latitude = $location[0]['latitude'];

            $locations_before->push([
                'masa' => $before['masa'],
                'timestamp' => $before['timestamp'],
                'longitude' => $longitude,
                'latitude' => $latitude,
            ]);

        }

        // dd($locations_before);

        //TO GET TIME AND LOCATIONS FOR INPUT
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='. strtotime($request->date));
        $location_input = json_decode($response->getBody(), true);


        // dd($location_input[0]['longitude']);

        return view('locator.result')->with(compact('locations_before', 'locations_after', 'location_input', 'requested_date'));
    }

    public function map(Request $request){

        // dd($request);
        $location_at = json_decode($request->location_at)[0];
        $locations_before = json_decode($request->locations_before);
        $locations_after = json_decode($request->locations_after);
        // dd($locations_before);

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
