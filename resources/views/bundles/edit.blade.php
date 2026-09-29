@extends('layouts.app')

@section('page-title', 'Edit Bundle')
@section('page-subtitle', 'Update bundle and QR tracking details')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Bundle</h2>
        <p>Update the selected bundle information.</p>
    </div>

    <a href="{{ route('bundles.index') }}"
       class="btn btn-secondary">
        ← Back
    </a>

</div>

<div class="form-card">

    <form method="POST"
          action="{{ route('bundles.update', $bundle) }}">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Bundle No</label>

                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no', $bundle->bundle_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>QR Code</label>

                <input type="text"
                       name="qr_code"
                       value="{{ old('qr_code', $bundle->qr_code) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Cutting No</label>

                <input type="text"
                       name="cutting_no"
                       value="{{ old('cutting_no', $bundle->cutting_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Marker No</label>

                <input type="text"
                       name="marker_no"
                       value="{{ old('marker_no', $bundle->marker_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>SO No</label>

                <input type="text"
                       name="so_no"
                       value="{{ old('so_no', $bundle->so_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Item No</label>

                <input type="text"
                       name="item_no"
                       value="{{ old('item_no', $bundle->item_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Size</label>

                <input type="text"
                       name="size"
                       value="{{ old('size', $bundle->size) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Quantity</label>

                <input type="number"
                       name="bundle_quantity"
                       value="{{ old('bundle_quantity', $bundle->bundle_quantity) }}"
                       min="1"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Date</label>

                <input type="date"
                       name="bundle_date"
                       value="{{ old('bundle_date', optional($bundle->bundle_date)->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle Operator</label>

                <input type="text"
                       name="bundle_operator"
                       value="{{ old('bundle_operator', $bundle->bundle_operator) }}"
                       placeholder="Operator name">
            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    @foreach(['Created', 'In Sewing', 'Completed', 'Cancelled'] as $status)

                        <option value="{{ $status }}"
                            {{ old('status', $bundle->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group form-group-full">

                <label>Remarks</label>

                <textarea name="remarks"
                          rows="4">{{ old('remarks', $bundle->remarks) }}</textarea>

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
                Update Bundle
            </button>

        </div>

    </form>

</div>

@endsection