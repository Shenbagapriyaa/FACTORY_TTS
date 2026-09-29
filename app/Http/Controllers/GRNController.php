<?php

namespace App\Http\Controllers;

use App\Models\GRN;
use App\Models\MaterialReceiving;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GRNController extends Controller
{
    public function index()
    {
        $grns = GRN::with('materialReceiving')
            ->latest()
            ->paginate(10);

        return view('grns.index', compact('grns'));
    }

    public function create()
    {
        $receivings = MaterialReceiving::whereDoesntHave('grn')
            ->latest()
            ->get();

        return view('grns.create', compact('receivings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grn_no' => [
                'required',
                'string',
                'max:50',
                'unique:grns,grn_no',
            ],

            'material_receiving_id' => [
                'required',
                'exists:material_receivings,id',
            ],

            'grn_date' => [
                'required',
                'date',
            ],

            'supplier_name' => [
                'required',
                'string',
                'max:150',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'accepted_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:received_quantity',
            ],

            'rejected_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:received_quantity',
            ],

            'status' => [
                'required',
                Rule::in(['Accepted', 'Partially Accepted', 'Rejected']),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        GRN::create($validated);

        return redirect()
            ->route('grns.index')
            ->with('success', 'GRN created successfully.');
    }

    public function show(GRN $grn)
    {
        $grn->load('materialReceiving');

        return view('grns.show', compact('grn'));
    }

    public function edit(GRN $grn)
    {
        $receivings = MaterialReceiving::where(function ($query) use ($grn) {
                $query->whereDoesntHave('grn')
                    ->orWhere('id', $grn->material_receiving_id);
            })
            ->latest()
            ->get();

        return view('grns.edit', compact('grn', 'receivings'));
    }

    public function update(Request $request, GRN $grn)
    {
        $validated = $request->validate([
            'grn_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique('grns', 'grn_no')->ignore($grn->id),
            ],

            'material_receiving_id' => [
                'required',
                'exists:material_receivings,id',
            ],

            'grn_date' => [
                'required',
                'date',
            ],

            'supplier_name' => [
                'required',
                'string',
                'max:150',
            ],

            'received_quantity' => [
                'required',
                'numeric',
                'min:0',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'accepted_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:received_quantity',
            ],

            'rejected_quantity' => [
                'required',
                'numeric',
                'min:0',
                'lte:received_quantity',
            ],

            'status' => [
                'required',
                Rule::in(['Accepted', 'Partially Accepted', 'Rejected']),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $grn->update($validated);

        return redirect()
            ->route('grns.index')
            ->with('success', 'GRN updated successfully.');
    }

    public function destroy(GRN $grn)
    {
        $grn->delete();

        return redirect()
            ->route('grns.index')
            ->with('success', 'GRN deleted successfully.');
    }
}