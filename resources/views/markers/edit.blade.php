@extends('layouts.app')

@section('page-title', 'Edit Marker')

@section('page-subtitle', 'Update marker and cutting information')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Marker</h2>
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

        <form action="{{ route('markers.update', $marker) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="form-group">
                <label>Marker No</label>

                <input
                    type="text"
                    name="marker_no"
                    value="{{ old('marker_no', $marker->marker_no) }}"
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
                    value="{{ old('pattern_no', $marker->pattern_no) }}"
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
                    value="{{ old('so_no', $marker->so_no) }}"
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
                    value="{{ old('item_no', $marker->item_no) }}"
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
                    value="{{ old('marker_name', $marker->marker_name) }}"
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
                    value="{{ old('size_ratio', $marker->size_ratio) }}"
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
                    value="{{ old('marker_length', $marker->marker_length) }}"
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
                    value="{{ old('marker_width', $marker->marker_width) }}"
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
                    value="{{ old('fabric_consumption', $marker->fabric_consumption) }}"
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
                    value="{{ old('ply_count', $marker->ply_count) }}"
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
                    value="{{ old('efficiency', $marker->efficiency) }}"
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
                    value="{{ old(
                        'created_date',
                        $marker->created_date?->format('Y-m-d')
                    ) }}"
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
                        {{ old('status', $marker->status) == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="Approved"
                        {{ old('status', $marker->status) == 'Approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="Revised"
                        {{ old('status', $marker->status) == 'Revised' ? 'selected' : '' }}>
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
                    placeholder="Enter remarks">{{ old('remarks', $marker->remarks) }}</textarea>

                @error('remarks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="action-buttons">

                <button type="submit"
                        class="btn btn-primary">
                    Update Marker
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