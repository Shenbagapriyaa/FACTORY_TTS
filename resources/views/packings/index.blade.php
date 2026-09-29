@extends('layouts.app')

@section('title', 'Packing')

@section('page-title', 'Packing')

@section('page-subtitle', 'Track garment packing and packed quantities')

@section('content')

<div class="page-header">
    <div>
        <h2>Packing Records</h2>
        <p>Track packing, packed quantity and rejected quantity.</p>
    </div>
</div>

<div style="margin-top: 18px; margin-bottom: 18px;">
    <a href="{{ route('packings.create') }}" class="btn btn-primary">
        + Add Packing
    </a>
</div>

<div class="card">

    <table class="table packing-table">

        <thead>
            <tr>
                <th>Packing No</th>
                <th>Finishing No</th>
                <th>Bundle No</th>
                <th>SO No</th>
                <th>Item No</th>
                <th>Size</th>
                <th>Input</th>
                <th>Packed</th>
                <th>Rejected</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($packings as $packing)

                <tr>

                    <td>{{ $packing->packing_no }}</td>

                    <td>{{ $packing->finishing_no }}</td>

                    <td>{{ $packing->bundle_no }}</td>

                    <td>{{ $packing->so_no }}</td>

                    <td>{{ $packing->item_no }}</td>

                    <td>{{ $packing->size }}</td>

                    <td>{{ $packing->input_quantity }}</td>

                    <td>{{ $packing->packed_quantity ?? '-' }}</td>

                    <td>{{ $packing->rejected_quantity ?? '-' }}</td>

                    <td>{{ $packing->status }}</td>

                    <td class="actions-cell">

                        <div class="action-buttons">

                            <a href="{{ route('packings.show', $packing) }}"
                               class="action-btn">
                                View
                            </a>

                            <a href="{{ route('packings.edit', $packing) }}"
                               class="action-btn">
                                Edit
                            </a>

                            <form action="{{ route('packings.destroy', $packing) }}"
                                  method="POST"
                                  class="delete-form"
                                  onsubmit="return confirm('Are you sure you want to delete this packing record?');">

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
                    <td colspan="11" class="empty-row">
                        No packing records found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    @if($packings->hasPages())
        <div style="margin-top: 20px;">
            {{ $packings->links() }}
        </div>
    @endif

</div>


<style>

    .packing-table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border: 1px solid #d1d5db;
    }

    .packing-table th,
    .packing-table td {
        border: 1px solid #d1d5db;
        padding: 10px 7px;
        text-align: center;
        vertical-align: middle;
        word-break: break-word;
    }

    .packing-table th {
        font-weight: 600;
        background: #f8fafc;
    }

    .packing-table th:nth-child(1),
    .packing-table td:nth-child(1) {
        width: 9%;
    }

    .packing-table th:nth-child(2),
    .packing-table td:nth-child(2) {
        width: 9%;
    }

    .packing-table th:nth-child(3),
    .packing-table td:nth-child(3) {
        width: 8%;
    }

    .packing-table th:nth-child(4),
    .packing-table td:nth-child(4) {
        width: 10%;
    }

    .packing-table th:nth-child(5),
    .packing-table td:nth-child(5) {
        width: 10%;
    }

    .packing-table th:nth-child(6),
    .packing-table td:nth-child(6) {
        width: 5%;
    }

    .packing-table th:nth-child(7),
    .packing-table td:nth-child(7) {
        width: 6%;
    }

    .packing-table th:nth-child(8),
    .packing-table td:nth-child(8) {
        width: 7%;
    }

    /* FIXED: Rejected column */
    .packing-table th:nth-child(9),
    .packing-table td:nth-child(9) {
        width: 8%;
        white-space: nowrap;
        word-break: normal;
        overflow-wrap: normal;
    }

    .packing-table th:nth-child(10),
    .packing-table td:nth-child(10) {
        width: 9%;
    }

    .packing-table th:nth-child(11),
    .packing-table td:nth-child(11) {
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