<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::latest()->paginate(10);

        return view('patterns.index', compact('patterns'));
    }

    public function create()
    {
        return view('patterns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pattern_no' => [
                'required',
                'string',
                'max:100',
                'unique:patterns,pattern_no',
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
            'pattern_name' => [
                'required',
                'string',
                'max:150',
            ],
            'cad_file_name' => [
                'nullable',
                'string',
                'max:150',
            ],
            'size_range' => [
                'nullable',
                'string',
                'max:150',
            ],
            'pattern_version' => [
                'required',
                'string',
                'max:50',
            ],
            'created_date' => [
                'required',
                'date',
            ],
            'status' => [
                'required',
                Rule::in([
                    'Draft',
                    'Approved',
                    'Revised',
                ]),
            ],
            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        Pattern::create($validated);

        return redirect()
            ->route('patterns.index')
            ->with('success', 'Pattern created successfully.');
    }

    public function show(Pattern $pattern)
    {
        return view('patterns.show', compact('pattern'));
    }

    public function edit(Pattern $pattern)
    {
        return view('patterns.edit', compact('pattern'));
    }

    public function update(Request $request, Pattern $pattern)
    {
        $validated = $request->validate([
            'pattern_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('patterns', 'pattern_no')
                    ->ignore($pattern->id),
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
            'pattern_name' => [
                'required',
                'string',
                'max:150',
            ],
            'cad_file_name' => [
                'nullable',
                'string',
                'max:150',
            ],
            'size_range' => [
                'nullable',
                'string',
                'max:150',
            ],
            'pattern_version' => [
                'required',
                'string',
                'max:50',
            ],
            'created_date' => [
                'required',
                'date',
            ],
            'status' => [
                'required',
                Rule::in([
                    'Draft',
                    'Approved',
                    'Revised',
                ]),
            ],
            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $pattern->update($validated);

        return redirect()
            ->route('patterns.index')
            ->with('success', 'Pattern updated successfully.');
    }

    public function destroy(Pattern $pattern)
    {
        $pattern->delete();

        return redirect()
            ->route('patterns.index')
            ->with('success', 'Pattern deleted successfully.');
    }
}