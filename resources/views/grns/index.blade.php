@extends('layouts.app')

@section('title', 'GRN')

@section('content')

<div class="page-header">
    <div>
        <h1>Goods Receipt Notes</h1>
        <p>Manage goods receipt notes for received materials.</p>
    </div>

    <a href="{{ route('grns.create') }}" class="btn btn-primary">
        + Add GRN
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>GRN Records</h2>
            <p>All goods receipt notes are listed below.</p>
        </div>
    </div>

    <div class="table-wrapper">

        <table class="data-table">

            <thead>
                <tr>
                    <th>GRN No</th>
                    <th>Receiving No</th>
                    <th>Supplier</th>
                    <th>GRN Date</th>
                    <th>Received Qty</th>
                    <th>Accepted Qty</th>
                    <th>Rejected Qty</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($grns as $grn)

                    <tr>

                        <td>
                            <strong>{{ $grn->grn_no }}</strong>
                        </td>

                        <td>
                            {{ $grn->materialReceiving->receiving_no ?? '—' }}
                        </td>

                        <td>
                            {{ $grn->supplier_name }}
                        </td>

                        <td>
                            {{ $grn->grn_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ number_format($grn->received_quantity, 2) }}
                            {{ $grn->unit }}
                        </td>

                        <td>
                            {{ number_format($grn->accepted_quantity, 2) }}
                            {{ $grn->unit }}
                        </td>

                        <td>
                            {{ number_format($grn->rejected_quantity, 2) }}
                            {{ $grn->unit }}
                        </td>

                        <td>
                            <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $grn->status)) }}">
                                {{ $grn->status }}
                            </span>
                        </td>

                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('grns.show', $grn) }}"
                                    class="btn btn-sm"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('grns.edit', $grn) }}"
                                    class="btn btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('grns.destroy', $grn) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this GRN?')"
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
                            No GRN records found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($grns->hasPages())
        <div class="pagination-wrapper">
            {{ $grns->links() }}
        </div>
    @endif

</div>

@endsection