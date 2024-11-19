<?php

namespace App\Http\Controllers;

use App\Models\PKB;
use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function indexStok()
    {
        $title = 'Data Stok';
        
        return view('masterSparePart', compact('title'));
    }

    public function addSparePart(Request $request)
    {
        try {
            // dd($request);
            SparePart::create([
                'kode_part' => $request->kode_part,
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function updateSparePart(Request $request, $id)
    {
        try {
            $data = SparePart::where()->first();
            $data::update([
                'kode_part' => $request->kode_part,
                'name' => $request->namespace,
                'category' => $request->category,
                'price' => $request->price,
                'qty' => $request->qty
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }


    public function indexPKB()
    {
        $title = 'PKB';

        return view('masterSparePart', compact('title'));
    }

    public function addPKB(Request $request, $id)
    {
        try {
            // $data = SparePart::where('kode_po', $id)->first();
            PKB::create([]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }
    public function updatePKB(Request $request, $id)
    {
        try {
            $data = SparePart::where('kode_po', $id)->first();
            $data::update([]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }
}
