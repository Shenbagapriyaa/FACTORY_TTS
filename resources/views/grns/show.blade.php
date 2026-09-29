@extends('layouts.app')

@section('title', 'View GRN')

@section('content')

<div class="page-header">

    <div>
        <h1>GRN Details</h1>
        <p>View goods receipt note information.</p>
    </div>

    <div class="table-actions">

        <a href="{{ route('grns.edit', $grn) }}" class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('grns.index') }}" class="btn">
            ← Back
        </a>

    </div>

</div>


<div class="panel">

    <div class="panel-header">

        <div>
            <h2>{{ $grn->grn_no }}</h2>
            <p>Goods Receipt Note information</p>
        </div>

    </div>


    <div class="table-wrapper">

        <table class="data-table">

            <tbody>

                <tr>
                    <th>GRN No</th>
                    <td>{{ $grn->grn_no }}</td>
                </tr>

                <tr>
                    <th>Material Receiving No</th>
                    <td>
                        {{ $grn->materialReceiving->receiving_no ?? '—' }}
                    </td>
                </tr>

                <tr>
                    <th>Supplier Name</th>
                    <td>{{ $grn->supplier_name }}</td>
                </tr>

                <tr>
                    <th>GRN Date</th>
                    <td>
                        {{ $grn->grn_date?->format('d-m-Y') }}
                    </td>
                </tr>

                <tr>
                    <th>Received Quantity</th>
                    <td>
                        {{ number_format($grn->received_quantity, 2) }}
                        {{ $grn->unit }}
                    </td>
                </tr>

                <tr>
                    <th>Accepted Quantity</th>
                    <td>
                        {{ number_format($grn->accepted_quantity, 2) }}
                        {{ $grn->unit }}
                    </td>
                </tr>

                <tr>
                    <th>Rejected Quantity</th>
                    <td>
                        {{ number_format($grn->rejected_quantity, 2) }}
                        {{ $grn->unit }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $grn->status)) }}">
                            {{ $grn->status }}
                        </span>

                    </td>
                </tr>

                <tr>
                    <th>Remarks</th>
                    <td>
                        {{ $grn->remarks ?: '—' }}
                    </td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>
                        {{ $grn->created_at?->format('d-m-Y H:i') }}
                    </td>
                </tr>

                <tr>
                    <th>Last Updated</th>
                    <td>
                        {{ $grn->updated_at?->format('d-m-Y H:i') }}
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection