<?php

namespace App\Http\Controllers;

// use App\Models\PKB;
use App\Models\SparePart;
use App\Models\Stock;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $title = 'Master Data Spare Part';
        $data = SparePart::all();
        $lastData = $data->last();
        // dd($test);
        
        return view('masterSparePart', compact('title','data','lastData'));
    }

    public function addSparePart(Request $request)
    {
        try {
            // dd($request);
            SparePart::create([
                'no_part' => $request->kode_part,
                'name' => $request->name,
                'price' => $request->price,
            ]);

            Stock::create([
                'no_sparepart' => $request->kode_part,
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
            $data = SparePart::where('no_part', $id)->first();
            $data->update([
                'no_part' => $request->kode_part,
                'name' => $request->name,
                'price' => $request->price,
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function deleteSparePart(Request $request, $id)
    {
        try {
            $data = SparePart::where('no_part', $id)->first();
            $data->delete();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Informasi added successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }


    public function modalUpdate(Request $request, $id)
    {
        $detailData = SparePart::where('no_part', $id)->first();
        return view('modalDetailSparePart', compact('detailData'));
    }

    
    // public function indexPKB()
    // {
    //     $title = 'PKB';

    //     return view('masterSparePart', compact('title'));
    // }

    // public function addPKB(Request $request, $id)
    // {
    //     try {
    //         // $data = SparePart::where('kode_po', $id)->first();
    //         PKB::create([]);

    //         // Redirect back with success message
    //         return redirect()->back()->with('success', 'Informasi added successfully.');
    //     } catch (\Exception $e) {
    //         // Redirect back with an error message
    //         return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
    //     }
    // }
    // public function updatePKB(Request $request, $id)
    // {
    //     try {
    //         $data = SparePart::where('kode_po', $id)->first();
    //         $data::update([]);

    //         // Redirect back with success message
    //         return redirect()->back()->with('success', 'Informasi added successfully.');
    //     } catch (\Exception $e) {
    //         // Redirect back with an error message
    //         return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
    //     }
    // }
}
