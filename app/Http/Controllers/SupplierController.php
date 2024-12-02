<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        $title = "Data";
        $name = "Informasi Supplier";
        return view('info_supplier', compact('suppliers', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data";
        $name = "Tambah Supplier";
        return view('add_supplier', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaSupplier' => 'required|string|max:100',
            'NomorHP' => 'required|string|max:15',
        ]);

        Supplier::create($request->all());

        return redirect()->route('info_supplier')->with('success', 'Data supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $title = "Data";
        $name = "Edit Supplier";
        return view('edit_supplier', compact('supplier', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaSupplier' => 'required|string|max:100',
            'NomorHP' => 'required|string|max:15',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('info_supplier')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('info_supplier')->with('success', 'Supplier berhasil dihapus');
    }
}
