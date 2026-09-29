@extends('layouts.app')

@section('page-title', 'Add Pattern / CAD')

@section('page-subtitle', 'Create a new production pattern')

@section('content')

<div class="page-header">

    <div>
        <h2>Add Pattern / CAD</h2>
        <p>Enter the pattern and CAD details.</p>
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
          action="{{ route('patterns.store') }}">

        @csrf


        <div class="form-grid">


            {{-- PATTERN NO --}}
            <div class="form-group">

                <label for="pattern_no">
                    Pattern No
                </label>

                <input type="text"
                       id="pattern_no"
                       name="pattern_no"
                       value="{{ old('pattern_no') }}"
                       placeholder="PAT-001"
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
                       value="{{ old('so_no') }}"
                       placeholder="SO-ARV-001"
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
                       value="{{ old('item_no') }}"
                       placeholder="SH-ITEM-001"
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
                       value="{{ old('pattern_name') }}"
                       placeholder="Men Jeans Basic"
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
                       value="{{ old('cad_file_name') }}"
                       placeholder="SH-ITEM-001-V1">

            </div>


            {{-- SIZE RANGE --}}
            <div class="form-group">

                <label for="size_range">
                    Size Range
                </label>

                <input type="text"
                       id="size_range"
                       name="size_range"
                       value="{{ old('size_range') }}"
                       placeholder="S, M, L, XL">

            </div>


            {{-- VERSION --}}
            <div class="form-group">

                <label for="pattern_version">
                    Pattern Version
                </label>

                <input type="text"
                       id="pattern_version"
                       name="pattern_version"
                       value="{{ old('pattern_version', 'V1.0') }}"
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
                       value="{{ old('created_date', date('Y-m-d')) }}"
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
                        {{ old('status') == 'Draft' ? 'selected' : '' }}>
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

            </div>


            {{-- REMARKS --}}
            <div class="form-group form-group-full">

                <label for="remarks">
                    Remarks
                </label>

                <textarea id="remarks"
                          name="remarks"
                          rows="4"
                          placeholder="Enter pattern remarks">{{ old('remarks') }}</textarea>

            </div>


        </div>


        <div class="form-actions">

            <a href="{{ route('patterns.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Create Pattern
            </button>

        </div>


    </form>

</div>

@endsection