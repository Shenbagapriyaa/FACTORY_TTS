@extends('layouts.app')

@section('page-title', 'Cutting Details')

@section('page-subtitle', 'View cutting information')

@section('content')

<div class="page-header">

    <div>
        <h2>Cutting Details</h2>
    </div>

    <div class="action-buttons">

        <a href="{{ route('cuttings.edit', $cutting) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('cuttings.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

<div class="card">

    <div style="padding: 25px;">

        <p><strong>Cutting No :</strong> {{ $cutting->cutting_no }}</p>

        <p><strong>Marker No :</strong> {{ $cutting->marker_no }}</p>

        <p><strong>Pattern No :</strong> {{ $cutting->pattern_no }}</p>

        <p><strong>SO No :</strong> {{ $cutting->so_no }}</p>

        <p><strong>Item No :</strong> {{ $cutting->item_no }}</p>

        <p>
            <strong>Cutting Date :</strong>
            {{ $cutting->cutting_date?->format('d-m-Y') }}
        </p>

        <p><strong>Fabric Issue No :</strong> {{ $cutting->fabric_issue_no }}</p>

        <p>
            <strong>Lay Quantity :</strong>
            {{ $cutting->lay_quantity ?? '-' }}
        </p>

        <p>
            <strong>Ply Count :</strong>
            {{ $cutting->ply_count ?? '-' }}
        </p>

        <p>
            <strong>Planned Cut Quantity :</strong>
            {{ $cutting->planned_cut_qty ?? '-' }}
        </p>

        <p>
            <strong>Actual Cut Quantity :</strong>
            {{ $cutting->actual_cut_qty ?? '-' }}
        </p>

        <p>
            <strong>Rejected Quantity :</strong>
            {{ $cutting->rejected_qty ?? '-' }}
        </p>

        <p>
            <strong>Cutter / Operator :</strong>
            {{ $cutting->cutter_operator ?? '-' }}
        </p>

        <p><strong>Status :</strong> {{ $cutting->status }}</p>

        <p>
            <strong>Remarks :</strong>
            {{ $cutting->remarks ?? '-' }}
        </p>

    </div>

</div>

@endsection