<?php

namespace App\Http\Controllers;

use App\Models\Sewing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SewingController extends Controller
{
    public function index()
    {
        $sewings = Sewing::latest()->paginate(10);

        return view('sewings.index', compact('sewings'));
    }

    public function create()
    {
        return view('sewings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sewing_no' => [
                'required',
                'string',
                'max:100',
                'unique:sewings,sewing_no'
            ],

            'bundle_no' => [
                'required',
                'string',
                'max:100'
            ],

            'cutting_no' => [
                'required',
                'string',
                'max:100'
            ],

            'so_no' => [
                'required',
                'string',
                'max:100'
            ],

            'item_no' => [
                'required',
                'string',
                'max:100'
            ],

            'size' => [
                'required',
                'string',
                'max:50'
            ],

            'bundle_quantity' => [
                'required',
                'integer',
                'min:1'
            ],

            'input_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'output_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'rejected_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'line_no' => [
                'nullable',
                'string',
                'max:100'
            ],

            'operator_name' => [
                'nullable',
                'string',
                'max:150'
            ],

            'production_stage' => [
                'required',
                Rule::in([
                    'Inline',
                    'Mid',
                    'End'
                ])
            ],

            'sewing_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled'
                ])
            ],

            'remarks' => [
                'nullable',
                'string'
            ],
        ]);

        Sewing::create($validated);

        return redirect()
            ->route('sewings.index')
            ->with('success', 'Sewing production created successfully.');
    }

    public function show(Sewing $sewing)
    {
        return view('sewings.show', compact('sewing'));
    }

    public function edit(Sewing $sewing)
    {
        return view('sewings.edit', compact('sewing'));
    }

    public function update(Request $request, Sewing $sewing)
    {
        $validated = $request->validate([
            'sewing_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('sewings', 'sewing_no')
                    ->ignore($sewing->id)
            ],

            'bundle_no' => [
                'required',
                'string',
                'max:100'
            ],

            'cutting_no' => [
                'required',
                'string',
                'max:100'
            ],

            'so_no' => [
                'required',
                'string',
                'max:100'
            ],

            'item_no' => [
                'required',
                'string',
                'max:100'
            ],

            'size' => [
                'required',
                'string',
                'max:50'
            ],

            'bundle_quantity' => [
                'required',
                'integer',
                'min:1'
            ],

            'input_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'output_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'rejected_quantity' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'line_no' => [
                'nullable',
                'string',
                'max:100'
            ],

            'operator_name' => [
                'nullable',
                'string',
                'max:150'
            ],

            'production_stage' => [
                'required',
                Rule::in([
                    'Inline',
                    'Mid',
                    'End'
                ])
            ],

            'sewing_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled'
                ])
            ],

            'remarks' => [
                'nullable',
                'string'
            ],
        ]);

        $sewing->update($validated);

        return redirect()
            ->route('sewings.index')
            ->with('success', 'Sewing production updated successfully.');
    }

    public function destroy(Sewing $sewing)
    {
        $sewing->delete();

        return redirect()
            ->route('sewings.index')
            ->with('success', 'Sewing production deleted successfully.');
    }
}