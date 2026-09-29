@extends('layouts.app')

@section('page-title', 'Marker Details')

@section('page-subtitle', 'View marker and cutting information')

@section('content')

<div class="page-header">

    <div>
        <h2>Marker Details</h2>
    </div>

    <div class="action-buttons">

        <a href="{{ route('markers.edit', $marker) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('markers.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>

    </div>

</div>


<div class="card">

    <div style="padding: 20px;">

        <p>
            <strong>Marker No</strong> :
            {{ $marker->marker_no }}
        </p>

        <p>
            <strong>Pattern No</strong> :
            {{ $marker->pattern_no }}
        </p>

        <p>
            <strong>SO No</strong> :
            {{ $marker->so_no }}
        </p>

        <p>
            <strong>Item No</strong> :
            {{ $marker->item_no }}
        </p>

        <p>
            <strong>Marker Name</strong> :
            {{ $marker->marker_name }}
        </p>

        <p>
            <strong>Size Ratio</strong> :
            {{ $marker->size_ratio ?? '-' }}
        </p>

        <p>
            <strong>Marker Length</strong> :
            {{ $marker->marker_length ?? '-' }}
        </p>

        <p>
            <strong>Marker Width</strong> :
            {{ $marker->marker_width ?? '-' }}
        </p>

        <p>
            <strong>Fabric Consumption</strong> :
            {{ $marker->fabric_consumption ?? '-' }}
        </p>

        <p>
            <strong>Ply Count</strong> :
            {{ $marker->ply_count ?? '-' }}
        </p>

        <p>
            <strong>Efficiency</strong> :
            {{ $marker->efficiency !== null
                ? $marker->efficiency . '%'
                : '-' }}
        </p>

        <p>
            <strong>Created Date</strong> :
            {{ $marker->created_date?->format('d-m-Y') }}
        </p>

        <p>
            <strong>Status</strong> :
            {{ $marker->status }}
        </p>

        <p>
            <strong>Remarks</strong> :
            {{ $marker->remarks ?? '-' }}
        </p>

    </div>

</div>

@endsection