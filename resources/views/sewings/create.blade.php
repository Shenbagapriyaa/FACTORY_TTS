@extends('layouts.app')

@section('page-title', 'Add Sewing Production')
@section('page-subtitle', 'Create a new sewing production record')

@section('content')

<div class="page-header">

    <div>
        <h2>Add Sewing Production</h2>
        <p>Enter bundle-wise sewing production details.</p>
    </div>

    <a href="{{ route('sewings.index') }}" class="btn btn-secondary">
        ← Back
    </a>

</div>

<div class="form-card">

    <form method="POST" action="{{ route('sewings.store') }}">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Sewing No</label>

                <input type="text"
                       name="sewing_no"
                       value="{{ old('sewing_no') }}"
                       placeholder="SEW-001"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle No</label>

                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no') }}"
                       placeholder="BND-001"
                       required>
            </div>

            <div class="form-group">
                <label>Cutting No</label>

                <input type="text"
                       name="cutting_no"
                       value="{{ old('cutting_no') }}"
                       placeholder="CUT-001"
                       required>
            </div>

            <div class="form-group">
                <label>SO No</label>

                <input type="text"
                       name="so_no"
                       value="{{ old('so_no') }}"
                       placeholder="SO-ARV-001"
                       required>
            </div>

            <div class="form-group">
                <label>Item No</label>

                <input type="text"
                       name="item_no"
                       value="{{ old('item_no') }}"
                       placeholder="SH-ITEM-001"
                       required>
            </div>

            <div class="form-group">
                <label>Size</label>

                <input type="text"
                       name="size"
                       value="{{ old('size') }}"
                       placeholder="M"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Quantity</label>

                <input type="number"
                       name="bundle_quantity"
                       value="{{ old('bundle_quantity') }}"
                       min="1"
                       placeholder="50"
                       required>
            </div>

            <div class="form-group">
                <label>Input Quantity</label>

                <input type="number"
                       name="input_quantity"
                       value="{{ old('input_quantity') }}"
                       min="0"
                       placeholder="50">
            </div>

            <div class="form-group">
                <label>Output Quantity</label>

                <input type="number"
                       name="output_quantity"
                       value="{{ old('output_quantity') }}"
                       min="0"
                       placeholder="48">
            </div>

            <div class="form-group">
                <label>Rejected Quantity</label>

                <input type="number"
                       name="rejected_quantity"
                       value="{{ old('rejected_quantity') }}"
                       min="0"
                       placeholder="2">
            </div>

            <div class="form-group">
                <label>Line No</label>

                <input type="text"
                       name="line_no"
                       value="{{ old('line_no') }}"
                       placeholder="LINE-01">
            </div>

            <div class="form-group">
                <label>Operator Name</label>

                <input type="text"
                       name="operator_name"
                       value="{{ old('operator_name') }}"
                       placeholder="Operator name">
            </div>

            <div class="form-group">

                <label>Production Stage</label>

                <select name="production_stage" required>

                    <option value="Inline"
                        {{ old('production_stage') == 'Inline' ? 'selected' : '' }}>
                        Inline
                    </option>

                    <option value="Mid"
                        {{ old('production_stage') == 'Mid' ? 'selected' : '' }}>
                        Mid
                    </option>

                    <option value="End"
                        {{ old('production_stage') == 'End' ? 'selected' : '' }}>
                        End
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Sewing Date</label>

                <input type="date"
                       name="sewing_date"
                       value="{{ old('sewing_date', date('Y-m-d')) }}"
                       required>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="In Progress"
                        {{ old('status') == 'In Progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="Completed"
                        {{ old('status') == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                    <option value="On Hold"
                        {{ old('status') == 'On Hold' ? 'selected' : '' }}>
                        On Hold
                    </option>

                    <option value="Cancelled"
                        {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>

            </div>

            <div class="form-group form-group-full">

                <label>Remarks</label>

                <textarea name="remarks"
                          rows="4"
                          placeholder="Additional remarks">{{ old('remarks') }}</textarea>

            </div>

        </div>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <div class="form-actions">

            <a href="{{ route('sewings.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Save Sewing Production
            </button>

        </div>

    </form>

</div>

@endsection