<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricStore;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with([
            'fabricStore',
            'fabric',
        ])
        ->latest()
        ->paginate(10);

        return view(
            'reservations.index',
            compact('reservations')
        );
    }

    public function create()
    {
        $fabricStores = FabricStore::with('fabric')
            ->where('quantity_available', '>', 0)
            ->whereIn('status', [
                'Available',
                'Partially Available',
            ])
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'reservations.create',
            compact(
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservation_no' => [
                'required',
                'string',
                'max:50',
                'unique:reservations,reservation_no',
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'reservation_date' => [
                'required',
                'date',
            ],

            'order_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'reserved_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'purpose' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Reserved',
                    'Partially Reserved',
                    'Released',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $fabricStore = FabricStore::findOrFail(
            $validated['fabric_store_id']
        );

        if (
            $validated['reserved_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'reserved_quantity' =>
                        'Reserved quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        Reservation::create($validated);

        return redirect()
            ->route('reservations.index')
            ->with(
                'success',
                'Reservation created successfully.'
            );
    }

    public function show(Reservation $reservation)
    {
        $reservation->load([
            'fabricStore',
            'fabric',
        ]);

        return view(
            'reservations.show',
            compact('reservation')
        );
    }

    public function edit(Reservation $reservation)
    {
        $fabricStores = FabricStore::with('fabric')
            ->where('quantity_available', '>', 0)
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'reservations.edit',
            compact(
                'reservation',
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function update(
        Request $request,
        Reservation $reservation
    ) {
        $validated = $request->validate([
            'reservation_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'reservations',
                    'reservation_no'
                )->ignore($reservation->id),
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'reservation_date' => [
                'required',
                'date',
            ],

            'order_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'reserved_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'purpose' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Reserved',
                    'Partially Reserved',
                    'Released',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $fabricStore = FabricStore::findOrFail(
            $validated['fabric_store_id']
        );

        if (
            $validated['reserved_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'reserved_quantity' =>
                        'Reserved quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        $reservation->update($validated);

        return redirect()
            ->route('reservations.index')
            ->with(
                'success',
                'Reservation updated successfully.'
            );
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with(
                'success',
                'Reservation deleted successfully.'
            );
    }
}