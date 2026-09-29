<?php

namespace App\Http\Controllers;

use App\Models\GRN;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InspectionController extends Controller
{
    /**
     * Display all inspections.
     */
    public function index()
    {
        $inspections = Inspection::with('grn.materialReceiving')
            ->latest()
            ->paginate(10);

        return view(
            'inspections.index',
            compact('inspections')
        );
    }

    /**
     * Show the form for creating a new inspection.
     */
    public function create()
    {
        // Only GRNs that have not been inspected yet.
        $grns = GRN::with('materialReceiving')
            ->whereDoesntHave('inspection')
            ->latest()
            ->get();

        return view(
            'inspections.create',
            compact('grns')
        );
    }

    /**
     * Store a new inspection.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'inspection_no' => [
                'required',
                'string',
                'max:50',
                'unique:inspections,inspection_no',
            ],

            'grn_id' => [
                'required',
                'exists:grns,id',
                'unique:inspections,grn_id',
            ],

            'inspection_date' => [
                'required',
                'date',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'inspected_quantity' => [
                'required',
                'numeric',
                'min:0.01',
                'lte:received_quantity',
            ],

            'accepted_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:inspected_quantity',
            ],

            'rejected_quantity' => [
                'required',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Accepted',
                    'Partially Accepted',
                    'Rejected',
                ]),
            ],

            'defect_remarks' => [
                'nullable',
                'string',
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        /*
         * Accepted + Rejected quantity
         * should equal inspected quantity.
         */
        if (
            (float) $validated['accepted_quantity']
            + (float) $validated['rejected_quantity']
            != (float) $validated['inspected_quantity']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'rejected_quantity' =>
                        'Accepted quantity and rejected quantity must equal inspected quantity.',
                ]);
        }

        Inspection::create($validated);

        return redirect()
            ->route('inspections.index')
            ->with(
                'success',
                'Inspection recorded successfully.'
            );
    }

    /**
     * Display a specific inspection.
     */
    public function show(Inspection $inspection)
    {
        $inspection->load(
            'grn.materialReceiving'
        );

        return view(
            'inspections.show',
            compact('inspection')
        );
    }

    /**
     * Show the form for editing an inspection.
     */
    public function edit(Inspection $inspection)
    {
        $grns = GRN::with('materialReceiving')
            ->latest()
            ->get();

        return view(
            'inspections.edit',
            compact(
                'inspection',
                'grns'
            )
        );
    }

    /**
     * Update an inspection.
     */
    public function update(
        Request $request,
        Inspection $inspection
    ) {
        $validated = $request->validate([
            'inspection_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'inspections',
                    'inspection_no'
                )->ignore($inspection->id),
            ],

            'grn_id' => [
                'required',
                'exists:grns,id',
                Rule::unique(
                    'inspections',
                    'grn_id'
                )->ignore($inspection->id),
            ],

            'inspection_date' => [
                'required',
                'date',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'inspected_quantity' => [
                'required',
                'numeric',
                'min:0.01',
                'lte:received_quantity',
            ],

            'accepted_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:inspected_quantity',
            ],

            'rejected_quantity' => [
                'required',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Accepted',
                    'Partially Accepted',
                    'Rejected',
                ]),
            ],

            'defect_remarks' => [
                'nullable',
                'string',
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        if (
            (float) $validated['accepted_quantity']
            + (float) $validated['rejected_quantity']
            != (float) $validated['inspected_quantity']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'rejected_quantity' =>
                        'Accepted quantity and rejected quantity must equal inspected quantity.',
                ]);
        }

        $inspection->update($validated);

        return redirect()
            ->route('inspections.index')
            ->with(
                'success',
                'Inspection updated successfully.'
            );
    }

    /**
     * Delete an inspection.
     */
    public function destroy(Inspection $inspection)
    {
        $inspection->delete();

        return redirect()
            ->route('inspections.index')
            ->with(
                'success',
                'Inspection deleted successfully.'
            );
    }
}