@extends('layouts.app')

@section('title', 'Add Finishing')

@section('page-title', 'Add Finishing')
@section('page-subtitle', 'Create a new finishing process record')

@section('content')

<div class="card">

    <form action="{{ route('finishings.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Finishing No</label>
                <input type="text" name="finishing_no" value="{{ old('finishing_no') }}" placeholder="FIN-001" required>
                @error('finishing_no') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Washing No</label>
                <input type="text" name="washing_no" value="{{ old('washing_no') }}" placeholder="WASH-001" required>
                @error('washing_no') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Bundle No</label>
                <input type="text" name="bundle_no" value="{{ old('bundle_no') }}" placeholder="BND-001" required>
                @error('bundle_no') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>SO No</label>
                <input type="text" name="so_no" value="{{ old('so_no') }}" placeholder="SO-ARV-001" required>
                @error('so_no') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Item No</label>
                <input type="text" name="item_no" value="{{ old('item_no') }}" placeholder="SH-ITEM-001" required>
                @error('item_no') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Size</label>
                <input type="text" name="size" value="{{ old('size') }}" placeholder="M" required>
                @error('size') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Input Quantity</label>
                <input type="number" name="input_quantity" value="{{ old('input_quantity') }}" min="1" required>
                @error('input_quantity') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Output Quantity</label>
                <input type="number" name="output_quantity" value="{{ old('output_quantity') }}" min="0">
                @error('output_quantity') <small>{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Defect Quantity</label>
                <input type="number" name="defect_quantity" value="{{ old('defect_quantity') }}" min="0">
            </div>

            <div class="form-group">
                <label>Rework Quantity</label>
                <input type="number" name="rework_quantity" value="{{ old('rework_quantity') }}" min="0">
            </div>

            <div class="form-group">
                <label>Operator Name</label>
                <input type="text" name="operator_name" value="{{ old('operator_name') }}" placeholder="Kumar">
            </div>

            <div class="form-group">
                <label>Finishing Date</label>
                <input type="date" name="finishing_date" value="{{ old('finishing_date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
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
            <label>Finishing Operations</label>

            <div style="display:flex; gap:25px; flex-wrap:wrap; margin-top:12px;">

                <label>
                    <input type="checkbox" name="thread_trimming" value="1">
                    Thread Trimming
                </label>

                <label>
                    <input type="checkbox" name="ironing" value="1">
                    Ironing
                </label>

                <label>
                    <input type="checkbox" name="size_measurement" value="1">
                    Size Measurement
                </label>

                <label>
                    <input type="checkbox" name="visual_inspection" value="1">
                    Visual Inspection
                </label>

            </div>
        </div>

        <div class="form-group" style="margin-top:20px;">
            <label>Defect Details</label>
            <textarea name="defect_details" rows="3" placeholder="Enter defect details">{{ old('defect_details') }}</textarea>
        </div>

        <div class="form-group">
            <label>Remarks</label>
            <textarea name="remarks" rows="3" placeholder="Enter remarks">{{ old('remarks') }}</textarea>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Save Finishing
            </button>

            <a href="{{ route('finishings.index') }}" class="btn">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection