@extends('layouts.app')

@section('page-title', 'Add Reservation')

@section('page-subtitle', 'Reserve fabric for production requirements')

@section('content')

<div class="form-card">

    <form
        method="POST"
        action="{{ route('reservations.store') }}"
    >

        @csrf

        <div class="form-grid">

            {{-- Reservation No --}}
            <div class="form-group">

                <label>Reservation No</label>

                <input
                    type="text"
                    name="reservation_no"
                    value="{{ old('reservation_no') }}"
                    placeholder="RES-001"
                    required
                >

                @error('reservation_no')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Reservation Date --}}
            <div class="form-group">

                <label>Reservation Date</label>

                <input
                    type="date"
                    name="reservation_date"
                    value="{{ old('reservation_date', date('Y-m-d')) }}"
                    required
                >

                @error('reservation_date')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Fabric Store --}}
            <div class="form-group">

                <label>Fabric Store</label>

                <select
                    name="fabric_store_id"
                    id="fabric_store_id"
                    required
                >

                    <option value="">
                        Select Fabric Store
                    </option>

                    @foreach($fabricStores as $store)

                        <option
                            value="{{ $store->id }}"
                            data-fabric="{{ $store->fabric_id }}"
                            data-unit="{{ $store->unit }}"
                            data-available="{{ $store->quantity_available }}"
                            {{ old('fabric_store_id') == $store->id ? 'selected' : '' }}
                        >

                            {{ $store->store_no }}
                            -
                            {{ $store->fabric->fabric_code ?? '-' }}
                            -
                            {{ $store->quantity_available }}
                            {{ $store->unit }}

                        </option>

                    @endforeach

                </select>

                @error('fabric_store_id')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Fabric --}}
            <div class="form-group">

                <label>Fabric</label>

                <select
                    name="fabric_id"
                    id="fabric_id"
                    required
                >

                    <option value="">
                        Select Fabric
                    </option>

                    @foreach($fabrics as $fabric)

                        <option
                            value="{{ $fabric->id }}"
                            {{ old('fabric_id') == $fabric->id ? 'selected' : '' }}
                        >

                            {{ $fabric->fabric_code }}
                            -
                            {{ $fabric->fabric_name }}

                        </option>

                    @endforeach

                </select>

                @error('fabric_id')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Order No --}}
            <div class="form-group">

                <label>Order No</label>

                <input
                    type="text"
                    name="order_no"
                    value="{{ old('order_no') }}"
                    placeholder="ORD-001"
                >

                @error('order_no')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Reserved Quantity --}}
            <div class="form-group">

                <label>Reserved Quantity</label>

                <input
                    type="number"
                    name="reserved_quantity"
                    id="reserved_quantity"
                    value="{{ old('reserved_quantity') }}"
                    step="0.01"
                    min="0.01"
                    placeholder="0.00"
                    required
                >

                <small id="available_quantity_text"></small>

                @error('reserved_quantity')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Unit --}}
            <div class="form-group">

                <label>Unit</label>

                <select
                    name="unit"
                    id="unit"
                    required
                >

                    <option value="Kg"
                        {{ old('unit', 'Kg') == 'Kg' ? 'selected' : '' }}>
                        Kg
                    </option>

                    <option value="Meter"
                        {{ old('unit') == 'Meter' ? 'selected' : '' }}>
                        Meter
                    </option>

                    <option value="Piece"
                        {{ old('unit') == 'Piece' ? 'selected' : '' }}>
                        Piece
                    </option>

                </select>

                @error('unit')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Purpose --}}
            <div class="form-group">

                <label>Purpose</label>

                <input
                    type="text"
                    name="purpose"
                    value="{{ old('purpose') }}"
                    placeholder="Production requirement"
                >

                @error('purpose')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- Status --}}
            <div class="form-group">

                <label>Status</label>

                <select
                    name="status"
                    required
                >

                    <option
                        value="Reserved"
                        {{ old('status', 'Reserved') == 'Reserved' ? 'selected' : '' }}
                    >
                        Reserved
                    </option>

                    <option
                        value="Partially Reserved"
                        {{ old('status') == 'Partially Reserved' ? 'selected' : '' }}
                    >
                        Partially Reserved
                    </option>

                    <option
                        value="Released"
                        {{ old('status') == 'Released' ? 'selected' : '' }}
                    >
                        Released
                    </option>

                </select>

                @error('status')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>

        </div>


        {{-- Remarks --}}
        <div class="form-group">

            <label>Remarks</label>

            <textarea
                name="remarks"
                rows="4"
                placeholder="Enter remarks if required"
            >{{ old('remarks') }}</textarea>

            @error('remarks')
                <small class="error">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Actions --}}
        <div class="form-actions">

            <a
                href="{{ route('reservations.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Reservation
            </button>

        </div>

    </form>

</div>


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const storeSelect =
        document.getElementById('fabric_store_id');

    const fabricSelect =
        document.getElementById('fabric_id');

    const unitSelect =
        document.getElementById('unit');

    const quantityInput =
        document.getElementById('reserved_quantity');

    const availableText =
        document.getElementById('available_quantity_text');


    function updateStoreDetails() {

        const selected =
            storeSelect.options[
                storeSelect.selectedIndex
            ];

        if (!selected || !selected.value) {

            availableText.textContent = '';

            quantityInput.removeAttribute('max');

            return;
        }


        const fabricId =
            selected.dataset.fabric;

        const unit =
            selected.dataset.unit;

        const available =
            selected.dataset.available;


        if (fabricId) {

            fabricSelect.value = fabricId;

        }


        if (unit) {

            unitSelect.value = unit;

        }


        if (available) {

            quantityInput.setAttribute(
                'max',
                available
            );

            availableText.textContent =
                'Available: '
                + available
                + ' '
                + unit;

        }

    }


    storeSelect.addEventListener(
        'change',
        updateStoreDetails
    );


    quantityInput.addEventListener(
        'input',
        function () {

            const selected =
                storeSelect.options[
                    storeSelect.selectedIndex
                ];

            if (!selected || !selected.value) {
                return;
            }


            const available =
                parseFloat(
                    selected.dataset.available
                );

            const entered =
                parseFloat(
                    quantityInput.value
                );


            if (
                !isNaN(entered)
                &&
                entered > available
            ) {

                quantityInput.setCustomValidity(
                    'Reserved quantity cannot be greater than available quantity.'
                );

            } else {

                quantityInput.setCustomValidity('');

            }

        }
    );


    updateStoreDetails();

});

</script>

@endpush

@endsection