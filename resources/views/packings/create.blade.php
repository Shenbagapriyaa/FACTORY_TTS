@extends('layouts.app')

@section('title', 'Add Packing')

@section('page-title', 'Add Packing')

@section('page-subtitle', 'Create a new packing process record')

@section('content')

<div class="card">

    <form action="{{ route('packings.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Packing No</label>
                <input
                    type="text"
                    name="packing_no"
                    value="{{ old('packing_no') }}"
                    placeholder="PACK-001"
                    required
                >
                @error('packing_no')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Finishing No</label>
                <input
                    type="text"
                    name="finishing_no"
                    value="{{ old('finishing_no') }}"
                    placeholder="FIN-001"
                    required
                >
                @error('finishing_no')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Bundle No</label>
                <input
                    type="text"
                    name="bundle_no"
                    value="{{ old('bundle_no') }}"
                    placeholder="BND-001"
                    required
                >
                @error('bundle_no')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>SO No</label>
                <input
                    type="text"
                    name="so_no"
                    value="{{ old('so_no') }}"
                    placeholder="SO-ARV-001"
                    required
                >
                @error('so_no')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Item No</label>
                <input
                    type="text"
                    name="item_no"
                    value="{{ old('item_no') }}"
                    placeholder="SH-ITEM-001"
                    required
                >
                @error('item_no')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Size</label>
                <input
                    type="text"
                    name="size"
                    value="{{ old('size') }}"
                    placeholder="S"
                    required
                >
                @error('size')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Input Quantity</label>
                <input
                    type="number"
                    name="input_quantity"
                    value="{{ old('input_quantity') }}"
                    min="1"
                    required
                >
                @error('input_quantity')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Packed Quantity</label>
                <input
                    type="number"
                    name="packed_quantity"
                    value="{{ old('packed_quantity') }}"
                    min="0"
                >
                @error('packed_quantity')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Rejected Quantity</label>
                <input
                    type="number"
                    name="rejected_quantity"
                    value="{{ old('rejected_quantity') }}"
                    min="0"
                >
                @error('rejected_quantity')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Packing Type</label>
                <select name="packing_type" required>

                    <option value="Standard"
                        {{ old('packing_type', 'Standard') == 'Standard' ? 'selected' : '' }}>
                        Standard
                    </option>

                    <option value="Poly Bag"
                        {{ old('packing_type') == 'Poly Bag' ? 'selected' : '' }}>
                        Poly Bag
                    </option>

                    <option value="Box"
                        {{ old('packing_type') == 'Box' ? 'selected' : '' }}>
                        Box
                    </option>

                    <option value="Bulk"
                        {{ old('packing_type') == 'Bulk' ? 'selected' : '' }}>
                        Bulk
                    </option>

                </select>

                @error('packing_type')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Operator Name</label>
                <input
                    type="text"
                    name="operator_name"
                    value="{{ old('operator_name') }}"
                    placeholder="Kumar"
                >
                @error('operator_name')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Packing Date</label>
                <input
                    type="date"
                    name="packing_date"
                    value="{{ old('packing_date', date('Y-m-d')) }}"
                    required
                >
                @error('packing_date')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" required>

                    <option value="In Progress"
                        {{ old('status', 'In Progress') == 'In Progress' ? 'selected' : '' }}>
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

                @error('status')
                    <small>{{ $message }}</small>
                @enderror
            </div>

        </div>


        <div class="form-group" style="margin-top: 20px;">

            <label>Remarks</label>

            <textarea
                name="remarks"
                rows="3"
                placeholder="Enter remarks"
            >{{ old('remarks') }}</textarea>

            @error('remarks')
                <small>{{ $message }}</small>
            @enderror

        </div>


        <div style="margin-top: 20px;">

            <button type="submit" class="btn btn-primary">
                Save Packing
            </button>

            <a href="{{ route('packings.index') }}" class="btn">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection