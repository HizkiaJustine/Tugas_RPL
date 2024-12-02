<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Pembelian::all();
        $title = 'Home Page / Purchase Management';
        $name = 'Purchase Management';

        $totalPurchases = DB::table('pembelian')->sum('Harga');

        $latestDate = DB::table('pembelian')->latest('TanggalPembelian')->first();
        $latestDate = new \DateTime($latestDate->TanggalPembelian);

        $countPurchases = DB::table('pembelian')->count();

        return view('purchase', compact('title', 'name', 'records', 'totalPurchases', 'latestDate', 'countPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Home Page / Purchase Management / Add New Purchase';
        $name = 'Purchase Management';

        return view('add-purchase', compact('title', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TanggalPembelian' => 'required|date',
            'Kuantitas' => 'required|numeric',
            'Harga' => 'required|numeric',
            'SupplierID' => 'required|string',
            'ObatID' => 'required|string',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('purchase.index')->with('success', 'Purchase created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $record)
    {
        $title = 'Home Page / Purchase Management / Edit Purchase';
        $name = 'Purchase Management';
        
        return view('edit-purchase', [
            'title' => $title,
            'name' => $name,
            'record' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $PembelianID)
    {
        // Log the received PembayaranID
        if (is_array($PembelianID)) {
            Log::info('PembelianID received as array: ' . json_encode($PembelianID));
            $PembelianID = $PembelianID['PembelianID']; // Extract ID from array
        } else {
            Log::info('PembelianID received as string: ' . $PembelianID);
        }
        
        $validated = $request->validate([
            'TanggalPembelian' => 'required|date',
            'Kuantitas' => 'required|numeric',
            'Harga' => 'required|string',
            'SupplierID' => 'required|string',
            'ObatID' => 'required|string',
        ]);
    
        $purchase = Pembelian::find($PembelianID);
    
        if (!$purchase) {
            Log::error("Purchase with ID $PembelianID not found.");
            return redirect()->back()->with('error', 'Purchase record not found.');
        }
    
        try {
            $purchase->update($validated);
            Log::info("Purchase updated successfully: ", $validated);
            return redirect()->back()->with('success', 'Purchase updated successfully!');
        } catch (\Exception $e) {
            Log::error("Update failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($PembelianID)
    {
        $deleted = DB::table('pembelian')->where('PembelianID', $PembelianID)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Purchase deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Purchase not found or could not be deleted.');
        }
    }
}
