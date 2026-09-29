@extends('layouts.app')

@section('title', 'Add Inspection')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Inspection</h1>
        <p>Inspect a GRN and record accepted and rejected quantities.</p>
    </div>

    <a href="{{ route('inspections.index') }}" class="btn">
        Back
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Inspection Information</h2>
            <p>Select a GRN and enter the inspection results.</p>
        </div>
    </div>

    <form
        action="{{ route('inspections.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-grid">

            {{-- Inspection Number --}}
            <div class="form-group">
                <label for="inspection_no">
                    Inspection No <span>*</span>
                </label>

                <input
                    type="text"
                    id="inspection_no"
                    name="inspection_no"
                    value="{{ old('inspection_no') }}"
                    placeholder="Example: INS-001"
                    required
                >
            </div>

            {{-- Inspection Date --}}
            <div class="form-group">
                <label for="inspection_date">
                    Inspection Date <span>*</span>
                </label>

                <input
                    type="date"
                    id="inspection_date"
                    name="inspection_date"
                    value="{{ old('inspection_date', now()->format('Y-m-d')) }}"
                    required
                >
            </div>

            {{-- GRN --}}
            <div class="form-group form-group-full">
                <label for="grn_id">
                    GRN <span>*</span>
                </label>

                <select
                    id="grn_id"
                    name="grn_id"
                    required
                >
                    <option value="">Select GRN</option>

                    @foreach($grns as $grn)

                        <option
                            value="{{ $grn->id }}"
                            data-quantity="{{ $grn->accepted_quantity }}"
                            data-unit="{{ $grn->unit }}"
                            @selected(old('grn_id') == $grn->id)
                        >
                            {{ $grn->grn_no }}
                            —
                            {{ $grn->supplier_name }}
                            —
                            {{ number_format($grn->accepted_quantity, 2) }}
                            {{ $grn->unit }}
                        </option>

                    @endforeach

                </select>
            </div>

            {{-- GRN Quantity Information --}}
            <div class="form-group">
                <label>
                    GRN Accepted Quantity
                </label>

                <input
                    type="text"
                    id="grn_quantity_display"
                    value=""
                    readonly
                    placeholder="Select GRN"
                >
            </div>

            {{-- Received Quantity --}}
            <div class="form-group">
                <label for="received_quantity">
                    Received Quantity <span>*</span>
                </label>

                <input
                    type="number"
                    id="received_quantity"
                    name="received_quantity"
                    step="0.01"
                    min="0.01"
                    value="{{ old('received_quantity') }}"
                    required
                >
            </div>

            {{-- Inspected Quantity --}}
            <div class="form-group">
                <label for="inspected_quantity">
                    Inspected Quantity <span>*</span>
                </label>

                <input
                    type="number"
                    id="inspected_quantity"
                    name="inspected_quantity"
                    step="0.01"
                    min="0.01"
                    value="{{ old('inspected_quantity') }}"
                    required
                >
            </div>

            {{-- Accepted Quantity --}}
            <div class="form-group">
                <label for="accepted_quantity">
                    Accepted Quantity <span>*</span>
                </label>

                <input
                    type="number"
                    id="accepted_quantity"
                    name="accepted_quantity"
                    step="0.01"
                    min="0"
                    value="{{ old('accepted_quantity', 0) }}"
                    required
                >
            </div>

            {{-- Rejected Quantity --}}
            <div class="form-group">
                <label for="rejected_quantity">
                    Rejected Quantity <span>*</span>
                </label>

                <input
                    type="number"
                    id="rejected_quantity"
                    name="rejected_quantity"
                    step="0.01"
                    min="0"
                    value="{{ old('rejected_quantity', 0) }}"
                    required
                >
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">
                    Status <span>*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >
                    <option value="Accepted"
                        @selected(old('status') === 'Accepted')>
                        Accepted
                    </option>

                    <option value="Partially Accepted"
                        @selected(old('status') === 'Partially Accepted')>
                        Partially Accepted
                    </option>

                    <option value="Rejected"
                        @selected(old('status') === 'Rejected')>
                        Rejected
                    </option>
                </select>
            </div>

            {{-- Defect Remarks --}}
            <div class="form-group form-group-full">
                <label for="defect_remarks">
                    Defect / Inspection Remarks
                </label>

                <textarea
                    id="defect_remarks"
                    name="defect_remarks"
                    rows="4"
                    placeholder="Enter defects or inspection observations..."
                >{{ old('defect_remarks') }}</textarea>
            </div>

            {{-- General Remarks --}}
            <div class="form-group form-group-full">
                <label for="remarks">
                    Remarks
                </label>

                <textarea
                    id="remarks"
                    name="remarks"
                    rows="3"
                    placeholder="Enter additional remarks..."
                >{{ old('remarks') }}</textarea>
            </div>

        </div>

        <div class="form-actions">

            <a
                href="{{ route('inspections.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Inspection
            </button>

        </div>

    </form>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const grnSelect = document.getElementById('grn_id');
    const quantityDisplay = document.getElementById('grn_quantity_display');
    const receivedQuantity = document.getElementById('received_quantity');

    function updateGRNDetails() {

        const selectedOption =
            grnSelect.options[grnSelect.selectedIndex];

        if (!selectedOption || !selectedOption.value) {

            quantityDisplay.value = '';
            receivedQuantity.value = '';

            return;
        }

        const quantity =
            selectedOption.dataset.quantity || '';

        const unit =
            selectedOption.dataset.unit || '';

        quantityDisplay.value =
            quantity + ' ' + unit;

        receivedQuantity.value = quantity;
    }

    grnSelect.addEventListener(
        'change',
        updateGRNDetails
    );

    updateGRNDetails();
});
</script>