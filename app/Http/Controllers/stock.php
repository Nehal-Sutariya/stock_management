<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Controllers\Apis;
// upstocks api key
// $api_key = "8cf16744-8061-444f-95e9-46bfa7de1b7b";
// alphavantage api key

class stock extends Controller
{
    function base(){
        $apiKey = "0VALQSP06DGRET5M";
        $url = '';
        // $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey='.$apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return view('base');
    }

    function sign_up(){
        return view('sign-up');
    }
}
