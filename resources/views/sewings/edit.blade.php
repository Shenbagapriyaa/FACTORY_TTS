@extends('layouts.app')

@section('page-title', 'Edit Sewing Production')
@section('page-subtitle', 'Update sewing production details')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Sewing Production</h2>
        <p>Update the selected sewing production record.</p>
    </div>

    <a href="{{ route('sewings.index') }}"
       class="btn btn-secondary">
        ← Back
    </a>

</div>

<div class="form-card">

    <form method="POST"
          action="{{ route('sewings.update', $sewing) }}">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Sewing No</label>

                <input type="text"
                       name="sewing_no"
                       value="{{ old('sewing_no', $sewing->sewing_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle No</label>

                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no', $sewing->bundle_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Cutting No</label>

                <input type="text"
                       name="cutting_no"
                       value="{{ old('cutting_no', $sewing->cutting_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>SO No</label>

                <input type="text"
                       name="so_no"
                       value="{{ old('so_no', $sewing->so_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Item No</label>

                <input type="text"
                       name="item_no"
                       value="{{ old('item_no', $sewing->item_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Size</label>

                <input type="text"
                       name="size"
                       value="{{ old('size', $sewing->size) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Quantity</label>

                <input type="number"
                       name="bundle_quantity"
                       value="{{ old('bundle_quantity', $sewing->bundle_quantity) }}"
                       min="1"
                       required>
            </div>

            <div class="form-group">
                <label>Input Quantity</label>

                <input type="number"
                       name="input_quantity"
                       value="{{ old('input_quantity', $sewing->input_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Output Quantity</label>

                <input type="number"
                       name="output_quantity"
                       value="{{ old('output_quantity', $sewing->output_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Rejected Quantity</label>

                <input type="number"
                       name="rejected_quantity"
                       value="{{ old('rejected_quantity', $sewing->rejected_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Line No</label>

                <input type="text"
                       name="line_no"
                       value="{{ old('line_no', $sewing->line_no) }}">
            </div>

            <div class="form-group">
                <label>Operator Name</label>

                <input type="text"
                       name="operator_name"
                       value="{{ old('operator_name', $sewing->operator_name) }}">
            </div>

            <div class="form-group">

                <label>Production Stage</label>

                <select name="production_stage" required>

                    @foreach(['Inline', 'Mid', 'End'] as $stage)

                        <option value="{{ $stage }}"
                            {{ old('production_stage', $sewing->production_stage) == $stage ? 'selected' : '' }}>
                            {{ $stage }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Sewing Date</label>

                <input type="date"
                       name="sewing_date"
                       value="{{ old('sewing_date', optional($sewing->sewing_date)->format('Y-m-d')) }}"
                       required>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    @foreach(['In Progress', 'Completed', 'On Hold', 'Cancelled'] as $status)

                        <option value="{{ $status }}"
                            {{ old('status', $sewing->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group form-group-full">

                <label>Remarks</label>

                <textarea name="remarks"
                          rows="4">{{ old('remarks', $sewing->remarks) }}</textarea>

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
                Update Sewing Production
            </button>

        </div>

    </form>

</div>

@endsection