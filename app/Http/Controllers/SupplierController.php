<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'SupplierID' => 'required|max:100',
            'NamaSupplier' => 'required|max:100',
            'NomorHP' => 'required|max:15',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index');
    }
}
