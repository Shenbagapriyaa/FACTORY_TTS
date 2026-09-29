@extends('layouts.app')

@section('page-title', 'Edit Cutting')

@section('page-subtitle', 'Update cutting information')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Cutting</h2>
    </div>

    <div class="action-buttons">
        <a href="{{ route('cuttings.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

</div>

<div class="card">

    <form action="{{ route('cuttings.update', $cutting) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Cutting No</label>
                <input type="text"
                       name="cutting_no"
                       value="{{ old('cutting_no', $cutting->cutting_no) }}"
                       required>
                @error('cutting_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Marker No</label>
                <input type="text"
                       name="marker_no"
                       value="{{ old('marker_no', $cutting->marker_no) }}"
                       required>
                @error('marker_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Pattern No</label>
                <input type="text"
                       name="pattern_no"
                       value="{{ old('pattern_no', $cutting->pattern_no) }}"
                       required>
                @error('pattern_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>SO No</label>
                <input type="text"
                       name="so_no"
                       value="{{ old('so_no', $cutting->so_no) }}"
                       required>
                @error('so_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Item No</label>
                <input type="text"
                       name="item_no"
                       value="{{ old('item_no', $cutting->item_no) }}"
                       required>
                @error('item_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Cutting Date</label>
                <input type="date"
                       name="cutting_date"
                       value="{{ old('cutting_date', $cutting->cutting_date?->format('Y-m-d')) }}"
                       required>
                @error('cutting_date')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Fabric Issue No</label>
                <input type="text"
                       name="fabric_issue_no"
                       value="{{ old('fabric_issue_no', $cutting->fabric_issue_no) }}"
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
                       value="{{ old('lay_quantity', $cutting->lay_quantity) }}">
            </div>

            <div class="form-group">
                <label>Ply Count</label>
                <input type="number"
                       min="0"
                       name="ply_count"
                       value="{{ old('ply_count', $cutting->ply_count) }}">
            </div>

            <div class="form-group">
                <label>Planned Cut Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="planned_cut_qty"
                       value="{{ old('planned_cut_qty', $cutting->planned_cut_qty) }}">
            </div>

            <div class="form-group">
                <label>Actual Cut Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="actual_cut_qty"
                       value="{{ old('actual_cut_qty', $cutting->actual_cut_qty) }}">
            </div>

            <div class="form-group">
                <label>Rejected Quantity</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="rejected_qty"
                       value="{{ old('rejected_qty', $cutting->rejected_qty) }}">
            </div>

            <div class="form-group">
                <label>Cutter / Operator</label>
                <input type="text"
                       name="cutter_operator"
                       value="{{ old('cutter_operator', $cutting->cutter_operator) }}">
            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    @foreach(['Draft', 'In Progress', 'Completed', 'Cancelled'] as $status)

                        <option value="{{ $status }}"
                            {{ old('status', $cutting->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group full-width">

                <label>Remarks</label>

                <textarea name="remarks"
                          rows="4">{{ old('remarks', $cutting->remarks) }}</textarea>

            </div>

        </div>

        <div style="
            margin-top: 20px;
            display: flex;
            gap: 10px;
        ">

            <button type="submit" class="btn btn-primary">
                Update Cutting
            </button>

            <a href="{{ route('cuttings.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection