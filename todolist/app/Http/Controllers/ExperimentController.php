<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ExperimentController extends Controller
{
    public function index()
    {
        return view('experiments.index');
    }

    public function test()
    {
        return view('experiments.chat');
    }

    public function test2()
    {
        return view('experiments.test2');
    }

    // api for weather page

    public function weather(Request $request)
    {

        $city = $request->input('city' , '');
        $weather = null;

        if ($city) {
            $apiKey = env('OPENWEATHER_API_KEY');
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

            $response = Http::get($url);

            if ($response->successful()) {
                $weather = $response->json();
            } else {
                $weather = false;
            }
        }

        return view('experiments.weather', compact('weather', 'city'));
    }
}
