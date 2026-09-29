@extends('layouts.app')

@section('page-title', 'Relaxation')

@section('page-subtitle', 'Manage fabric relaxation before production')

@section('content')

<div class="page-header">

    <div>
        <h2>Relaxation</h2>

        <p>
            Track fabric relaxation before reservation and cutting.
        </p>
    </div>

    <a
        href="{{ route('relaxations.create') }}"
        class="btn btn-primary"
    >
        + Add Relaxation
    </a>

</div>


<div class="table-card">

    <table class="data-table">

        <thead>

            <tr>

                <th>Relaxation No</th>

                <th>Fabric</th>

                <th>Store No</th>

                <th>Date</th>

                <th>Input Qty</th>

                <th>Duration</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

        </thead>


        <tbody>

            @forelse($relaxations as $relaxation)

                <tr>

                    <td>
                        <strong>
                            {{ $relaxation->relaxation_no }}
                        </strong>
                    </td>


                    <td>

                        {{ $relaxation->fabric->fabric_code ?? '-' }}

                        -

                        {{ $relaxation->fabric->fabric_name ?? '-' }}

                    </td>


                    <td>
                        {{ $relaxation->fabricStore->store_no ?? '-' }}
                    </td>


                    <td>
                        {{ $relaxation->relaxation_date?->format('d-m-Y') }}
                    </td>


                    <td>

                        {{ $relaxation->input_quantity }}

                        {{ $relaxation->unit }}

                    </td>


                    <td>

                        @if($relaxation->duration_hours !== null)

                            {{ $relaxation->duration_hours }} hrs

                        @else

                            -

                        @endif

                    </td>


                    <td>
                        {{ $relaxation->status }}
                    </td>


                    <td>

                        <a
                            href="{{ route('relaxations.show', $relaxation->id) }}"
                            class="btn btn-sm"
                        >
                            View
                        </a>


                        <a
                            href="{{ route('relaxations.edit', $relaxation->id) }}"
                            class="btn btn-sm"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('relaxations.destroy', $relaxation->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Delete this relaxation record?');"
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
                        colspan="8"
                        style="text-align:center;"
                    >
                        No relaxation records found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div style="margin-top:20px;">

    {{ $relaxations->links() }}

</div>

@endsection