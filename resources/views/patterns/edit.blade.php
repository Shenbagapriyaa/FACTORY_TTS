@extends('layouts.app')

@section('page-title', 'Edit Pattern / CAD')

@section('page-subtitle', 'Update pattern and CAD details')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Pattern / CAD</h2>
        <p>Update {{ $pattern->pattern_no }}</p>
    </div>

    <a href="{{ route('patterns.index') }}"
       class="btn btn-secondary">
        ← Back
    </a>

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


<div class="card">

    <form method="POST"
          action="{{ route('patterns.update', $pattern) }}">

        @csrf

        @method('PUT')


        <div class="form-grid">


            {{-- PATTERN NO --}}
            <div class="form-group">

                <label for="pattern_no">
                    Pattern No
                </label>

                <input type="text"
                       id="pattern_no"
                       name="pattern_no"
                       value="{{ old('pattern_no', $pattern->pattern_no) }}"
                       required>

            </div>


            {{-- SO NO --}}
            <div class="form-group">

                <label for="so_no">
                    SO No
                </label>

                <input type="text"
                       id="so_no"
                       name="so_no"
                       value="{{ old('so_no', $pattern->so_no) }}"
                       required>

            </div>


            {{-- ITEM NO --}}
            <div class="form-group">

                <label for="item_no">
                    Item No
                </label>

                <input type="text"
                       id="item_no"
                       name="item_no"
                       value="{{ old('item_no', $pattern->item_no) }}"
                       required>

            </div>


            {{-- PATTERN NAME --}}
            <div class="form-group">

                <label for="pattern_name">
                    Pattern Name
                </label>

                <input type="text"
                       id="pattern_name"
                       name="pattern_name"
                       value="{{ old('pattern_name', $pattern->pattern_name) }}"
                       required>

            </div>


            {{-- CAD FILE --}}
            <div class="form-group">

                <label for="cad_file_name">
                    CAD File Name
                </label>

                <input type="text"
                       id="cad_file_name"
                       name="cad_file_name"
                       value="{{ old('cad_file_name', $pattern->cad_file_name) }}">

            </div>


            {{-- SIZE RANGE --}}
            <div class="form-group">

                <label for="size_range">
                    Size Range
                </label>

                <input type="text"
                       id="size_range"
                       name="size_range"
                       value="{{ old('size_range', $pattern->size_range) }}">

            </div>


            {{-- VERSION --}}
            <div class="form-group">

                <label for="pattern_version">
                    Pattern Version
                </label>

                <input type="text"
                       id="pattern_version"
                       name="pattern_version"
                       value="{{ old('pattern_version', $pattern->pattern_version) }}"
                       required>

            </div>


            {{-- CREATED DATE --}}
            <div class="form-group">

                <label for="created_date">
                    Created Date
                </label>

                <input type="date"
                       id="created_date"
                       name="created_date"
                       value="{{ old('created_date', $pattern->created_date?->format('Y-m-d')) }}"
                       required>

            </div>


            {{-- STATUS --}}
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select id="status"
                        name="status"
                        required>

                    <option value="Draft"
                        {{ old('status', $pattern->status) == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="Approved"
                        {{ old('status', $pattern->status) == 'Approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="Revised"
                        {{ old('status', $pattern->status) == 'Revised' ? 'selected' : '' }}>
                        Revised
                    </option>

                </select>

            </div>


            {{-- REMARKS --}}
            <div class="form-group form-group-full">

                <label for="remarks">
                    Remarks
                </label>

                <textarea id="remarks"
                          name="remarks"
                          rows="4"
                          placeholder="Enter pattern remarks">{{ old('remarks', $pattern->remarks) }}</textarea>

            </div>


        </div>


        <div class="form-actions">

            <a href="{{ route('patterns.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Update Pattern
            </button>

        </div>


    </form>

</div>

@endsection