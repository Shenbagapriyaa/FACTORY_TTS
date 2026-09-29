@extends('layouts.app')

@section('title', 'Edit Finishing')

@section('page-title', 'Edit Finishing')
@section('page-subtitle', 'Update finishing process information')

@section('content')

<div class="card">

    <form action="{{ route('finishings.update', $finishing) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Finishing No</label>
                <input type="text"
                       name="finishing_no"
                       value="{{ old('finishing_no', $finishing->finishing_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Washing No</label>
                <input type="text"
                       name="washing_no"
                       value="{{ old('washing_no', $finishing->washing_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Bundle No</label>
                <input type="text"
                       name="bundle_no"
                       value="{{ old('bundle_no', $finishing->bundle_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>SO No</label>
                <input type="text"
                       name="so_no"
                       value="{{ old('so_no', $finishing->so_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Item No</label>
                <input type="text"
                       name="item_no"
                       value="{{ old('item_no', $finishing->item_no) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Size</label>
                <input type="text"
                       name="size"
                       value="{{ old('size', $finishing->size) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Input Quantity</label>
                <input type="number"
                       name="input_quantity"
                       value="{{ old('input_quantity', $finishing->input_quantity) }}"
                       min="1"
                       required>
            </div>

            <div class="form-group">
                <label>Output Quantity</label>
                <input type="number"
                       name="output_quantity"
                       value="{{ old('output_quantity', $finishing->output_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Defect Quantity</label>
                <input type="number"
                       name="defect_quantity"
                       value="{{ old('defect_quantity', $finishing->defect_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Rework Quantity</label>
                <input type="number"
                       name="rework_quantity"
                       value="{{ old('rework_quantity', $finishing->rework_quantity) }}"
                       min="0">
            </div>

            <div class="form-group">
                <label>Operator Name</label>
                <input type="text"
                       name="operator_name"
                       value="{{ old('operator_name', $finishing->operator_name) }}">
            </div>

            <div class="form-group">
                <label>Finishing Date</label>
                <input type="date"
                       name="finishing_date"
                       value="{{ old('finishing_date', $finishing->finishing_date?->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" required>
                    @foreach(['In Progress', 'Completed', 'On Hold', 'Cancelled'] as $status)
                        <option value="{{ $status }}"
                            {{ old('status', $finishing->status) === $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div style="margin-top:20px;">

            <label>Finishing Operations</label>

            <div style="display:flex; gap:25px; flex-wrap:wrap; margin-top:12px;">

                <label>
                    <input type="checkbox"
                           name="thread_trimming"
                           value="1"
                           {{ old('thread_trimming', $finishing->thread_trimming) ? 'checked' : '' }}>
                    Thread Trimming
                </label>

                <label>
                    <input type="checkbox"
                           name="ironing"
                           value="1"
                           {{ old('ironing', $finishing->ironing) ? 'checked' : '' }}>
                    Ironing
                </label>

                <label>
                    <input type="checkbox"
                           name="size_measurement"
                           value="1"
                           {{ old('size_measurement', $finishing->size_measurement) ? 'checked' : '' }}>
                    Size Measurement
                </label>

                <label>
                    <input type="checkbox"
                           name="visual_inspection"
                           value="1"
                           {{ old('visual_inspection', $finishing->visual_inspection) ? 'checked' : '' }}>
                    Visual Inspection
                </label>

            </div>

        </div>

        <div class="form-group" style="margin-top:20px;">

            <label>Defect Details</label>

            <textarea name="defect_details"
                      rows="3">{{ old('defect_details', $finishing->defect_details) }}</textarea>

        </div>

        <div class="form-group">

            <label>Remarks</label>

            <textarea name="remarks"
                      rows="3">{{ old('remarks', $finishing->remarks) }}</textarea>

        </div>

        <div style="margin-top:20px;">

            <button type="submit" class="btn btn-primary">
                Update Finishing
            </button>

            <a href="{{ route('finishings.index') }}" class="btn">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection