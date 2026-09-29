@extends('layouts.app')

@section('page-title', 'Add Fabric Store')

@section('page-subtitle', 'Store received fabric in the warehouse')

@section('content')

<div class="form-card">

```
<form method="POST" action="{{ route('fabric-stores.store') }}">

    @csrf

    <div class="form-grid">

        {{-- STORE NO --}}
        <div class="form-group">

            <label>Store No</label>

            <input
                type="text"
                name="store_no"
                value="{{ old('store_no') }}"
                placeholder="FS-001"
                required
            >

            @error('store_no')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- STORE DATE --}}
        <div class="form-group">

            <label>Store Date</label>

            <input
                type="date"
                name="store_date"
                value="{{ old('store_date', date('Y-m-d')) }}"
                required
            >

            @error('store_date')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- GRN --}}
        <div class="form-group">

            <label>GRN</label>

            <select name="grn_id" required>

                <option value="">
                    Select GRN
                </option>

                @foreach($grns as $grn)

                    <option
                        value="{{ $grn->id }}"
                        {{ old('grn_id') == $grn->id ? 'selected' : '' }}
                    >
                        {{ $grn->grn_no }}
                        -
                        {{ $grn->supplier_name }}
                        -
                        {{ $grn->accepted_quantity }}
                        {{ $grn->unit }}
                    </option>

                @endforeach

            </select>

            @error('grn_id')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- FABRIC --}}
        <div class="form-group">

            <label>Fabric</label>

            <select name="fabric_id" required>

                <option value="">
                    Select Fabric
                </option>

                @foreach($fabrics as $fabric)

                    <option
                        value="{{ $fabric->id }}"
                        {{ old('fabric_id') == $fabric->id ? 'selected' : '' }}
                    >
                        {{ $fabric->fabric_code }}
                        -
                        {{ $fabric->fabric_name }}
                    </option>

                @endforeach

            </select>

            @error('fabric_id')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- QUANTITY RECEIVED --}}
        <div class="form-group">

            <label>Quantity Received</label>

            <input
                type="number"
                name="quantity_received"
                value="{{ old('quantity_received') }}"
                step="0.01"
                min="0.01"
                placeholder="0.00"
                required
            >

            @error('quantity_received')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- QUANTITY AVAILABLE --}}
        <div class="form-group">

            <label>Quantity Available</label>

            <input
                type="number"
                name="quantity_available"
                value="{{ old('quantity_available') }}"
                step="0.01"
                min="0"
                placeholder="0.00"
                required
            >

            @error('quantity_available')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- UNIT --}}
        <div class="form-group">

            <label>Unit</label>

            <select name="unit" required>

                <option
                    value="Kg"
                    {{ old('unit', 'Kg') == 'Kg' ? 'selected' : '' }}
                >
                    Kg
                </option>

                <option
                    value="Meter"
                    {{ old('unit') == 'Meter' ? 'selected' : '' }}
                >
                    Meter
                </option>

                <option
                    value="Piece"
                    {{ old('unit') == 'Piece' ? 'selected' : '' }}
                >
                    Piece
                </option>

            </select>

            @error('unit')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- LOCATION --}}
        <div class="form-group">

            <label>Location</label>

            <input
                type="text"
                name="location"
                value="{{ old('location') }}"
                placeholder="Fabric Warehouse"
            >

            @error('location')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- RACK NO --}}
        <div class="form-group">

            <label>Rack No</label>

            <input
                type="text"
                name="rack_no"
                value="{{ old('rack_no') }}"
                placeholder="RACK-01"
            >

            @error('rack_no')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>


        {{-- STATUS --}}
        <div class="form-group">

            <label>Status</label>

            <select name="status" required>

                <option
                    value="Available"
                    {{ old('status', 'Available') == 'Available' ? 'selected' : '' }}
                >
                    Available
                </option>

                <option
                    value="Partially Available"
                    {{ old('status') == 'Partially Available' ? 'selected' : '' }}
                >
                    Partially Available
                </option>

                <option
                    value="Reserved"
                    {{ old('status') == 'Reserved' ? 'selected' : '' }}
                >
                    Reserved
                </option>

                <option
                    value="Issued"
                    {{ old('status') == 'Issued' ? 'selected' : '' }}
                >
                    Issued
                </option>

            </select>

            @error('status')
                <small class="error">{{ $message }}</small>
            @enderror

        </div>

    </div>


    {{-- REMARKS --}}
    <div class="form-group">

        <label>Remarks</label>

        <textarea
            name="remarks"
            rows="4"
            placeholder="Enter remarks if required"
        >{{ old('remarks') }}</textarea>

        @error('remarks')
            <small class="error">{{ $message }}</small>
        @enderror

    </div>


    {{-- ACTIONS --}}
    <div class="form-actions">

        <a
            href="{{ route('fabric-stores.index') }}"
            class="btn"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Save Fabric Store
        </button>

    </div>

</form>
```

</div>

@endsection
