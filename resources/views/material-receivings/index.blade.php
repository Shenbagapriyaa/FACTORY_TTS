@extends('layouts.app')

@section('title', 'Material Receiving')

@section('content')

<div class="page-header">
    <div>
        <h1>Material Receiving</h1>
        <p>Manage incoming fabric and material receipts.</p>
    </div>

    <a href="{{ route('material-receivings.create') }}" class="btn btn-primary">
        + Add Material Receiving
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Receiving Records</h2>
            <p>All received materials are listed below.</p>
        </div>
    </div>

    <div class="table-wrapper">

        <table class="data-table">

            <thead>
                <tr>
                    <th>Receiving No</th>
                    <th>Supplier</th>
                    <th>Fabric</th>
                    <th>Received Date</th>
                    <th>Lot / Batch</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($receivings as $receiving)

                    <tr>

                        <td>
                            <strong>
                                {{ $receiving->receiving_no }}
                            </strong>
                        </td>

                        <td>
                            {{ $receiving->supplier_name }}
                        </td>

                        <td>
                            {{ $receiving->fabric?->fabric_name ?? '—' }}
                        </td>

                        <td>
                            {{ $receiving->received_date?->format('d-m-Y') ?? '—' }}
                        </td>

                        <td>
                            {{ $receiving->lot_batch_no }}
                        </td>

                        <td>
                            {{ number_format($receiving->received_quantity, 2) }}
                            {{ $receiving->unit }}
                        </td>

                        <td>
                            @php
                                $statusClass = match($receiving->status) {
                                    'Received' => 'status-received',
                                    'Inspected' => 'status-inspected',
                                    'Rejected' => 'status-rejected',
                                    default => 'status-default',
                                };
                            @endphp

                            <span class="status-badge {{ $statusClass }}">
                                {{ $receiving->status }}
                            </span>
                        </td>

                        <td>

                            <div class="table-actions">

                                {{-- VIEW --}}
                                <a
                                    href="{{ route('material-receivings.show', ['material_receiving' => $receiving->id]) }}"
                                    class="btn btn-sm"
                                >
                                    View
                                </a>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('material-receivings.edit', ['material_receiving' => $receiving->id]) }}"
                                    class="btn btn-sm"
                                >
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form
                                    action="{{ route('material-receivings.destroy', ['material_receiving' => $receiving->id]) }}"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this receiving record?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="empty-state">
                            No material receiving records found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($receivings->hasPages())
        <div class="pagination-wrapper">
            {{ $receivings->links() }}
        </div>
    @endif

</div>

@endsection