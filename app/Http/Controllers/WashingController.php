<?php

namespace App\Http\Controllers;

use App\Models\Washing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WashingController extends Controller
{
    public function index()
    {
        $washings = Washing::latest()->paginate(10);

        return view('washings.index', compact('washings'));
    }

    public function create()
    {
        return view('washings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'washing_no' => ['required', 'string', 'max:100', 'unique:washings,washing_no'],
            'sewing_no' => ['required', 'string', 'max:100'],
            'bundle_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'size' => ['required', 'string', 'max:50'],

            'process_type' => [
                'required',
                Rule::in([
                    'Semi Wash',
                    'Final Wash',
                    'Direct Wash',
                    'Laser',
                ]),
            ],

            'input_quantity' => ['required', 'integer', 'min:1'],
            'output_quantity' => ['nullable', 'integer', 'min:0'],
            'rejected_quantity' => ['nullable', 'integer', 'min:0'],

            'washing_machine' => ['nullable', 'string', 'max:100'],
            'operator_name' => ['nullable', 'string', 'max:150'],

            'process_date' => ['required', 'date'],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        Washing::create($validated);

        return redirect()
            ->route('washings.index')
            ->with('success', 'Washing / Laser process created successfully.');
    }

    public function show(Washing $washing)
    {
        return view('washings.show', compact('washing'));
    }

    public function edit(Washing $washing)
    {
        return view('washings.edit', compact('washing'));
    }

    public function update(Request $request, Washing $washing)
    {
        $validated = $request->validate([
            'washing_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('washings', 'washing_no')->ignore($washing->id),
            ],

            'sewing_no' => ['required', 'string', 'max:100'],
            'bundle_no' => ['required', 'string', 'max:100'],
            'so_no' => ['required', 'string', 'max:100'],
            'item_no' => ['required', 'string', 'max:100'],
            'size' => ['required', 'string', 'max:50'],

            'process_type' => [
                'required',
                Rule::in([
                    'Semi Wash',
                    'Final Wash',
                    'Direct Wash',
                    'Laser',
                ]),
            ],

            'input_quantity' => ['required', 'integer', 'min:1'],
            'output_quantity' => ['nullable', 'integer', 'min:0'],
            'rejected_quantity' => ['nullable', 'integer', 'min:0'],

            'washing_machine' => ['nullable', 'string', 'max:100'],
            'operator_name' => ['nullable', 'string', 'max:150'],

            'process_date' => ['required', 'date'],

            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                    'On Hold',
                    'Cancelled',
                ]),
            ],

            'remarks' => ['nullable', 'string'],
        ]);

        $washing->update($validated);

        return redirect()
            ->route('washings.index')
            ->with('success', 'Washing / Laser process updated successfully.');
    }

    public function destroy(Washing $washing)
    {
        $washing->delete();

        return redirect()
            ->route('washings.index')
            ->with('success', 'Washing / Laser process deleted successfully.');
    }
}