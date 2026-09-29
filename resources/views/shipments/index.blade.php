@extends('layouts.app')

@section('title', 'Shipment')

@section('page-title', 'Shipment')

@section('page-subtitle', 'Track garment shipment and delivery details')

@section('content')

<div class="page-header">
    <div>
        <h2>Shipment Records</h2>
        <p>Track packed garments, shipment quantities and delivery status.</p>
    </div>
</div>


<div style="margin-top: 18px; margin-bottom: 18px;">
    <a href="{{ route('shipments.create') }}" class="btn btn-primary">
        + Add Shipment
    </a>
</div>


<div class="card">

    <table class="table shipment-table">

        <thead>
            <tr>
                <th>Shipment No</th>
                <th>Packing No</th>
                <th>SO No</th>
                <th>Item No</th>
                <th>Customer</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Destination</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>

            @forelse($shipments as $shipment)

                <tr>

                    <td>{{ $shipment->shipment_no }}</td>

                    <td>{{ $shipment->packing_no }}</td>

                    <td>{{ $shipment->so_no }}</td>

                    <td>{{ $shipment->item_no }}</td>

                    <td>{{ $shipment->customer_name }}</td>

                    <td>{{ $shipment->shipment_quantity }}</td>

                    <td>
                        {{ $shipment->shipment_date?->format('d-m-Y') }}
                    </td>

                    <td>{{ $shipment->destination }}</td>

                    <td>{{ $shipment->status }}</td>

                    <td class="actions-cell">

                        <div class="action-buttons">

                            <a href="{{ route('shipments.show', $shipment) }}"
                               class="action-btn">
                                View
                            </a>

                            <a href="{{ route('shipments.edit', $shipment) }}"
                               class="action-btn">
                                Edit
                            </a>

                            <form action="{{ route('shipments.destroy', $shipment) }}"
                                  method="POST"
                                  class="delete-form"
                                  onsubmit="return confirm('Are you sure you want to delete this shipment record?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="action-btn">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="10" class="empty-row">
                        No shipment records found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>


    @if($shipments->hasPages())

        <div style="margin-top: 20px;">
            {{ $shipments->links() }}
        </div>

    @endif

</div>


<style>

    .shipment-table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border: 1px solid #d1d5db;
    }


    .shipment-table th,
    .shipment-table td {
        border: 1px solid #d1d5db;
        padding: 10px 7px;
        text-align: center;
        vertical-align: middle;
        word-break: break-word;
    }


    .shipment-table th {
        font-weight: 600;
        background: #f8fafc;
    }


    /* Shipment No */

    .shipment-table th:nth-child(1),
    .shipment-table td:nth-child(1) {
        width: 11%;
    }


    /* Packing No */

    .shipment-table th:nth-child(2),
    .shipment-table td:nth-child(2) {
        width: 10%;
    }


    /* SO No */

    .shipment-table th:nth-child(3),
    .shipment-table td:nth-child(3) {
        width: 11%;
    }


    /* Item No */

    .shipment-table th:nth-child(4),
    .shipment-table td:nth-child(4) {
        width: 11%;
    }


    /* Customer */

    .shipment-table th:nth-child(5),
    .shipment-table td:nth-child(5) {
        width: 11%;
    }


    /* Quantity - FIXED */

    .shipment-table th:nth-child(6),
    .shipment-table td:nth-child(6) {
        width: 8%;
        white-space: nowrap;
    }


    /* Date */

    .shipment-table th:nth-child(7),
    .shipment-table td:nth-child(7) {
        width: 10%;
        white-space: nowrap;
    }


    /* Destination - FIXED */

    .shipment-table th:nth-child(8),
    .shipment-table td:nth-child(8) {
        width: 10%;
        white-space: nowrap;
    }


    /* Status */

    .shipment-table th:nth-child(9),
    .shipment-table td:nth-child(9) {
        width: 9%;
        white-space: nowrap;
    }


    /* Actions */

    .shipment-table th:nth-child(10),
    .shipment-table td:nth-child(10) {
        width: 19%;
    }


    .actions-cell {
        white-space: nowrap;
    }


    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        flex-wrap: nowrap;
    }


    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 7px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        background: transparent;
        text-decoration: none;
        font-size: 12px;
        cursor: pointer;
        white-space: nowrap;
    }


    .delete-form {
        display: inline;
        margin: 0;
        padding: 0;
    }


    .empty-row {
        text-align: center !important;
        padding: 30px !important;
        font-weight: 500;
    }

</style>

@endsection