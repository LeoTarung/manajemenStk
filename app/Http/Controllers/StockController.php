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

    public function addStock(Request $request)
    {
        $data = Stock::where('no_sparepart', $request->no_sparepart)->first();
        // dd($data, $request->no_sparepart);
        try {
            $data->update([
                'current_capacity' => $request->qty,
            ]);

            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function updateStock(Request $request)
    {
        $data = Stock::where('no_sparepart', $request->no_sparepart)->first();
        // dd($data, $request->no_sparepart);
        try {
            $data->update([
                'min_stock' => $request->min,
                'max_stock' => $request->max,
            ]);

            return redirect()->back()->with('success', 'Data Berhasil Diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }    

    public function modalEdit(Request $request, $id)
    {
        $detailData = Stock::where('id', $id)->first();
        return view('modalEdit', compact('detailData'));
    }

    public function logStock()
    {
        $title = 'Log Transaction';
        // $data = Stock::all();
        // $lastData = $data->last();

        // return view('stock', compact('title', 'data', 'lastData'));
        return view('logStock', compact('title'));
    }
}
