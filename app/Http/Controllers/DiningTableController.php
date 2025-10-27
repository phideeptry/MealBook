<?php

namespace App\Http\Controllers;

use App\DiningTable;
use Illuminate\Http\Request;

class DiningTableController extends Controller
{
    public function index()
    {
        $tables = DiningTable::orderBy('number')->paginate(10);
        return view('dining_tables.index', compact('tables'));
    }

    public function create()
    {
        return view('dining_tables.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|integer|unique:dining_tables,number',
            'seats' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);
        DiningTable::create($data);
        return redirect()->route('dining-tables.index')->with('success', 'Table created');
    }

    public function edit(DiningTable $dining_table)
    {
        return view('dining_tables.edit', ['table' => $dining_table]);
    }

    public function update(Request $request, DiningTable $dining_table)
    {
        $data = $request->validate([
            'number' => 'required|integer|unique:dining_tables,number,' . $dining_table->id,
            'seats' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);
        $dining_table->update($data);
        return redirect()->route('dining-tables.index')->with('success', 'Table updated');
    }

    public function destroy(DiningTable $dining_table)
    {
        $dining_table->delete();
        return redirect()->route('dining-tables.index')->with('success', 'Table deleted');
    }
}
