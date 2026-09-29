@extends('layouts.app')

@section('page-title', 'Edit Fabric Issue')
@section('page-subtitle', 'Update fabric issue details')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Fabric Issue</h2>
        <p>Update the fabric issue information.</p>
    </div>

    <a href="{{ route('fabric-issues.index') }}" class="btn">
        Back
    </a>
</div>


<div class="form-card">

    <form
        method="POST"
        action="{{ route('fabric-issues.update', $fabricIssue->id) }}"
    >

        @csrf
        @method('PUT')


        <div class="form-grid">

            {{-- Issue No --}}
            <div class="form-group">
                <label for="issue_no">Issue No</label>

                <input
                    type="text"
                    id="issue_no"
                    name="issue_no"
                    value="{{ old('issue_no', $fabricIssue->issue_no) }}"
                    required
                >

                @error('issue_no')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Issue Date --}}
            <div class="form-group">
                <label for="issue_date">Issue Date</label>

                <input
                    type="date"
                    id="issue_date"
                    name="issue_date"
                    value="{{ old('issue_date', $fabricIssue->issue_date?->format('Y-m-d')) }}"
                    required
                >

                @error('issue_date')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Reservation --}}
            <div class="form-group">
                <label for="reservation_id">Reservation</label>

                <select
                    id="reservation_id"
                    name="reservation_id"
                    required
                >
                    <option value="">Select Reservation</option>

                    @foreach($reservations as $reservation)

                        <option
                            value="{{ $reservation->id }}"
                            data-fabric="{{ $reservation->fabric_id }}"
                            data-store="{{ $reservation->fabric_store_id }}"
                            data-order="{{ $reservation->order_no }}"
                            data-unit="{{ $reservation->unit }}"
                            data-reserved="{{ $reservation->reserved_quantity }}"
                            {{ old('reservation_id', $fabricIssue->reservation_id) == $reservation->id ? 'selected' : '' }}
                        >
                            {{ $reservation->reservation_no }}
                            -
                            {{ $reservation->fabric->fabric_name ?? 'Fabric' }}
                            -
                            {{ $reservation->reserved_quantity }}
                            {{ $reservation->unit }}
                        </option>

                    @endforeach

                </select>

                @error('reservation_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror

                <small id="reserved_quantity_text"></small>
            </div>


            {{-- Fabric Store --}}
            <div class="form-group">
                <label for="fabric_store_id">Fabric Store</label>

                <select
                    id="fabric_store_id"
                    name="fabric_store_id"
                    required
                >
                    <option value="">Select Fabric Store</option>

                    @foreach($fabricStores as $store)

                        <option
                            value="{{ $store->id }}"
                            data-fabric="{{ $store->fabric_id }}"
                            data-unit="{{ $store->unit }}"
                            data-available="{{ $store->quantity_available }}"
                            {{ old('fabric_store_id', $fabricIssue->fabric_store_id) == $store->id ? 'selected' : '' }}
                        >
                            {{ $store->store_no }}
                            -
                            {{ $store->fabric->fabric_name ?? 'Fabric' }}
                            -
                            {{ $store->quantity_available }}
                            {{ $store->unit }}
                        </option>

                    @endforeach

                </select>

                @error('fabric_store_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror

                <small id="available_quantity_text"></small>
            </div>


            {{-- Fabric --}}
            <div class="form-group">
                <label for="fabric_id">Fabric</label>

                <select
                    id="fabric_id"
                    name="fabric_id"
                    required
                >

                    <option value="">Select Fabric</option>

                    @foreach($fabrics as $fabric)

                        <option
                            value="{{ $fabric->id }}"
                            {{ old('fabric_id', $fabricIssue->fabric_id) == $fabric->id ? 'selected' : '' }}
                        >
                            {{ $fabric->fabric_code }}
                            -
                            {{ $fabric->fabric_name }}
                        </option>

                    @endforeach

                </select>

                @error('fabric_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Order No --}}
            <div class="form-group">
                <label for="order_no">Order No</label>

                <input
                    type="text"
                    id="order_no"
                    name="order_no"
                    value="{{ old('order_no', $fabricIssue->order_no) }}"
                    placeholder="Example: SO-001"
                >

                @error('order_no')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Issue Quantity --}}
            <div class="form-group">
                <label for="issue_quantity">Issue Quantity</label>

                <input
                    type="number"
                    id="issue_quantity"
                    name="issue_quantity"
                    value="{{ old('issue_quantity', $fabricIssue->issue_quantity) }}"
                    step="0.01"
                    min="0.01"
                    required
                >

                <small id="quantity_limit_text"></small>

                @error('issue_quantity')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Unit --}}
            <div class="form-group">
                <label for="unit">Unit</label>

                <select
                    id="unit"
                    name="unit"
                    required
                >

                    <option
                        value="Kg"
                        {{ old('unit', $fabricIssue->unit) == 'Kg' ? 'selected' : '' }}
                    >
                        Kg
                    </option>

                    <option
                        value="Meter"
                        {{ old('unit', $fabricIssue->unit) == 'Meter' ? 'selected' : '' }}
                    >
                        Meter
                    </option>

                    <option
                        value="Piece"
                        {{ old('unit', $fabricIssue->unit) == 'Piece' ? 'selected' : '' }}
                    >
                        Piece
                    </option>

                </select>

                @error('unit')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Issued To --}}
            <div class="form-group">
                <label for="issued_to">Issued To</label>

                <input
                    type="text"
                    id="issued_to"
                    name="issued_to"
                    value="{{ old('issued_to', $fabricIssue->issued_to) }}"
                    placeholder="Example: Cutting"
                >

                @error('issued_to')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Status --}}
            <div class="form-group">
                <label for="status">Status</label>

                <select
                    id="status"
                    name="status"
                    required
                >

                    <option
                        value="Issued"
                        {{ old('status', $fabricIssue->status) == 'Issued' ? 'selected' : '' }}
                    >
                        Issued
                    </option>

                    <option
                        value="Partially Issued"
                        {{ old('status', $fabricIssue->status) == 'Partially Issued' ? 'selected' : '' }}
                    >
                        Partially Issued
                    </option>

                    <option
                        value="Cancelled"
                        {{ old('status', $fabricIssue->status) == 'Cancelled' ? 'selected' : '' }}
                    >
                        Cancelled
                    </option>

                </select>

                @error('status')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>


            {{-- Remarks --}}
            <div class="form-group form-group-full">

                <label for="remarks">
                    Remarks
                </label>

                <textarea
                    id="remarks"
                    name="remarks"
                    rows="4"
                    placeholder="Enter remarks if any"
                >{{ old('remarks', $fabricIssue->remarks) }}</textarea>

                @error('remarks')
                    <span class="error-text">{{ $message }}</span>
                @enderror

            </div>

        </div>


        <div class="form-actions">

            <a
                href="{{ route('fabric-issues.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Fabric Issue
            </button>

        </div>

    </form>

