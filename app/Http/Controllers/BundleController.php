<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BundleController extends Controller
{
    public function index()
    {
        $bundles = Bundle::latest()->paginate(10);

        return view('bundles.index', compact('bundles'));
    }

    public function create()
    {
        return view('bundles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bundle_no' => [
                'required',
                'string',
                'max:100',
                'unique:bundles,bundle_no',
            ],

            'qr_code' => [
                'required',
                'string',
                'max:150',
                'unique:bundles,qr_code',
            ],

            'cutting_no' => [
                'required',
                'string',
                'max:100',
            ],

            'marker_no' => [
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

            'bundle_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'bundle_date' => [
                'required',
                'date',
            ],

            'bundle_operator' => [
                'nullable',
                'string',
                'max:150',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Created',
                    'In Sewing',
                    'Completed',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        Bundle::create($validated);

        return redirect()
            ->route('bundles.index')
            ->with('success', 'Bundle created successfully.');
    }

    public function show(Bundle $bundle)
    {
        return view('bundles.show', compact('bundle'));
    }

    public function edit(Bundle $bundle)
    {
        return view('bundles.edit', compact('bundle'));
    }

    public function update(Request $request, Bundle $bundle)
    {
        $validated = $request->validate([
            'bundle_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique('bundles', 'bundle_no')
                    ->ignore($bundle->id),
            ],

            'qr_code' => [
                'required',
                'string',
                'max:150',
                Rule::unique('bundles', 'qr_code')
                    ->ignore($bundle->id),
            ],

            'cutting_no' => [
                'required',
                'string',
                'max:100',
            ],

            'marker_no' => [
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

            'bundle_quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'bundle_date' => [
                'required',
                'date',
            ],

            'bundle_operator' => [
                'nullable',
                'string',
                'max:150',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Created',
                    'In Sewing',
                    'Completed',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $bundle->update($validated);

        return redirect()
            ->route('bundles.index')
            ->with('success', 'Bundle updated successfully.');
    }

    public function destroy(Bundle $bundle)
    {
        $bundle->delete();

        return redirect()
            ->route('bundles.index')
            ->with('success', 'Bundle deleted successfully.');
    }
}