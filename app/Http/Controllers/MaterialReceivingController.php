<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\MaterialReceiving;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialReceivingController extends Controller
{
    /**
     * Display all material receiving records.
     */
    public function index()
    {
        $receivings = MaterialReceiving::with('fabric')
            ->latest()
            ->paginate(10);

        return view(
            'material-receivings.index',
            compact('receivings')
        );
    }

    /**
     * Show the form for creating a new material receiving record.
     */
    public function create()
    {
        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'material-receivings.create',
            compact('fabrics')
        );
    }

    /**
     * Store a newly created material receiving record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiving_no' => [
                'required',
                'string',
                'max:50',
                'unique:material_receivings,receiving_no',
            ],

            'supplier_name' => [
                'required',
                'string',
                'max:150',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'received_date' => [
                'required',
                'date',
            ],

            'lot_batch_no' => [
                'required',
                'string',
                'max:100',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'remarks' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Received',
                    'Inspected',
                    'Rejected',
                ]),
            ],
        ]);

        MaterialReceiving::create($validated);

        return redirect()
            ->route('material-receivings.index')
            ->with(
                'success',
                'Material receiving recorded successfully.'
            );
    }

    /**
     * Display a specific material receiving record.
     */
    public function show(MaterialReceiving $materialReceiving)
    {
        $materialReceiving->load('fabric');

        return view(
            'material-receivings.show',
            compact('materialReceiving')
        );
    }

    /**
     * Show the form for editing a material receiving record.
     */
    public function edit(MaterialReceiving $materialReceiving)
    {
        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'material-receivings.edit',
            compact(
                'materialReceiving',
                'fabrics'
            )
        );
    }

    /**
     * Update a material receiving record.
     */
    public function update(
        Request $request,
        MaterialReceiving $materialReceiving
    ) {
        $validated = $request->validate([
            'receiving_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'material_receivings',
                    'receiving_no'
                )->ignore($materialReceiving->id),
            ],

            'supplier_name' => [
                'required',
                'string',
                'max:150',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'received_date' => [
                'required',
                'date',
            ],

            'lot_batch_no' => [
                'required',
                'string',
                'max:100',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'remarks' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Received',
                    'Inspected',
                    'Rejected',
                ]),
            ],
        ]);

        $materialReceiving->update($validated);

        return redirect()
            ->route('material-receivings.index')
            ->with(
                'success',
                'Material receiving updated successfully.'
            );
    }

    /**
     * Delete a material receiving record.
     */
    public function destroy(
        MaterialReceiving $materialReceiving
    ) {
        $materialReceiving->delete();

        return redirect()
            ->route('material-receivings.index')
            ->with(
                'success',
                'Material receiving deleted successfully.'
            );
    }
}