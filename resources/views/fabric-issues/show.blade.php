@extends('layouts.app')

@section('page-title', 'Fabric Issue Details')
@section('page-subtitle', 'View fabric issue information')

@section('content')

<div class="page-header">
    <div>
        <h2>Fabric Issue Details</h2>
        <p>View complete details of the issued fabric.</p>
    </div>

    <div>
        <a
            href="{{ route('fabric-issues.edit', $fabricIssue->id) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('fabric-issues.index') }}"
            class="btn"
        >
            Back
        </a>
    </div>
</div>


<div class="form-card">

    <div class="form-grid">

        {{-- Issue No --}}
        <div class="form-group">
            <label>Issue No</label>

            <input
                type="text"
                value="{{ $fabricIssue->issue_no }}"
                readonly
            >
        </div>


        {{-- Issue Date --}}
        <div class="form-group">
            <label>Issue Date</label>

            <input
                type="text"
                value="{{ $fabricIssue->issue_date?->format('d-m-Y') }}"
                readonly
            >
        </div>


        {{-- Reservation --}}
        <div class="form-group">
            <label>Reservation</label>

            <input
                type="text"
                value="{{ $fabricIssue->reservation->reservation_no ?? '-' }}"
                readonly
            >
        </div>


        {{-- Fabric Store --}}
        <div class="form-group">
            <label>Fabric Store</label>

            <input
                type="text"
                value="{{ $fabricIssue->fabricStore->store_no ?? '-' }}"
                readonly
            >
        </div>


        {{-- Fabric --}}
        <div class="form-group">
            <label>Fabric</label>

            <input
                type="text"
                value="{{ $fabricIssue->fabric->fabric_code ?? '-' }} - {{ $fabricIssue->fabric->fabric_name ?? '-' }}"
                readonly
            >
        </div>


        {{-- Order No --}}
        <div class="form-group">
            <label>Order No</label>

            <input
                type="text"
                value="{{ $fabricIssue->order_no ?? '-' }}"
                readonly
            >
        </div>


        {{-- Issue Quantity --}}
        <div class="form-group">
            <label>Issue Quantity</label>

            <input
                type="text"
                value="{{ $fabricIssue->issue_quantity }} {{ $fabricIssue->unit }}"
                readonly
            >
        </div>


        {{-- Issued To --}}
        <div class="form-group">
            <label>Issued To</label>

            <input
                type="text"
                value="{{ $fabricIssue->issued_to ?? '-' }}"
                readonly
            >
        </div>


        {{-- Status --}}
        <div class="form-group">
            <label>Status</label>

            <input
                type="text"
                value="{{ $fabricIssue->status }}"
                readonly
            >
        </div>


        {{-- Remarks --}}
        <div class="form-group form-group-full">
            <label>Remarks</label>

            <textarea
                rows="4"
                readonly
            >{{ $fabricIssue->remarks ?? '-' }}</textarea>
        </div>

    </div>


    <div class="form-actions">

        <a
            href="{{ route('fabric-issues.index') }}"
            class="btn"
        >
            Back to Fabric Issues
        </a>

        <a
            href="{{ route('fabric-issues.edit', $fabricIssue->id) }}"
            class="btn btn-primary"
        >
            Edit Fabric Issue
        </a>

    </div>

</div>

@endsection