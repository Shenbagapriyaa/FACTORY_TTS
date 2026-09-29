@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Washing / Laser</h1>
        <p>Update washing or laser process details.</p>
    </div>

    <a href="{{ route('washings.index') }}" class="btn">
        Back
    </a>
</div>

<div class="card">

    <form action="{{ route('washings.update', $washing) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div>
                <label>Washing No</label>
                <input type="text"
                       name="washing_no"
                       value="{{ old('washing_no', $washing->washing_no) }}"
                       required>
            </div>

            <div>
                <label>Sewing No</label>
                <input type="text"
                       name="sewing_no"
                       value="{{ old('sewing_no', $washing->sewing_no) }}"
                       required>
            </div>

            <div>
                <label>Bundle No</label>
                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no', $washing->bundle_no) }}"
                       required>
            </div>

            <div>
                <label>SO No</label>
                <input type="text"
                       name="so_no"
                       value="{{ old('so_no', $washing->so_no) }}"
                       required>
            </div>

            <div>
                <label>Item No</label>
                <input type="text"
                       name="item_no"
                       value="{{ old('item_no', $washing->item_no) }}"
                       required>
            </div>

            <div>
                <label>Size</label>
                <input type="text"
                       name="size"
                       value="{{ old('size', $washing->size) }}"
                       required>
            </div>

            <div>
                <label>Process Type</label>
                <select name="process_type" required>
                    <option value="Semi Wash"
                        {{ old('process_type', $washing->process_type) == 'Semi Wash' ? 'selected' : '' }}>
                        Semi Wash
                    </option>

                    <option value="Final Wash"
                        {{ old('process_type', $washing->process_type) == 'Final Wash' ? 'selected' : '' }}>
                        Final Wash
                    </option>

                    <option value="Direct Wash"
                        {{ old('process_type', $washing->process_type) == 'Direct Wash' ? 'selected' : '' }}>
                        Direct Wash
                    </option>

                    <option value="Laser"
                        {{ old('process_type', $washing->process_type) == 'Laser' ? 'selected' : '' }}>
                        Laser
                    </option>
                </select>
            </div>

            <div>
                <label>Input Quantity</label>
                <input type="number"
                       name="input_quantity"
                       value="{{ old('input_quantity', $washing->input_quantity) }}"
                       min="1"
                       required>
            </div>

            <div>
                <label>Output Quantity</label>
                <input type="number"
                       name="output_quantity"
                       value="{{ old('output_quantity', $washing->output_quantity) }}"
                       min="0">
            </div>

            <div>
                <label>Rejected Quantity</label>
                <input type="number"
                       name="rejected_quantity"
                       value="{{ old('rejected_quantity', $washing->rejected_quantity) }}"
                       min="0">
            </div>

            <div>
                <label>Washing Machine</label>
                <input type="text"
                       name="washing_machine"
                       value="{{ old('washing_machine', $washing->washing_machine) }}">
            </div>

            <div>
                <label>Operator Name</label>
                <input type="text"
                       name="operator_name"
                       value="{{ old('operator_name', $washing->operator_name) }}">
            </div>

            <div>
                <label>Process Date</label>
                <input type="date"
                       name="process_date"
                       value="{{ old('process_date', $washing->process_date?->format('Y-m-d')) }}"
                       required>
            </div>

            <div>
                <label>Status</label>
                <select name="status" required>

                    <option value="In Progress"
                        {{ old('status', $washing->status) == 'In Progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="Completed"
                        {{ old('status', $washing->status) == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                    <option value="On Hold"
                        {{ old('status', $washing->status) == 'On Hold' ? 'selected' : '' }}>
                        On Hold
                    </option>

                    <option value="Cancelled"
                        {{ old('status', $washing->status) == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>
            </div>

        </div>

        <div style="margin-top:20px;">
            <label>Remarks</label>

            <textarea name="remarks"
                      rows="4">{{ old('remarks', $washing->remarks) }}</textarea>
        </div>

        <div style="margin-top:20px;">

            <button type="submit" class="btn btn-primary">
                Update Washing / Laser
            </button>

            <a href="{{ route('washings.index') }}" class="btn">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection