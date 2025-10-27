<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\DiningTable;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('diningTable')->orderBy('reservation_time', 'desc')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = DiningTable::orderBy('number')->get();
        return view('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'reservation_time' => 'required|date',
            'party_size' => 'required|integer|min:1',
            'dining_table_id' => 'nullable|exists:dining_tables,id',
            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);
        Reservation::create($data);
        return redirect()->route('reservations.index')->with('success', 'Reservation created');
    }

    public function edit(Reservation $reservation)
    {
        $tables = DiningTable::orderBy('number')->get();
        return view('reservations.edit', compact('reservation', 'tables'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'reservation_time' => 'required|date',
            'party_size' => 'required|integer|min:1',
            'dining_table_id' => 'nullable|exists:dining_tables,id',
            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);
        $reservation->update($data);
        return redirect()->route('reservations.index')->with('success', 'Reservation updated');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted');
    }
}
