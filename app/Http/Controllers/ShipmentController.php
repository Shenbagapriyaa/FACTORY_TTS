<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::latest()->paginate(10);

        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipment_no' => [
                'required',
                'string',
                'max:100',
                'unique:shipments,shipment_no',
            ],

            'packing_no' => [
                'required',
                'string',
                'max:100',
            ],

            'so_no' => [
                'required',
                'string',
                'max:100',
            ],

            'item_no' => [
                'required',
                'string',
                'max:100',
            ],

            'customer_name' => [
                'required',
                'string',
                'max:150',
            ],

            'shipment_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'shipment_date' => [
                'required',
                'date',
            ],

            'destination' => [
                'required',
                'string',
                'max:255',
            ],

            'transporter' => [
                'nullable',
                'string',
                'max:150',
            ],

            'tracking_vehicle_no' => [
                'nullable',
                'string',
                'max:150',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Ready',
                    'Shipped',
                    'Delivered',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        Shipment::create($validated);

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Shipment record created successfully.');
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'shipment_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('shipments', 'shipment_no')
                    ->ignore($shipment->id),
            ],

            'packing_no' => [
                'required',
                'string',
                'max:100',
            ],

            'so_no' => [
                'required',
                'string',
                'max:100',
            ],

            'item_no' => [
                'required',
                'string',
                'max:100',
            ],

            'customer_name' => [
                'required',
                'string',
                'max:150',
            ],

            'shipment_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'shipment_date' => [
                'required',
                'date',
            ],

            'destination' => [
                'required',
                'string',
                'max:255',
            ],

            'transporter' => [
                'nullable',
                'string',
                'max:150',
            ],

            'tracking_vehicle_no' => [
                'nullable',
                'string',
                'max:150',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Ready',
                    'Shipped',
                    'Delivered',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $shipment->update($validated);

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Shipment record updated successfully.');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Shipment record deleted successfully.');
    }
}