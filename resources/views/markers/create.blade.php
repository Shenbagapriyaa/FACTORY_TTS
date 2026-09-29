@extends('layouts.app')

@section('page-title', 'Add Marker')

@section('page-subtitle', 'Create a new marker')

@section('content')

<div class="page-header">

    <div>
        <h2>Add Marker</h2>
    </div>

    <div class="action-buttons">
        <a href="{{ route('markers.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>
    </div>

</div>


<div class="card">

    <div style="padding: 20px;">

        <form action="{{ route('markers.store') }}" method="POST">

            @csrf


            <div class="form-group">
                <label>Marker No</label>
                <input
                    type="text"
                    name="marker_no"
                    value="{{ old('marker_no') }}"
                    placeholder="Example: MRK-001"
                    required
                >

                @error('marker_no')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Pattern No</label>
                <input
                    type="text"
                    name="pattern_no"
                    value="{{ old('pattern_no') }}"
                    placeholder="Example: PAT-001"
                    required
                >

                @error('pattern_no')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>SO No</label>
                <input
                    type="text"
                    name="so_no"
                    value="{{ old('so_no') }}"
                    placeholder="Example: SO-ARV-001"
                    required
                >

                @error('so_no')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Item No</label>
                <input
                    type="text"
                    name="item_no"
                    value="{{ old('item_no') }}"
                    placeholder="Example: SH-ITEM-001"
                    required
                >

                @error('item_no')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Marker Name</label>
                <input
                    type="text"
                    name="marker_name"
                    value="{{ old('marker_name') }}"
                    placeholder="Example: Front & Back Marker"
                    required
                >

                @error('marker_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Size Ratio</label>
                <input
                    type="text"
                    name="size_ratio"
                    value="{{ old('size_ratio') }}"
                    placeholder="Example: S:100, M:150, L:150, XL:100"
                >

                @error('size_ratio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Marker Length</label>
                <input
                    type="number"
                    step="0.01"
                    name="marker_length"
                    value="{{ old('marker_length') }}"
                    placeholder="Example: 8.50"
                >

                @error('marker_length')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Marker Width</label>
                <input
                    type="number"
                    step="0.01"
                    name="marker_width"
                    value="{{ old('marker_width') }}"
                    placeholder="Example: 1.60"
                >

                @error('marker_width')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Fabric Consumption</label>
                <input
                    type="number"
                    step="0.001"
                    name="fabric_consumption"
                    value="{{ old('fabric_consumption') }}"
                    placeholder="Example: 1.850"
                >

                @error('fabric_consumption')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Ply Count</label>
                <input
                    type="number"
                    name="ply_count"
                    value="{{ old('ply_count') }}"
                    placeholder="Example: 80"
                >

                @error('ply_count')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Efficiency (%)</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    max="100"
                    name="efficiency"
                    value="{{ old('efficiency') }}"
                    placeholder="Example: 82.50"
                >

                @error('efficiency')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Created Date</label>
                <input
                    type="date"
                    name="created_date"
                    value="{{ old('created_date', date('Y-m-d')) }}"
                    required
                >

                @error('created_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Status</label>

                <select name="status" required>

                    <option value="Draft"
                        {{ old('status', 'Draft') == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="Approved"
                        {{ old('status') == 'Approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="Revised"
                        {{ old('status') == 'Revised' ? 'selected' : '' }}>
                        Revised
                    </option>

                </select>

                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label>Remarks</label>

                <textarea
                    name="remarks"
                    rows="4"
                    placeholder="Enter remarks">{{ old('remarks') }}</textarea>

                @error('remarks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="action-buttons">

                <button type="submit"
                        class="btn btn-primary">
                    Save Marker
                </button>

                <a href="{{ route('markers.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection