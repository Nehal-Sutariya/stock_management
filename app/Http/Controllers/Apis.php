<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apis extends Controller
{
    protected $apiKey = "0VALQSP06DGRET5M";
    protected $url = "";

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->url = 'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=' . $this->apiKey;
    }
}
