<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricIssue;
use App\Models\FabricStore;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FabricIssueController extends Controller
{
    public function index()
    {
        $issues = FabricIssue::with([
            'reservation',
            'fabricStore',
            'fabric',
        ])
            ->latest()
            ->paginate(10);

        return view(
            'fabric-issues.index',
            compact('issues')
        );
    }

    public function create()
    {
        $reservations = Reservation::with([
            'fabric',
            'fabricStore',
        ])
            ->whereIn('status', [
                'Reserved',
                'Partially Reserved',
            ])
            ->where('reserved_quantity', '>', 0)
            ->latest()
            ->get();

        $fabricStores = FabricStore::with('fabric')
            ->where('quantity_available', '>', 0)
            ->whereIn('status', [
                'Available',
                'Partially Available',
                'Reserved',
            ])
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'fabric-issues.create',
            compact(
                'reservations',
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'issue_no' => [
                'required',
                'string',
                'max:50',
                'unique:fabric_issues,issue_no',
            ],

            'reservation_id' => [
                'required',
                'exists:reservations,id',
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'issue_date' => [
                'required',
                'date',
            ],

            'order_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'issue_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'issued_to' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Issued',
                    'Partially Issued',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $reservation = Reservation::findOrFail(
            $validated['reservation_id']
        );

        $fabricStore = FabricStore::findOrFail(
            $validated['fabric_store_id']
        );

        if (
            $validated['issue_quantity']
            > $reservation->reserved_quantity
        ) {
            return back()
                ->withErrors([
                    'issue_quantity' =>
                        'Issue quantity cannot be greater than the reserved quantity.',
                ])
                ->withInput();
        }

        if (
            $validated['issue_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'issue_quantity' =>
                        'Issue quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        FabricIssue::create($validated);

        return redirect()
            ->route('fabric-issues.index')
            ->with(
                'success',
                'Fabric issue created successfully.'
            );
    }

    public function show(FabricIssue $fabricIssue)
    {
        $fabricIssue->load([
            'reservation',
            'fabricStore',
            'fabric',
        ]);

        return view(
            'fabric-issues.show',
            compact('fabricIssue')
        );
    }

    public function edit(FabricIssue $fabricIssue)
    {
        $reservations = Reservation::with([
            'fabric',
            'fabricStore',
        ])
            ->whereIn('status', [
                'Reserved',
                'Partially Reserved',
            ])
            ->latest()
            ->get();

        $fabricStores = FabricStore::with('fabric')
            ->where('quantity_available', '>', 0)
            ->latest()
            ->get();

        $fabrics = Fabric::where('status', 'Active')
            ->orderBy('fabric_name')
            ->get();

        return view(
            'fabric-issues.edit',
            compact(
                'fabricIssue',
                'reservations',
                'fabricStores',
                'fabrics'
            )
        );
    }

    public function update(
        Request $request,
        FabricIssue $fabricIssue
    ) {
        $validated = $request->validate([
            'issue_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'fabric_issues',
                    'issue_no'
                )->ignore($fabricIssue->id),
            ],

            'reservation_id' => [
                'required',
                'exists:reservations,id',
            ],

            'fabric_store_id' => [
                'required',
                'exists:fabric_stores,id',
            ],

            'fabric_id' => [
                'required',
                'exists:fabrics,id',
            ],

            'issue_date' => [
                'required',
                'date',
            ],

            'order_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'issue_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'issued_to' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Issued',
                    'Partially Issued',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $reservation = Reservation::findOrFail(
            $validated['reservation_id']
        );

        $fabricStore = FabricStore::findOrFail(
            $validated['fabric_store_id']
        );

        if (
            $validated['issue_quantity']
            > $reservation->reserved_quantity
        ) {
            return back()
                ->withErrors([
                    'issue_quantity' =>
                        'Issue quantity cannot be greater than the reserved quantity.',
                ])
                ->withInput();
        }

        if (
            $validated['issue_quantity']
            > $fabricStore->quantity_available
        ) {
            return back()
                ->withErrors([
                    'issue_quantity' =>
                        'Issue quantity cannot be greater than the available fabric store quantity.',
                ])
                ->withInput();
        }

        $fabricIssue->update($validated);

        return redirect()
            ->route('fabric-issues.index')
            ->with(
                'success',
                'Fabric issue updated successfully.'
            );
    }

    public function destroy(FabricIssue $fabricIssue)
    {
        $fabricIssue->delete();

        return redirect()
            ->route('fabric-issues.index')
            ->with(
                'success',
                'Fabric issue deleted successfully.'
            );
    }
}