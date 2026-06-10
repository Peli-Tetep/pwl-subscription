<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $Inventory = Inventory::orderBy('id', 'desc')->paginate(10);
        return view('inventory.index', compact('Inventory'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'  => 'required|string|max:20|unique:inventory,kode',
            'nama'  => 'required|string|max:255',
            'stok'  => 'required|integer|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Inventory $Inventory)
    {
        return view('inventory.edit', compact('Inventory'));
    }

    public function update(Request $request, Inventory $Inventory)
    {
        $request->validate([
            'kode'  => 'required|string|max:20|unique:inventory,kode',
            'nama'  => 'required|string|max:255',
            'stok'  => 'required|integer|min:0',
        ]);

        $Inventory->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(Inventory $Inventory)
    {
        $Inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Barang berhasil dihapus');
    }
}