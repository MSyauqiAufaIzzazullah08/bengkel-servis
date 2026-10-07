<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Pelanggan;
use App\Models\BookingServis;
use App\Models\OrderSparePart;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::with([
            'pelanggan',
            'bookingServis',
            'orderSparePart'
        ])->get();

        return view('rating.index', compact('rating'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $booking = BookingServis::with('pelanggan')->get();
        $orders = OrderSparePart::with('pelanggan')->get();

        return view('rating.create', compact(
            'pelanggan',
            'booking',
            'orders'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_booking' => 'nullable',
            'id_order' => 'nullable',
            'nilai' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable',
            'tanggal' => 'nullable|date',
        ]);

        Rating::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_booking' => $request->id_booking ?: null,
            'id_order' => $request->id_order ?: null,
            'nilai' => $request->nilai,
            'ulasan' => $request->ulasan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/rating');
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id);

        $pelanggan = Pelanggan::all();
        $booking = BookingServis::with('pelanggan')->get();
        $orders = OrderSparePart::with('pelanggan')->get();

        return view('rating.edit', compact(
            'rating',
            'pelanggan',
            'booking',
            'orders'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_booking' => 'nullable',
            'id_order' => 'nullable',
            'nilai' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable',
            'tanggal' => 'nullable|date',
        ]);

        $rating = Rating::findOrFail($id);

        $rating->update([
            'id_pelanggan' => $request->id_pelanggan,
            'id_booking' => $request->id_booking ?: null,
            'id_order' => $request->id_order ?: null,
            'nilai' => $request->nilai,
            'ulasan' => $request->ulasan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/rating');
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);

        $rating->delete();

        return redirect('/rating');
    }
}