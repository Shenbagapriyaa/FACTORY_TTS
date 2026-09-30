<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FinishingController extends Controller
{
    public function index()
    {
        $packings = Packing::latest()->paginate(10);

        return view('packings.index', compact('packings'));
    }

    public function create()
    {
        return view('packings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'packing_no' => [
                'required',
                'string',
                'max:100',
                'unique:packings,packing_no',
            ],

            'finishing_no' => [
                'required',
                'string',
                'max:100',
            ],

            'bundle_no' => [
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

            'size' => [
                'required',
                'string',
                'max:50',
            ],

            'input_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'packed_quantity' => [
                'nullable',
                'integer',
                'min:0',
                'lte:input_quantity',
            ],

            'rejected_quantity' => [
                'nullable',
                'integer',
                'min:0',
                'lte:input_quantity',
            ],

            'packing_type' => [
                'required',
                'string',
                'max:100',
            ],

            'operator_name' => [
                'nullable',
                'string',
                'max:150',
            ],

            'packing_date' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        Packing::create($validated);

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing record created successfully.');
    }

    public function show(Packing $packing)
    {
        return view('packings.show', compact('packing'));
    }

    public function edit(Packing $packing)
    {
        return view('packings.edit', compact('packing'));
    }

    public function update(Request $request, Packing $packing)
    {
        $validated = $request->validate([
            'packing_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('packings', 'packing_no')
                    ->ignore($packing->id),
            ],

            'finishing_no' => [
                'required',
                'string',
                'max:100',
            ],

            'bundle_no' => [
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

            'size' => [
                'required',
                'string',
                'max:50',
            ],

            'input_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'packed_quantity' => [
                'nullable',
                'integer',
                'min:0',
                'lte:input_quantity',
            ],

            'rejected_quantity' => [
                'nullable',
                'integer',
                'min:0',
                'lte:input_quantity',
            ],

            'packing_type' => [
                'required',
                'string',
                'max:100',
            ],

            'operator_name' => [
                'nullable',
                'string',
                'max:150',
            ],

            'packing_date' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $packing->update($validated);

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing record updated successfully.');
    }

    public function destroy(Packing $packing)
    {
        $packing->delete();

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing record deleted successfully.');
    }
}