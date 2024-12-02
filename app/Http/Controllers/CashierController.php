<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Kasir::all();
        $title = 'Home Page / Cashier Management';
        $name = 'Cashier Management';

        $totalCashiers = DB::table('kasir')->count();

        return view('cashier', compact('title', 'name', 'records', 'totalCashiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Home Page / Cashier Management / Add New Cashier';
        $name = 'Cashier Management';

        return view('add-cashier', compact('title', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaKasir' => 'required|string',
            'NomorHP' => 'required|string',
            'AlamatKasir' => 'required|string',
            'JenisKelamin' => 'required|string',
            'AccountID' => 'nullable|string',
        ]);

        $account = Account::where('AccountID', $request->AccountID)->first();

        if ($account->Role !== 'kasir') {
            return redirect()->back()->with('error', 'The selected account does not have the cashier role.');
        };

        Kasir::create($request->all());

        return redirect()->route('cashier.index')->with('success', 'Cashier created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kasir $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kasir $record)
    {
        $title = 'Home Page / Cashier Management / Edit Cashier';
        $name = 'Cashier Management';
        
        return view('edit-cashier', [
            'title' => $title,
            'name' => $name,
            'record' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $KasirID)
    {
        // Log the received PembayaranID
        if (is_array($KasirID)) {
            Log::info('KasirID received as array: ' . json_encode($KasirID));
            $KasirID = $KasirID['KasirID']; // Extract ID from array
        } else {
            Log::info('KasirID received as string: ' . $KasirID);
        }
        
        $validated = $request->validate([
            'NamaKasir' => 'required|string',
            'NomorHP' => 'required|string',
            'AlamatKasir' => 'required|string',
            'JenisKelamin' => 'required|string',
            'AccountID' => 'nullable|string',
        ]);
    
        $cashier = Kasir::find($KasirID);
    
        if (!$cashier) {
            Log::error("Cashier with ID $KasirID not found.");
            return redirect()->back()->with('error', 'Cashier record not found.');
        }
    
        try {
            $cashier->update($validated);
            Log::info("Cashier updated successfully: ", $validated);
            return redirect()->back()->with('success', 'Cashier updated successfully!');
        } catch (\Exception $e) {
            Log::error("Update failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($KasirID)
    {
        $deleted = DB::table('kasir')->where('KasirID', $KasirID)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Cashier deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Cashier not found or could not be deleted.');
        }
    }
}
