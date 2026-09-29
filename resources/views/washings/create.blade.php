@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Washing / Laser</h1>
        <p>Create a new washing or laser process record.</p>
    </div>

    <a href="{{ route('washings.index') }}" class="btn">
        Back
    </a>
</div>

<div class="card">

    <form action="{{ route('washings.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div>
                <label>Washing No</label>
                <input type="text" name="washing_no"
                       value="{{ old('washing_no') }}"
                       placeholder="WASH-001" required>
                @error('washing_no')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label>Sewing No</label>
                <input type="text" name="sewing_no"
                       value="{{ old('sewing_no') }}"
                       placeholder="SEW-001" required>
            </div>

            <div>
                <label>Bundle No</label>
                <input type="text" name="bundle_no"
                       value="{{ old('bundle_no') }}"
                       placeholder="BND-001" required>
            </div>

            <div>
                <label>SO No</label>
                <input type="text" name="so_no"
                       value="{{ old('so_no') }}"
                       placeholder="SO-ARV-001" required>
            </div>

            <div>
                <label>Item No</label>
                <input type="text" name="item_no"
                       value="{{ old('item_no') }}"
                       placeholder="SH-ITEM-001" required>
            </div>

            <div>
                <label>Size</label>
                <input type="text" name="size"
                       value="{{ old('size') }}"
                       placeholder="M" required>
            </div>

            <div>
                <label>Process Type</label>
                <select name="process_type" required>
                    <option value="">Select Process</option>
                    <option value="Semi Wash">Semi Wash</option>
                    <option value="Final Wash">Final Wash</option>
                    <option value="Direct Wash">Direct Wash</option>
                    <option value="Laser">Laser</option>
                </select>
            </div>

            <div>
                <label>Input Quantity</label>
                <input type="number" name="input_quantity"
                       value="{{ old('input_quantity') }}"
                       min="1" required>
            </div>

            <div>
                <label>Output Quantity</label>
                <input type="number" name="output_quantity"
                       value="{{ old('output_quantity') }}"
                       min="0">
            </div>

            <div>
                <label>Rejected Quantity</label>
                <input type="number" name="rejected_quantity"
                       value="{{ old('rejected_quantity') }}"
                       min="0">
            </div>

            <div>
                <label>Washing Machine</label>
                <input type="text" name="washing_machine"
                       value="{{ old('washing_machine') }}"
                       placeholder="Machine-01">
            </div>

            <div>
                <label>Operator Name</label>
                <input type="text" name="operator_name"
                       value="{{ old('operator_name') }}"
                       placeholder="Operator name">
            </div>

            <div>
                <label>Process Date</label>
                <input type="date" name="process_date"
                       value="{{ old('process_date', date('Y-m-d')) }}"
                       required>
            </div>

            <div>
                <label>Status</label>
                <select name="status" required>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="On Hold">On Hold</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

        </div>

        <div style="margin-top:20px;">
            <label>Remarks</label>
            <textarea name="remarks"
                      rows="4"
                      placeholder="Enter remarks">{{ old('remarks') }}</textarea>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Save Washing / Laser
            </button>

            <a href="{{ route('washings.index') }}" class="btn">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection