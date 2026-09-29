@extends('layouts.app')

@section('page-title', 'Add Cutting')

@section('page-subtitle', 'Create a new cutting record')

@section('content')

<div class="page-header">

    <div>
        <h2>Add Cutting</h2>
    </div>

    <div class="action-buttons">
        <a href="{{ route('cuttings.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>

</div>

<div class="card">

    <form action="{{ route('cuttings.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Cutting No</label>
                <input type="text"
                       name="cutting_no"
                       value="{{ old('cutting_no') }}"
                       placeholder="CUT-001"
                       required>
                @error('cutting_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Marker No</label>
                <input type="text"
                       name="marker_no"
                       value="{{ old('marker_no') }}"
                       placeholder="MRK-001"
                       required>
                @error('marker_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Pattern No</label>
                <input type="text"
                       name="pattern_no"
                       value="{{ old('pattern_no') }}"
                       placeholder="PAT-001"
                       required>
                @error('pattern_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>SO No</label>
                <input type="text"
                       name="so_no"
                       value="{{ old('so_no') }}"
                       placeholder="SO-ARV-001"
                       required>
                @error('so_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Item No</label>
                <input type="text"
                       name="item_no"
                       value="{{ old('item_no') }}"
                       placeholder="SH-ITEM-001"
                       required>
                @error('item_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Cutting Date</label>
                <input type="date"
                       name="cutting_date"
                       value="{{ old('cutting_date', date('Y-m-d')) }}"
                       required>
                @error('cutting_date')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Fabric Issue No</label>
                <input type="text"
                       name="fabric_issue_no"
                       value="{{ old('fabric_issue_no') }}"
                       placeholder="FI-001"
                       required>
                @error('fabric_issue_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Lay Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="lay_quantity"
                       value="{{ old('lay_quantity') }}"
                       placeholder="500">
                @error('lay_quantity')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Ply Count</label>
                <input type="number"
                       min="0"
                       name="ply_count"
                       value="{{ old('ply_count') }}"
                       placeholder="80">
                @error('ply_count')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Planned Cut Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="planned_cut_qty"
                       value="{{ old('planned_cut_qty') }}"
                       placeholder="5000">
                @error('planned_cut_qty')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Actual Cut Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="actual_cut_qty"
                       value="{{ old('actual_cut_qty') }}"
                       placeholder="4980">
                @error('actual_cut_qty')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Rejected Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="rejected_qty"
                       value="{{ old('rejected_qty') }}"
                       placeholder="20">
                @error('rejected_qty')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Cutter / Operator</label>
                <input type="text"
                       name="cutter_operator"
                       value="{{ old('cutter_operator') }}"
                       placeholder="Kumar">
                @error('cutter_operator')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="Draft"
                        {{ old('status') == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="In Progress"
                        {{ old('status') == 'In Progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="Completed"
                        {{ old('status') == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                    <option value="Cancelled"
                        {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>

                @error('status')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group full-width">

                <label>Remarks</label>

                <textarea name="remarks"
                          rows="4"
                          placeholder="Enter remarks">{{ old('remarks') }}</textarea>

                @error('remarks')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

        </div>

        <div style="
            margin-top: 20px;
            display: flex;
            gap: 10px;
        ">

            <button type="submit" class="btn btn-primary">
                Save Cutting
            </button>

            <a href="{{ route('cuttings.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection