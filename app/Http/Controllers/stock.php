<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Controllers\Apis;
use App\Models\StockManage;
// upstocks api key
// $api_key = "8cf16744-8061-444f-95e9-46bfa7de1b7b";
// alphavantage api key

class stock extends Controller
{
    public function add_portfolio(Request $request){
        $request->validate([
            'stock_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $stockManage = new StockManage();
        $stockManage->user_id = auth()->id(); // Assuming you're using authentication
        $stockManage->stock_name = $request->stock_name;
        $stockManage->price = $request->price;
        $stockManage->quantity = $request->quantity;

        // Save the new StockManage instance to the database
        $stockManage->save();

        // Redirect back or do whatever you want after saving the data
        return redirect()->back()->with('success', 'Stock added successfully!');
    }
}