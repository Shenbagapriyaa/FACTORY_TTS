@extends('layouts.app')

@section('page-title', 'Reservation Details')

@section('page-subtitle', 'View fabric reservation details')

@section('content')

<div class="page-header">

    <div>
        <h2>Reservation Details</h2>

        <p>
            View the complete reservation information.
        </p>
    </div>

    <div>

        <a
            href="{{ route('reservations.edit', $reservation->id) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('reservations.index') }}"
            class="btn"
        >
            Back
        </a>

    </div>

</div>


<div class="form-card">

    <div class="form-grid">

        {{-- Reservation No --}}
        <div class="form-group">

            <label>Reservation No</label>

            <input
                type="text"
                value="{{ $reservation->reservation_no }}"
                readonly
            >

        </div>


        {{-- Reservation Date --}}
        <div class="form-group">

            <label>Reservation Date</label>

            <input
                type="text"
                value="{{ $reservation->reservation_date?->format('d-m-Y') }}"
                readonly
            >

        </div>


        {{-- Fabric Store --}}
        <div class="form-group">

            <label>Fabric Store</label>

            <input
                type="text"
                value="{{ $reservation->fabricStore->store_no ?? '-' }}"
                readonly
            >

        </div>


        {{-- Fabric --}}
        <div class="form-group">

            <label>Fabric</label>

            <input
                type="text"
                value="{{ $reservation->fabric->fabric_code ?? '-' }} - {{ $reservation->fabric->fabric_name ?? '-' }}"
                readonly
            >

        </div>


        {{-- Order No --}}
        <div class="form-group">

            <label>Order No</label>

            <input
                type="text"
                value="{{ $reservation->order_no ?? '-' }}"
                readonly
            >

        </div>


        {{-- Reserved Quantity --}}
        <div class="form-group">

            <label>Reserved Quantity</label>

            <input
                type="text"
                value="{{ $reservation->reserved_quantity }} {{ $reservation->unit }}"
                readonly
            >

        </div>


        {{-- Purpose --}}
        <div class="form-group">

            <label>Purpose</label>

            <input
                type="text"
                value="{{ $reservation->purpose ?? '-' }}"
                readonly
            >

        </div>


        {{-- Status --}}
        <div class="form-group">

            <label>Status</label>

            <input
                type="text"
                value="{{ $reservation->status }}"
                readonly
            >

        </div>

    </div>


    {{-- Remarks --}}
    <div class="form-group">

        <label>Remarks</label>

        <textarea
            rows="4"
            readonly
        >{{ $reservation->remarks ?? '-' }}</textarea>

    </div>


    <div class="form-actions">

        <a
            href="{{ route('reservations.index') }}"
            class="btn"
        >
            Back to Reservations
        </a>

        <a
            href="{{ route('reservations.edit', $reservation->id) }}"
            class="btn btn-primary"
        >
            Edit Reservation
        </a>

    </div>

</div>

@endsection