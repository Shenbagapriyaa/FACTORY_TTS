@extends('layouts.app')

@section('page-title', 'Fabric Store')

@section('page-subtitle', 'Manage fabric stock and storage')

@section('content')

<div class="page-header">

    <div>
        <h2>Fabric Store</h2>

        <p>
            Manage received fabric quantity, availability, location and storage status.
        </p>
    </div>

    <a
        href="{{ route('fabric-stores.create') }}"
        class="btn btn-primary"
    >
        + Add Fabric Store
    </a>

</div>


<div class="table-card">

    <table class="data-table">

        <thead>

            <tr>

                <th>Store No</th>

                <th>GRN No</th>

                <th>Fabric</th>

                <th>Store Date</th>

                <th>Received</th>

                <th>Available</th>

                <th>Location</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

        </thead>


        <tbody>

            @forelse($stores as $store)

                <tr>

                    {{-- STORE NO --}}
                    <td>
                        <strong>
                            {{ $store->store_no }}
                        </strong>
                    </td>


                    {{-- GRN --}}
                    <td>
                        {{ $store->grn->grn_no ?? '-' }}
                    </td>


                    {{-- FABRIC --}}
                    <td>

                        @if($store->fabric)

                            <strong>
                                {{ $store->fabric->fabric_code }}
                            </strong>

                            <br>

                            <span>
                                {{ $store->fabric->fabric_name }}
                            </span>

                        @else

                            -

                        @endif

                    </td>


                    {{-- STORE DATE --}}
                    <td>
                        {{ $store->store_date?->format('d-m-Y') }}
                    </td>


                    {{-- QUANTITY RECEIVED --}}
                    <td>
                        {{ $store->quantity_received }}
                        {{ $store->unit }}
                    </td>


                    {{-- QUANTITY AVAILABLE --}}
                    <td>
                        {{ $store->quantity_available }}
                        {{ $store->unit }}
                    </td>


                    {{-- LOCATION --}}
                    <td>
                        {{ $store->location ?? '-' }}
                    </td>


                    {{-- STATUS --}}
                    <td>
                        {{ $store->status }}
                    </td>


                    {{-- ACTION --}}
                    <td>

                        <a
                            href="{{ route('fabric-stores.show', $store->id) }}"
                            class="btn btn-sm"
                        >
                            View
                        </a>


                        <a
                            href="{{ route('fabric-stores.edit', $store->id) }}"
                            class="btn btn-sm"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('fabric-stores.destroy', $store->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Delete this fabric store record?');"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="9"
                        style="text-align:center;"
                    >
                        No fabric store records found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div style="margin-top:20px;">

    {{ $stores->links() }}

</div>

@endsection