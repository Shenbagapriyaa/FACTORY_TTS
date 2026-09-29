@extends('layouts.app')

@section('page-title', 'Create Bundle')
@section('page-subtitle', 'Create a new cutting bundle')

@section('content')

<div class="page-header">

    <div>
        <h2>Create Bundle</h2>
        <p>Enter bundle and QR tracking details.</p>
    </div>

    <a href="{{ route('bundles.index') }}" class="btn btn-secondary">
        ← Back
    </a>

</div>

<div class="form-card">

    <form method="POST" action="{{ route('bundles.store') }}">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Bundle No</label>
                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no') }}"
                       placeholder="BND-001"
                       required>
            </div>

            <div class="form-group">
                <label>QR Code</label>
                <input type="text"
                       name="qr_code"
                       value="{{ old('qr_code') }}"
                       placeholder="QR-BND-001"
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
                <label>Marker No</label>
                <input type="text"
                       name="marker_no"
                       value="{{ old('marker_no') }}"
                       placeholder="MRK-001"
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
                <label>Bundle Date</label>
                <input type="date"
                       name="bundle_date"
                       value="{{ old('bundle_date', date('Y-m-d')) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Operator</label>
                <input type="text"
                       name="bundle_operator"
                       value="{{ old('bundle_operator') }}"
                       placeholder="Operator name">
            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="Created"
                        {{ old('status') == 'Created' ? 'selected' : '' }}>
                        Created
                    </option>

                    <option value="In Sewing"
                        {{ old('status') == 'In Sewing' ? 'selected' : '' }}>
                        In Sewing
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

            <a href="{{ route('bundles.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Create Bundle
            </button>

        </div>

    </form>

</div>

@endsection