@extends('layouts.app')

@section('title', 'Finishing Details')

@section('page-title', 'Finishing Details')

@section('page-subtitle', 'View finishing process information')

@section('content')

<div class="card">

    <div class="finishing-details">

        <div class="detail-row">
            <div class="detail-label">Finishing No</div>
            <div class="detail-value">{{ $finishing->finishing_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Washing No</div>
            <div class="detail-value">{{ $finishing->washing_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Bundle No</div>
            <div class="detail-value">{{ $finishing->bundle_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">SO No</div>
            <div class="detail-value">{{ $finishing->so_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Item No</div>
            <div class="detail-value">{{ $finishing->item_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Size</div>
            <div class="detail-value">{{ $finishing->size }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Input Quantity</div>
            <div class="detail-value">{{ $finishing->input_quantity }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Output Quantity</div>
            <div class="detail-value">{{ $finishing->output_quantity ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Defect Quantity</div>
            <div class="detail-value">{{ $finishing->defect_quantity ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Rework Quantity</div>
            <div class="detail-value">{{ $finishing->rework_quantity ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Thread Trimming</div>
            <div class="detail-value">
                {{ $finishing->thread_trimming ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Ironing</div>
            <div class="detail-value">
                {{ $finishing->ironing ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Size Measurement</div>
            <div class="detail-value">
                {{ $finishing->size_measurement ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Visual Inspection</div>
            <div class="detail-value">
                {{ $finishing->visual_inspection ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Operator Name</div>
            <div class="detail-value">
                {{ $finishing->operator_name ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Finishing Date</div>
            <div class="detail-value">
                {{ $finishing->finishing_date?->format('d-m-Y') ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status</div>
            <div class="detail-value">
                {{ $finishing->status }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Defect Details</div>
            <div class="detail-value">
                {{ $finishing->defect_details ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Remarks</div>
            <div class="detail-value">
                {{ $finishing->remarks ?? '-' }}
            </div>
        </div>

    </div>


    <div class="detail-actions">

        <a href="{{ route('finishings.edit', $finishing) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('finishings.index') }}"
           class="btn">
            Back
        </a>

    </div>

</div>


<style>

    .finishing-details {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        overflow: hidden;
    }

    .detail-row {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #d1d5db;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        width: 30%;
        padding: 13px 16px;
        font-weight: 600;
        border-right: 1px solid #d1d5db;
    }

    .detail-value {
        width: 70%;
        padding: 13px 16px;
    }

    .detail-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

</style>

@endsection