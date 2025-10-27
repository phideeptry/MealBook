<?php

namespace App\Http\Controllers;

use App\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::orderBy('created_at', 'desc')->paginate(10);
        return view('menu_items.index', compact('items'));
    }

    public function create()
    {
        return view('menu_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'is_available' => 'sometimes|boolean',
        ]);
        $data['is_available'] = $request->has('is_available');
        MenuItem::create($data);
        return redirect()->route('menu-items.index')->with('success', 'Menu item created');
    }

    public function edit(MenuItem $menu_item)
    {
        return view('menu_items.edit', ['item' => $menu_item]);
    }

    public function update(Request $request, MenuItem $menu_item)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'is_available' => 'sometimes|boolean',
        ]);
        $data['is_available'] = $request->has('is_available');
        $menu_item->update($data);
        return redirect()->route('menu-items.index')->with('success', 'Menu item updated');
    }

    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu item deleted');
    }
}
