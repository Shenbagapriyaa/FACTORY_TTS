@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Washing / Laser Details</h1>
        <p>View process details.</p>
    </div>

    <div>
        <a href="{{ route('washings.edit', $washing) }}" class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('washings.index') }}" class="btn">
            Back
        </a>
    </div>
</div>

<div class="card">

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

        <div>
            <strong>Washing No</strong>
            <p>{{ $washing->washing_no }}</p>
        </div>

        <div>
            <strong>Sewing No</strong>
            <p>{{ $washing->sewing_no }}</p>
        </div>

        <div>
            <strong>Bundle No</strong>
            <p>{{ $washing->bundle_no }}</p>
        </div>

        <div>
            <strong>SO No</strong>
            <p>{{ $washing->so_no }}</p>
        </div>

        <div>
            <strong>Item No</strong>
            <p>{{ $washing->item_no }}</p>
        </div>

        <div>
            <strong>Size</strong>
            <p>{{ $washing->size }}</p>
        </div>

        <div>
            <strong>Process Type</strong>
            <p>{{ $washing->process_type }}</p>
        </div>

        <div>
            <strong>Input Quantity</strong>
            <p>{{ $washing->input_quantity }}</p>
        </div>

        <div>
            <strong>Output Quantity</strong>
            <p>{{ $washing->output_quantity ?? '-' }}</p>
        </div>

        <div>
            <strong>Rejected Quantity</strong>
            <p>{{ $washing->rejected_quantity ?? '-' }}</p>
        </div>

        <div>
            <strong>Washing Machine</strong>
            <p>{{ $washing->washing_machine ?? '-' }}</p>
        </div>

        <div>
            <strong>Operator Name</strong>
            <p>{{ $washing->operator_name ?? '-' }}</p>
        </div>

        <div>
            <strong>Process Date</strong>
            <p>
                {{ $washing->process_date?->format('d-m-Y') ?? '-' }}
            </p>
        </div>

        <div>
            <strong>Status</strong>
            <p>{{ $washing->status }}</p>
        </div>

    </div>

    <div style="margin-top:20px;">
        <strong>Remarks</strong>
        <p>{{ $washing->remarks ?? '-' }}</p>
    </div>

</div>

@endsection