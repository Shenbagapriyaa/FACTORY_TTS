<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricStore;
use App\Models\Relaxation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RelaxationController extends Controller
{
    public function index()
    {
        $relaxations = Relaxation::with([
            'fabricStore',
            'fabric',
        ])
        ->latest()
        ->paginate(10);

        return view(
            'relaxations.index',
            compact('relaxations')
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
            'relaxations.create',
            compact(
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'relaxation_no' => [
                'required',
                'string',
                'max:50',
                'unique:relaxations,relaxation_no',
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'relaxation_date' => [
                'required',
                'date',
            ],

            'lot_batch_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'input_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'start_time' => [
                'nullable',
                'date',
            ],

            'end_time' => [
                'nullable',
                'date',
                'after_or_equal:start_time',
            ],

            'duration_hours' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Pending',
                    'In Progress',
                    'Completed',
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
            $validated['input_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'input_quantity' =>
                        'Input quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        Relaxation::create($validated);

        return redirect()
            ->route('relaxations.index')
            ->with(
                'success',
                'Relaxation record created successfully.'
            );
    }

    public function show(Relaxation $relaxation)
    {
        $relaxation->load([
            'fabricStore',
            'fabric',
        ]);

        return view(
            'relaxations.show',
            compact('relaxation')
        );
    }

    public function edit(Relaxation $relaxation)
    {
        $fabricStores = FabricStore::with('fabric')
            ->where('quantity_available', '>', 0)
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'relaxations.edit',
            compact(
                'relaxation',
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function update(
        Request $request,
        Relaxation $relaxation
    ) {
        $validated = $request->validate([
            'relaxation_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'relaxations',
                    'relaxation_no'
                )->ignore($relaxation->id),
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'relaxation_date' => [
                'required',
                'date',
            ],

            'lot_batch_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'input_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'start_time' => [
                'nullable',
                'date',
            ],

            'end_time' => [
                'nullable',
                'date',
                'after_or_equal:start_time',
            ],

            'duration_hours' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Pending',
                    'In Progress',
                    'Completed',
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
            $validated['input_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'input_quantity' =>
                        'Input quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        $relaxation->update($validated);

        return redirect()
            ->route('relaxations.index')
            ->with(
                'success',
                'Relaxation record updated successfully.'
            );
    }

    public function destroy(Relaxation $relaxation)
    {
        $relaxation->delete();

        return redirect()
            ->route('relaxations.index')
            ->with(
                'success',
                'Relaxation record deleted successfully.'
            );
    }
}