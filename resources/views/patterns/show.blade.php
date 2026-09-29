@extends('layouts.app')

@section('page-title', 'Pattern Details')

@section('page-subtitle', 'View pattern and CAD information')

@section('content')

<div class="page-header">

    <div>
        <h2>Pattern Details</h2>
    </div>

    <div class="action-buttons">

        <a href="{{ route('patterns.edit', $pattern) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('patterns.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>

    </div>

</div>


<div class="card">

    <div style="padding: 20px;">

        <p><strong>Pattern No</strong> : {{ $pattern->pattern_no }}</p>

        <p><strong>SO No</strong> : {{ $pattern->so_no }}</p>

        <p><strong>Item No</strong> : {{ $pattern->item_no }}</p>

        <p><strong>Pattern Name</strong> : {{ $pattern->pattern_name }}</p>

        <p><strong>CAD File Name</strong> : {{ $pattern->cad_file_name ?? '-' }}</p>

        <p><strong>Size Range</strong> : {{ $pattern->size_range ?? '-' }}</p>

        <p><strong>Pattern Version</strong> : {{ $pattern->pattern_version }}</p>

        <p>
            <strong>Created Date</strong> :
            {{ $pattern->created_date?->format('d-m-Y') }}
        </p>

        <p><strong>Status</strong> : {{ $pattern->status }}</p>

        <p><strong>Remarks</strong> : {{ $pattern->remarks ?? '-' }}</p>

    </div>

</div>

@endsection