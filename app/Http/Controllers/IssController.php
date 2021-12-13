<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssController extends Controller
{
    public function index(){
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544');
        $location = json_decode($response->getBody(), true);
        // dd($location);

        return view('index')->with(compact('location'));
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

            $locations_before->push([
                'masa' => $before['masa'],
                'timestamp' => $before['timestamp'],
                'longitude' => $location[0]['longitude'],
                'latitude' => $location[0]['latitude'],
            ]);

        }

        // dd($locations_before);

        //TO GET TIME AND LOCATIONS FOR INPUT
        $url = new \GuzzleHttp\Client();
        $response = $url->get('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='. strtotime($request->date));
        $location_input = json_decode($response->getBody(), true);


        // dd($location_input[0]['longitude']);

        return view('result')->with(compact('locations_before', 'locations_after', 'location_input', 'requested_date'));
    }
}
