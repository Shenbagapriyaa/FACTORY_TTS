<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricStore;
use App\Models\GRN;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FabricStoreController extends Controller
{
    public function index()
    {
        $stores = FabricStore::with(['grn', 'fabric'])
            ->latest()
            ->paginate(10);

        return view(
            'fabric-stores.index',
            compact('stores')
        );
    }


    public function create()
    {
        $grns = GRN::with('materialReceiving')
            ->whereIn('status', [
                'Accepted',
                'Partially Accepted',
            ])
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'fabric-stores.create',
            compact('grns', 'fabrics')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'store_no' => [
                'required',
                'string',
                'max:50',
                'unique:fabric_stores,store_no',
            ],

            'grn_id' => [
                'required',
                'exists:grns,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'store_date' => [
                'required',
                'date',
            ],

            'quantity_received' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'quantity_available' => [
                'required',
                'numeric',
                'min:0',
                'lte:quantity_received',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'location' => [
                'nullable',
                'string',
                'max:100',
            ],

            'rack_no' => [
                'nullable',
                'string',
                'max:50',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Available',
                    'Partially Available',
                    'Reserved',
                    'Issued',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);


        FabricStore::create($validated);


        return redirect()
            ->route('fabric-stores.index')
            ->with(
                'success',
                'Fabric store record created successfully.'
            );
    }


    public function show(FabricStore $fabricStore)
    {
        $fabricStore->load([
            'grn',
            'fabric',
        ]);

        return view(
            'fabric-stores.show',
            compact('fabricStore')
        );
    }


    public function edit(FabricStore $fabricStore)
    {
        $grns = GRN::with('materialReceiving')
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'fabric-stores.edit',
            compact(
                'fabricStore',
                'grns',
                'fabrics'
            )
        );
    }


    public function update(
        Request $request,
        FabricStore $fabricStore
    ) {
        $validated = $request->validate([

            'store_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'fabric_stores',
                    'store_no'
                )->ignore($fabricStore->id),
            ],

            'grn_id' => [
                'required',
                'exists:grns,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'store_date' => [
                'required',
                'date',
            ],

            'quantity_received' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'quantity_available' => [
                'required',
                'numeric',
                'min:0',
                'lte:quantity_received',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'location' => [
                'nullable',
                'string',
                'max:100',
            ],

            'rack_no' => [
                'nullable',
                'string',
                'max:50',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Available',
                    'Partially Available',
                    'Reserved',
                    'Issued',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);


        $fabricStore->update($validated);


        return redirect()
            ->route('fabric-stores.index')
            ->with(
                'success',
                'Fabric store record updated successfully.'
            );
    }


    public function destroy(FabricStore $fabricStore)
    {
        $fabricStore->delete();

        return redirect()
            ->route('fabric-stores.index')
            ->with(
                'success',
                'Fabric store record deleted successfully.'
            );
    }
}