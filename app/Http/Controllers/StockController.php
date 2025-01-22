<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockTransaction;

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
       
        try {
            StockTransaction::create(
                [
                    'type' => 'in',
                    // 'info' => 'Penambahan stok',
                    'date' => $request->date,
                ]
            );
    
           for ($i=0; $i < count($request->qty); $i++) { 
                DetailTransaction::create([
                    'no_transaction' =>  StockTransaction::latest()->first()->no_transaction,
                    'no_sparepart' => $request->no_sparepart[$i],
                    'qty' => $request->qty[$i],
                ]);
                $data = Stock::where('no_sparepart', $request->no_sparepart[$i])->first();
                // dd( $data->current_capacity, $request->qty[$i],"total:". $data->current_capacity + $request->qty[$i]);
                $data->update([
                   'current_capacity'=> $data->current_capacity + $request->qty[$i], 
                ]);
           }
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function outStock(Request $request)
    {
       
        try {
            StockTransaction::create(
                [
                    'type' => 'out',
                    // 'info' => 'Penambahan stok',
                    'date' => $request->date_out,
                ]
            );
            // dd($request->qty_out);
           for ($i=0; $i < count($request->qty_out); $i++) { 
                DetailTransaction::create([
                    'no_transaction' =>  StockTransaction::latest()->first()->no_transaction,
                    'no_sparepart' => $request->no_sparepart_out[$i],
                    'qty' => $request->qty_out[$i],
                ]);
                $data = Stock::where('no_sparepart', $request->no_sparepart_out[$i])->first();
                // dd( $data->current_capacity, $request->qty[$i],"total:". $data->current_capacity + $request->qty[$i]);
                $data->update([
                   'current_capacity'=> $data->current_capacity - $request->qty_out[$i], 
                ]);
           }
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
        $data = Stock::all();
        $log = StockTransaction::all()->sortByDesc('created_at');
        // $lastData = $data->last();

        return view('logStock', compact('title', 'data', 'log'));
        // return view('logStock', compact('title'));
    }

    public function detailStock(Request $request, $id)
    {
        $dataTransaction = StockTransaction::where('no_transaction', $id)->first();
        $details = DetailTransaction::where('no_transaction', $dataTransaction->no_transaction)->get();
        return view('modalDetailLog', compact('dataTransaction', 'details'));
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        $data = Stock::all();
        // $lastData = $data->last();

        return view('dashboard', compact('title', 'data'));
    }
}
