@extends('layouts.app')

@section('title', 'Material Receiving Details')

@section('content')

<div class="page-header">
    <div>
        <h1>Material Receiving Details</h1>
        <p>View complete receiving information.</p>
    </div>

    <div class="table-actions">
        <a href="{{ route('material-receivings.edit', ['material_receiving' => $materialReceiving->id]) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('material-receivings.index') }}"
           class="btn">
            Back
        </a>
    </div>
</div>

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>{{ $materialReceiving->receiving_no }}</h2>
            <p>Material receiving record</p>
        </div>
    </div>

    <div class="detail-grid">

        <div class="detail-item">
            <span class="detail-label">Receiving No</span>
            <strong>{{ $materialReceiving->receiving_no }}</strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Supplier</span>
            <strong>{{ $materialReceiving->supplier_name }}</strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Fabric</span>
            <strong>
                {{ $materialReceiving->fabric?->fabric_name ?? '—' }}
            </strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Received Date</span>
            <strong>
                {{ $materialReceiving->received_date?->format('d-m-Y') ?? '—' }}
            </strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Lot / Batch No</span>
            <strong>{{ $materialReceiving->lot_batch_no }}</strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Quantity</span>
            <strong>
                {{ number_format($materialReceiving->received_quantity, 2) }}
                {{ $materialReceiving->unit }}
            </strong>
        </div>

        <div class="detail-item">
            <span class="detail-label">Status</span>

            <span class="status-badge
                @if($materialReceiving->status === 'Received')
                    status-received
                @elseif($materialReceiving->status === 'Inspected')
                    status-inspected
                @elseif($materialReceiving->status === 'Rejected')
                    status-rejected
                @endif
            ">
                {{ $materialReceiving->status }}
            </span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Created At</span>
            <strong>
                {{ $materialReceiving->created_at?->format('d-m-Y H:i') ?? '—' }}
            </strong>
        </div>

        <div class="detail-item detail-full">
            <span class="detail-label">Remarks</span>

            <p>
                {{ $materialReceiving->remarks ?: 'No remarks provided.' }}
            </p>
        </div>

    </div>

</div>

@endsection