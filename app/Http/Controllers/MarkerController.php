<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MarkerController extends Controller
{
    public function index()
    {
        $markers = Marker::latest()->paginate(10);

        return view('markers.index', compact('markers'));
    }

    public function create()
    {
        return view('markers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marker_no' => ['required', 'string', 'max:100', 'unique:markers,marker_no'],
            'pattern_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'marker_name' => ['required', 'string', 'max:150'],

            'size_ratio' => ['nullable', 'string', 'max:150'],

            'marker_length' => ['nullable', 'numeric', 'min:0'],
            'marker_width' => ['nullable', 'numeric', 'min:0'],

            'fabric_consumption' => ['nullable', 'numeric', 'min:0'],

            'ply_count' => ['nullable', 'integer', 'min:0'],

            'efficiency' => ['nullable', 'numeric', 'min:0', 'max:100'],

            'created_date' => ['required', 'date'],

            'status' => [
                'required',
                Rule::in(['Draft', 'Approved', 'Revised'])
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        Marker::create($validated);

        return redirect()
            ->route('markers.index')
            ->with('success', 'Marker created successfully.');
    }

    public function show(Marker $marker)
    {
        return view('markers.show', compact('marker'));
    }

    public function edit(Marker $marker)
    {
        return view('markers.edit', compact('marker'));
    }

    public function update(Request $request, Marker $marker)
    {
        $validated = $request->validate([
            'marker_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('markers', 'marker_no')->ignore($marker->id)
            ],

            'pattern_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'marker_name' => ['required', 'string', 'max:150'],

            'size_ratio' => ['nullable', 'string', 'max:150'],

            'marker_length' => ['nullable', 'numeric', 'min:0'],
            'marker_width' => ['nullable', 'numeric', 'min:0'],

            'fabric_consumption' => ['nullable', 'numeric', 'min:0'],

            'ply_count' => ['nullable', 'integer', 'min:0'],

            'efficiency' => ['nullable', 'numeric', 'min:0', 'max:100'],

            'created_date' => ['required', 'date'],

            'status' => [
                'required',
                Rule::in(['Draft', 'Approved', 'Revised'])
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        $marker->update($validated);

        return redirect()
            ->route('markers.index')
            ->with('success', 'Marker updated successfully.');
    }

    public function destroy(Marker $marker)
    {
        $marker->delete();

        return redirect()
            ->route('markers.index')
            ->with('success', 'Marker deleted successfully.');
    }
}