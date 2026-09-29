@extends('layouts.app')

@section('title', 'Edit Inspection')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Inspection</h1>
        <p>Update the inspection record and material quality details.</p>
    </div>

    <a
        href="{{ route('inspections.index') }}"
        class="btn"
    >
        Back
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following:</strong>

        <ul style="margin:8px 0 0 20px;">
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
            <p>Update inspection and quantity details.</p>
        </div>
    </div>

    <form
        action="{{ route('inspections.update', ['inspection' => $inspection->id]) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- Inspection No --}}
            <div class="form-group">
                <label for="inspection_no">
                    Inspection No <span style="color:red;">*</span>
                </label>

                <input
                    type="text"
                    id="inspection_no"
                    name="inspection_no"
                    value="{{ old('inspection_no', $inspection->inspection_no) }}"
                    required
                >

                @error('inspection_no')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Inspection Date --}}
            <div class="form-group">
                <label for="inspection_date">
                    Inspection Date <span style="color:red;">*</span>
                </label>

                <input
                    type="date"
                    id="inspection_date"
                    name="inspection_date"
                    value="{{ old('inspection_date', $inspection->inspection_date?->format('Y-m-d')) }}"
                    required
                >

                @error('inspection_date')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- GRN --}}
            <div class="form-group">
                <label for="grn_id">
                    GRN <span style="color:red;">*</span>
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
                            {{ old('grn_id', $inspection->grn_id) == $grn->id ? 'selected' : '' }}
                        >
                            {{ $grn->grn_no }}
                            -
                            {{ $grn->supplier_name }}
                            -
                            {{ number_format($grn->accepted_quantity, 2) }}
                            {{ $grn->unit }}
                        </option>

                    @endforeach
                </select>

                @error('grn_id')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Received Quantity --}}
            <div class="form-group">
                <label for="received_quantity">
                    Received Quantity <span style="color:red;">*</span>
                </label>

                <input
                    type="number"
                    id="received_quantity"
                    name="received_quantity"
                    value="{{ old('received_quantity', $inspection->received_quantity) }}"
                    step="0.01"
                    min="0.01"
                    required
                >

                @error('received_quantity')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Inspected Quantity --}}
            <div class="form-group">
                <label for="inspected_quantity">
                    Inspected Quantity <span style="color:red;">*</span>
                </label>

                <input
                    type="number"
                    id="inspected_quantity"
                    name="inspected_quantity"
                    value="{{ old('inspected_quantity', $inspection->inspected_quantity) }}"
                    step="0.01"
                    min="0.01"
                    required
                >

                @error('inspected_quantity')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Accepted Quantity --}}
            <div class="form-group">
                <label for="accepted_quantity">
                    Accepted Quantity <span style="color:red;">*</span>
                </label>

                <input
                    type="number"
                    id="accepted_quantity"
                    name="accepted_quantity"
                    value="{{ old('accepted_quantity', $inspection->accepted_quantity) }}"
                    step="0.01"
                    min="0"
                    required
                >

                @error('accepted_quantity')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Rejected Quantity --}}
            <div class="form-group">
                <label for="rejected_quantity">
                    Rejected Quantity <span style="color:red;">*</span>
                </label>

                <input
                    type="number"
                    id="rejected_quantity"
                    name="rejected_quantity"
                    value="{{ old('rejected_quantity', $inspection->rejected_quantity) }}"
                    step="0.01"
                    min="0"
                    required
                >

                @error('rejected_quantity')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">
                    Status <span style="color:red;">*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >
                    <option
                        value="Accepted"
                        {{ old('status', $inspection->status) === 'Accepted' ? 'selected' : '' }}
                    >
                        Accepted
                    </option>

                    <option
                        value="Partially Accepted"
                        {{ old('status', $inspection->status) === 'Partially Accepted' ? 'selected' : '' }}
                    >
                        Partially Accepted
                    </option>

                    <option
                        value="Rejected"
                        {{ old('status', $inspection->status) === 'Rejected' ? 'selected' : '' }}
                    >
                        Rejected
                    </option>
                </select>

                @error('status')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

        </div>

        {{-- Defect Remarks --}}
        <div class="form-group" style="margin-top:20px;">
            <label for="defect_remarks">
                Defect Remarks
            </label>

            <textarea
                id="defect_remarks"
                name="defect_remarks"
                rows="4"
                placeholder="Enter defects found during inspection..."
            >{{ old('defect_remarks', $inspection->defect_remarks) }}</textarea>

            @error('defect_remarks')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Remarks --}}
        <div class="form-group" style="margin-top:20px;">
            <label for="remarks">
                Remarks
            </label>

            <textarea
                id="remarks"
                name="remarks"
                rows="4"
                placeholder="Enter additional remarks..."
            >{{ old('remarks', $inspection->remarks) }}</textarea>

            @error('remarks')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div
            style="
                display:flex;
                justify-content:flex-end;
                gap:10px;
                margin-top:25px;
            "
        >

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
                Update Inspection
            </button>

        </div>

    </form>

</div>

@endsection