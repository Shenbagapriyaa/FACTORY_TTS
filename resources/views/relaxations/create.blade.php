@extends('layouts.app')

@section('page-title', 'Add Relaxation')

@section('page-subtitle', 'Record fabric relaxation before reservation')

@section('content')

<div class="form-card">

    <form
        method="POST"
        action="{{ route('relaxations.store') }}"
    >

        @csrf


        <div class="form-grid">

            {{-- RELAXATION NO --}}
            <div class="form-group">

                <label>Relaxation No</label>

                <input
                    type="text"
                    name="relaxation_no"
                    value="{{ old('relaxation_no') }}"
                    placeholder="REL-001"
                    required
                >

                @error('relaxation_no')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- RELAXATION DATE --}}
            <div class="form-group">

                <label>Relaxation Date</label>

                <input
                    type="date"
                    name="relaxation_date"
                    value="{{ old('relaxation_date', date('Y-m-d')) }}"
                    required
                >

                @error('relaxation_date')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- FABRIC STORE --}}
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
                            data-fabric-id="{{ $store->fabric_id }}"
                            data-available="{{ $store->quantity_available }}"
                            data-unit="{{ $store->unit }}"
                            {{ old('fabric_store_id') == $store->id ? 'selected' : '' }}
                        >

                            {{ $store->store_no }}

                            -

                            {{ $store->fabric->fabric_code ?? '-' }}

                            -

                            {{ $store->fabric->fabric_name ?? '-' }}

                            -

                            Available:
                            {{ $store->quantity_available }}
                            {{ $store->unit }}

                        </option>

                    @endforeach

                </select>

                @error('fabric_store_id')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- FABRIC --}}
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
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- LOT / BATCH --}}
            <div class="form-group">

                <label>Lot / Batch No</label>

                <input
                    type="text"
                    name="lot_batch_no"
                    value="{{ old('lot_batch_no') }}"
                    placeholder="LOT-001"
                >

                @error('lot_batch_no')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- INPUT QUANTITY --}}
            <div class="form-group">

                <label>
                    Input Quantity
                    <span
                        id="available-text"
                        style="font-size:12px;"
                    ></span>
                </label>

                <input
                    type="number"
                    name="input_quantity"
                    id="input_quantity"
                    value="{{ old('input_quantity') }}"
                    step="0.01"
                    min="0.01"
                    placeholder="0.00"
                    required
                >

                @error('input_quantity')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- UNIT --}}
            <div class="form-group">

                <label>Unit</label>

                <select
                    name="unit"
                    id="unit"
                    required
                >

                    <option
                        value="Kg"
                        {{ old('unit', 'Kg') == 'Kg' ? 'selected' : '' }}
                    >
                        Kg
                    </option>

                    <option
                        value="Meter"
                        {{ old('unit') == 'Meter' ? 'selected' : '' }}
                    >
                        Meter
                    </option>

                    <option
                        value="Piece"
                        {{ old('unit') == 'Piece' ? 'selected' : '' }}
                    >
                        Piece
                    </option>

                </select>

                @error('unit')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- START TIME --}}
            <div class="form-group">

                <label>Start Time</label>

                <input
                    type="datetime-local"
                    name="start_time"
                    id="start_time"
                    value="{{ old('start_time') }}"
                >

                @error('start_time')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- END TIME --}}
            <div class="form-group">

                <label>End Time</label>

                <input
                    type="datetime-local"
                    name="end_time"
                    id="end_time"
                    value="{{ old('end_time') }}"
                >

                @error('end_time')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- DURATION --}}
            <div class="form-group">

                <label>Duration (Hours)</label>

                <input
                    type="number"
                    name="duration_hours"
                    id="duration_hours"
                    value="{{ old('duration_hours') }}"
                    step="0.01"
                    min="0"
                    placeholder="Automatically calculated"
                    readonly
                >

                @error('duration_hours')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            {{-- STATUS --}}
            <div class="form-group">

                <label>Status</label>

                <select
                    name="status"
                    required
                >

                    <option
                        value="Pending"
                        {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="In Progress"
                        {{ old('status') == 'In Progress' ? 'selected' : '' }}
                    >
                        In Progress
                    </option>

                    <option
                        value="Completed"
                        {{ old('status') == 'Completed' ? 'selected' : '' }}
                    >
                        Completed
                    </option>

                </select>

                @error('status')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

        </div>


        {{-- REMARKS --}}
        <div class="form-group">

            <label>Remarks</label>

            <textarea
                name="remarks"
                rows="4"
                placeholder="Enter remarks if required"
            >{{ old('remarks') }}</textarea>

            @error('remarks')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- ACTIONS --}}
        <div class="form-actions">

            <a
                href="{{ route('relaxations.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Relaxation
            </button>

        </div>

    </form>

</div>


@push('scripts')

<script>

    const fabricStoreSelect =
        document.getElementById('fabric_store_id');

    const fabricSelect =
        document.getElementById('fabric_id');

    const quantityInput =
        document.getElementById('input_quantity');

    const unitSelect =
        document.getElementById('unit');

    const availableText =
        document.getElementById('available-text');

    const startTime =
        document.getElementById('start_time');

    const endTime =
        document.getElementById('end_time');

    const durationInput =
        document.getElementById('duration_hours');


    function updateStoreDetails() {

        const option =
            fabricStoreSelect.options[
                fabricStoreSelect.selectedIndex
            ];


        if (!option || !option.value) {

            availableText.textContent = '';

            return;

        }


        const fabricId =
            option.dataset.fabricId;

        const available =
            option.dataset.available;

        const unit =
            option.dataset.unit;


        availableText.textContent =
            ' | Available: '
            + available
            + ' '
            + unit;


        fabricSelect.value = fabricId;

        unitSelect.value = unit;

        quantityInput.max = available;

    }


    function calculateDuration() {

        if (
            !startTime.value ||
            !endTime.value
        ) {

            durationInput.value = '';

            return;

        }


        const start =
            new Date(startTime.value);

        const end =
            new Date(endTime.value);


        if (end < start) {

            durationInput.value = '';

            return;

        }


        const difference =
            (end - start) / (1000 * 60 * 60);


        durationInput.value =
            difference.toFixed(2);

    }


    fabricStoreSelect.addEventListener(
        'change',
        updateStoreDetails
    );


    startTime.addEventListener(
        'change',
        calculateDuration
    );


    endTime.addEventListener(
        'change',
        calculateDuration
    );


    quantityInput.addEventListener(
        'input',
        function () {

            const option =
                fabricStoreSelect.options[
                    fabricStoreSelect.selectedIndex
                ];

            if (!option || !option.value) {
                return;
            }

            const available =
                parseFloat(option.dataset.available);

            const entered =
                parseFloat(quantityInput.value);


            if (
                !isNaN(entered) &&
                entered > available
            ) {

                quantityInput.setCustomValidity(
                    'Input quantity cannot be greater than available quantity.'
                );

            } else {

                quantityInput.setCustomValidity('');

            }

        }
    );


    updateStoreDetails();

</script>

@endpush

@endsection