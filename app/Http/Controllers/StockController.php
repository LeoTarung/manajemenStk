<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $title = 'Stock Control';
        $data = Stock::all();
        $lastData = $data->last();

        return view('stock', compact('title', 'data', 'lastData'));
    }
}