</div>


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const reservationSelect =
        document.getElementById('reservation_id');

    const storeSelect =
        document.getElementById('fabric_store_id');

    const fabricSelect =
        document.getElementById('fabric_id');

    const orderInput =
        document.getElementById('order_no');

    const unitSelect =
        document.getElementById('unit');

    const quantityInput =
        document.getElementById('issue_quantity');

    const reservedText =
        document.getElementById('reserved_quantity_text');

    const availableText =
        document.getElementById('available_quantity_text');

    const quantityLimitText =
        document.getElementById('quantity_limit_text');


    function updateReservationDetails() {

        const selected =
            reservationSelect.options[
                reservationSelect.selectedIndex
            ];

        if (!selected || !selected.value) {

            reservedText.textContent = '';

            return;
        }


        const fabricId =
            selected.dataset.fabric;

        const storeId =
            selected.dataset.store;

        const orderNo =
            selected.dataset.order;

        const unit =
            selected.dataset.unit;

        const reserved =
            selected.dataset.reserved;


        if (fabricId) {
            fabricSelect.value = fabricId;
        }

        if (storeId) {
            storeSelect.value = storeId;
        }

        if (orderNo) {
            orderInput.value = orderNo;
        }

        if (unit) {
            unitSelect.value = unit;
        }


        if (reserved) {

            reservedText.textContent =
                'Reserved: ' +
                reserved +
                ' ' +
                unit;

            quantityInput.setAttribute(
                'max',
                reserved
            );

            quantityLimitText.textContent =
                'Maximum issue quantity: ' +
                reserved +
                ' ' +
                unit;
        }


        updateStoreDetails();
    }


    function updateStoreDetails() {

        const selected =
            storeSelect.options[
                storeSelect.selectedIndex
            ];

        if (!selected || !selected.value) {

            availableText.textContent = '';

            return;
        }


        const available =
            selected.dataset.available;

        const unit =
            selected.dataset.unit;


        if (available) {

            availableText.textContent =
                'Available in store: ' +
                available +
                ' ' +
                unit;
        }
    }


    reservationSelect.addEventListener(
        'change',
        updateReservationDetails
    );


    storeSelect.addEventListener(
        'change',
        updateStoreDetails
    );


    quantityInput.addEventListener(
        'input',
        function () {

            const selected =
                reservationSelect.options[
                    reservationSelect.selectedIndex
                ];

            if (!selected || !selected.value) {
                return;
            }


            const reserved =
                parseFloat(
                    selected.dataset.reserved
                );

            const entered =
                parseFloat(
                    quantityInput.value
                );


            if (
                !isNaN(entered) &&
                entered > reserved
            ) {

                quantityInput.setCustomValidity(
                    'Issue quantity cannot be greater than reserved quantity.'
                );

            } else {

                quantityInput.setCustomValidity('');
            }

        }
    );


    updateReservationDetails();

});

</script>

@endpush

@endsection