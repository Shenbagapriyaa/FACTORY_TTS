@extends('layouts.app')

@section('title', 'Inspection')

@section('content')

<div class="page-header">
    <div>
        <h1>Inspection</h1>
        <p>Inspect received materials and record accepted and rejected quantities.</p>
    </div>

    <a href="{{ route('inspections.create') }}" class="btn btn-primary">
        + Add Inspection
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Inspection Records</h2>
            <p>All material inspection records are listed below.</p>
        </div>
    </div>

    <div class="table-wrapper">

        <table class="data-table">

            <thead>
                <tr>
                    <th>Inspection No</th>
                    <th>GRN No</th>
                    <th>Supplier</th>
                    <th>Inspection Date</th>
                    <th>Inspected</th>
                    <th>Accepted</th>
                    <th>Rejected</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($inspections as $inspection)

                    <tr>

                        <td>
                            <strong>
                                {{ $inspection->inspection_no }}
                            </strong>
                        </td>

                        <td>
                            {{ $inspection->grn?->grn_no ?? '—' }}
                        </td>

                        <td>
                            {{ $inspection->grn?->supplier_name ?? '—' }}
                        </td>

                        <td>
                            {{ $inspection->inspection_date?->format('d-m-Y') ?? '—' }}
                        </td>

                        <td>
                            {{ number_format($inspection->inspected_quantity, 2) }}
                            {{ $inspection->grn?->unit ?? 'Kg' }}
                        </td>

                        <td>
                            {{ number_format($inspection->accepted_quantity, 2) }}
                            {{ $inspection->grn?->unit ?? 'Kg' }}
                        </td>

                        <td>
                            {{ number_format($inspection->rejected_quantity, 2) }}
                            {{ $inspection->grn?->unit ?? 'Kg' }}
                        </td>

                        <td>

                            @php
                                $statusClass = match($inspection->status) {
                                    'Accepted' => 'status-accepted',
                                    'Partially Accepted' => 'status-partially-accepted',
                                    'Rejected' => 'status-rejected',
                                    default => 'status-default',
                                };
                            @endphp

                            <span class="status-badge {{ $statusClass }}">
                                {{ $inspection->status }}
                            </span>

                        </td>

                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('inspections.show', ['inspection' => $inspection->id]) }}"
                                    class="btn btn-sm"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('inspections.edit', ['inspection' => $inspection->id]) }}"
                                    class="btn btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('inspections.destroy', ['inspection' => $inspection->id]) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this inspection record?')"
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
                        <td colspan="9" class="empty-state">
                            No inspection records found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($inspections->hasPages())
        <div class="pagination-wrapper">
            {{ $inspections->links() }}
        </div>
    @endif

</div>

@endsection