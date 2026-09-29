@extends('layouts.app')

@section('title', 'Edit GRN')

@section('content')

<div class="page-header">

    <div>
        <h1>Edit Goods Receipt Note</h1>
        <p>Update the goods receipt details.</p>
    </div>

    <a href="{{ route('grns.index') }}" class="btn">
        ← Back
    </a>

</div>


@if($errors->any())

    <div class="alert alert-danger">

        <strong>Please correct the following:</strong>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

@endif


<div class="panel">

    <div class="panel-header">

        <div>
            <h2>GRN Information</h2>
            <p>Update the goods receipt details.</p>
        </div>

    </div>


    <form
        action="{{ route('grns.update', $grn) }}"
        method="POST"
        class="form-grid"
    >

        @csrf

        @method('PUT')


        {{-- GRN Number --}}
        <div class="form-group">

            <label for="grn_no">
                GRN No <span class="required">*</span>
            </label>

            <input
                type="text"
                id="grn_no"
                name="grn_no"
                value="{{ old('grn_no', $grn->grn_no) }}"
                required
            >

        </div>


        {{-- Material Receiving --}}
        <div class="form-group">

            <label for="material_receiving_id">
                Material Receiving <span class="required">*</span>
            </label>

            <select
                id="material_receiving_id"
                name="material_receiving_id"
                required
            >

                <option value="">
                    Select Material Receiving
                </option>

                @foreach($receivings as $receiving)

                    <option
                        value="{{ $receiving->id }}"
                        {{ old('material_receiving_id', $grn->material_receiving_id) == $receiving->id ? 'selected' : '' }}
                    >

                        {{ $receiving->receiving_no }}
                        -
                        {{ $receiving->supplier_name }}
                        -
                        {{ $receiving->received_quantity }}
                        {{ $receiving->unit }}

                    </option>

                @endforeach

            </select>

        </div>


        {{-- GRN Date --}}
        <div class="form-group">

            <label for="grn_date">
                GRN Date <span class="required">*</span>
            </label>

            <input
                type="date"
                id="grn_date"
                name="grn_date"
                value="{{ old('grn_date', $grn->grn_date?->format('Y-m-d')) }}"
                required
            >

        </div>


        {{-- Supplier --}}
        <div class="form-group">

            <label for="supplier_name">
                Supplier Name <span class="required">*</span>
            </label>

            <input
                type="text"
                id="supplier_name"
                name="supplier_name"
                value="{{ old('supplier_name', $grn->supplier_name) }}"
                required
            >

        </div>


        {{-- Received Quantity --}}
        <div class="form-group">

            <label for="received_quantity">
                Received Quantity <span class="required">*</span>
            </label>

            <input
                type="number"
                id="received_quantity"
                name="received_quantity"
                value="{{ old('received_quantity', $grn->received_quantity) }}"
                step="0.01"
                min="0"
                required
            >

        </div>


        {{-- Unit --}}
        <div class="form-group">

            <label for="unit">
                Unit <span class="required">*</span>
            </label>

            <select
                id="unit"
                name="unit"
                required
            >

                <option value="Kg"
                    {{ old('unit', $grn->unit) === 'Kg' ? 'selected' : '' }}>
                    Kg
                </option>

                <option value="Meter"
                    {{ old('unit', $grn->unit) === 'Meter' ? 'selected' : '' }}>
                    Meter
                </option>

                <option value="Piece"
                    {{ old('unit', $grn->unit) === 'Piece' ? 'selected' : '' }}>
                    Piece
                </option>

            </select>

        </div>


        {{-- Accepted Quantity --}}
        <div class="form-group">

            <label for="accepted_quantity">
                Accepted Quantity <span class="required">*</span>
            </label>

            <input
                type="number"
                id="accepted_quantity"
                name="accepted_quantity"
                value="{{ old('accepted_quantity', $grn->accepted_quantity) }}"
                step="0.01"
                min="0"
                required
            >

        </div>


        {{-- Rejected Quantity --}}
        <div class="form-group">

            <label for="rejected_quantity">
                Rejected Quantity <span class="required">*</span>
            </label>

            <input
                type="number"
                id="rejected_quantity"
                name="rejected_quantity"
                value="{{ old('rejected_quantity', $grn->rejected_quantity) }}"
                step="0.01"
                min="0"
                required
            >

        </div>


        {{-- Status --}}
        <div class="form-group">

            <label for="status">
                Status <span class="required">*</span>
            </label>

            <select
                id="status"
                name="status"
                required
            >

                <option value="Accepted"
                    {{ old('status', $grn->status) === 'Accepted' ? 'selected' : '' }}>
                    Accepted
                </option>

                <option value="Partially Accepted"
                    {{ old('status', $grn->status) === 'Partially Accepted' ? 'selected' : '' }}>
                    Partially Accepted
                </option>

                <option value="Rejected"
                    {{ old('status', $grn->status) === 'Rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>

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
                placeholder="Enter remarks"
            >{{ old('remarks', $grn->remarks) }}</textarea>

        </div>


        {{-- Actions --}}
        <div class="form-actions form-group-full">

            <a
                href="{{ route('grns.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update GRN
            </button>

        </div>

    </form>

</div>

@endsection