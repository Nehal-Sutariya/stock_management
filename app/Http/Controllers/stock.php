<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Controllers\Apis;
use App\Models\StockManage;
use Carbon\Carbon;
use DateTime;


// upstocks api key
// $api_key = "8cf16744-8061-444f-95e9-46bfa7de1b7b";
// alphavantage api key

class stock extends Controller
{
    public function dashboard()
    {
        /* Get all stock data for the authenticated user */
        $stockData = StockManage::where('user_id', auth()->id())->get();

        /* Get method for pass context data */
        $totalAll = 0;
        foreach ($stockData as $stock) {
            $totalAll += $stock->price * $stock->quantity;
        }

        /* Calculate total for objects created today */
        $today = Carbon::today();
        $totalToday = 0;
        foreach ($stockData as $stock) {
            if ($stock->created_at->format('Y-m-d') === $today->format('Y-m-d')) {
                $totalToday += $stock->price * $stock->quantity;
            }
        }

        $labels = [];
        $data = [];

        foreach ($stockData as $stock) {
            // Extract the date from the created_at attribute of each stock
            $date = new DateTime($stock->created_at);
            $dayOfWeek = $date->format('D'); // Get the day of the week (short name)

            // Push the day of the week to the labels array
            $labels[] = $dayOfWeek;

            // Push the stock data value to the data array
            $data[] = $stock->value;
        }


        return view('dashboard', [
            'stockData' => $stockData,
            'totalAll' => $totalAll,
            'totalToday' => $totalToday
        ]);
    }


    public function add_portfolio(Request $request){
        $request->validate([
            'stock_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $stockManage = new StockManage();
        $stockManage->user_id = auth()->id();
        $stockManage->stock_name = $request->stock_name;
        $stockManage->price = $request->price;
        $stockManage->quantity = $request->quantity;

        /* Save() method */
        $stockManage->save();

        return redirect()->back()->with('success', 'Stock added successfully!');
    }

    public function listStock(){
        $stockData = StockManage::where('user_id', auth()->id())->get();

        return view('stock_list', [
          'stockData' => $stockData
        ]);
    }

    public function deleteStock($id)
    {
        $stock = StockManage::findOrFail($id);
        $stock->delete();
        return redirect()->back()->with('success', 'Stock deleted successfully.');
    }

    public function updateStock($id)
    {
        $stock = StockManage::findOrFail($id); 
        return view('stock_update', ['stock' => $stock]);
    }

    public function submitStockUpdate(Request $request, $id)
    {
        $stock = StockManage::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('listStock'); 
    }

}