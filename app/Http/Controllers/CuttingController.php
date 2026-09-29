<?php

namespace App\Http\Controllers;

use App\Models\Cutting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CuttingController extends Controller
{
    public function index()
    {
        $cuttings = Cutting::latest()->paginate(10);

        return view('cuttings.index', compact('cuttings'));
    }

    public function create()
    {
        return view('cuttings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cutting_no' => [
                'required',
                'string',
                'max:100',
                'unique:cuttings,cutting_no'
            ],
            'marker_no' => ['required', 'string', 'max:100'],
            'pattern_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'cutting_date' => ['required', 'date'],
            'fabric_issue_no' => ['required', 'string', 'max:100'],

            'lay_quantity' => ['nullable', 'numeric', 'min:0'],
            'ply_count' => ['nullable', 'integer', 'min:0'],
            'planned_cut_qty' => ['nullable', 'numeric', 'min:0'],
            'actual_cut_qty' => ['nullable', 'numeric', 'min:0'],
            'rejected_qty' => ['nullable', 'numeric', 'min:0'],

            'cutter_operator' => ['nullable', 'string', 'max:150'],

            'status' => [
                'required',
                Rule::in([
                    'Draft',
                    'In Progress',
                    'Completed',
                    'Cancelled'
                ])
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        Cutting::create($validated);

        return redirect()
            ->route('cuttings.index')
            ->with('success', 'Cutting created successfully.');
    }

    public function show(Cutting $cutting)
    {
        return view('cuttings.show', compact('cutting'));
    }

    public function edit(Cutting $cutting)
    {
        return view('cuttings.edit', compact('cutting'));
    }

    public function update(Request $request, Cutting $cutting)
    {
        $validated = $request->validate([
            'cutting_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('cuttings', 'cutting_no')
                    ->ignore($cutting->id)
            ],

            'marker_no' => ['required', 'string', 'max:100'],
            'pattern_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'cutting_date' => ['required', 'date'],
            'fabric_issue_no' => ['required', 'string', 'max:100'],

            'lay_quantity' => ['nullable', 'numeric', 'min:0'],
            'ply_count' => ['nullable', 'integer', 'min:0'],
            'planned_cut_qty' => ['nullable', 'numeric', 'min:0'],
            'actual_cut_qty' => ['nullable', 'numeric', 'min:0'],
            'rejected_qty' => ['nullable', 'numeric', 'min:0'],

            'cutter_operator' => ['nullable', 'string', 'max:150'],

            'status' => [
                'required',
                Rule::in([
                    'Draft',
                    'In Progress',
                    'Completed',
                    'Cancelled'
                ])
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        $cutting->update($validated);

        return redirect()
            ->route('cuttings.index')
            ->with('success', 'Cutting updated successfully.');
    }

    public function destroy(Cutting $cutting)
    {
        $cutting->delete();

        return redirect()
            ->route('cuttings.index')
            ->with('success', 'Cutting deleted successfully.');
    }
}