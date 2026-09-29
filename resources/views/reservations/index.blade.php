@extends('layouts.app')

@section('page-title', 'Reservation')

@section('page-subtitle', 'Manage fabric reservations for production')

@section('content')

<div class="page-header">

    <div>
        <h2>Reservation</h2>

        <p>
            Reserve available fabric for production requirements.
        </p>
    </div>

    <a
        href="{{ route('reservations.create') }}"
        class="btn btn-primary"
    >
        + Add Reservation
    </a>

</div>


<div class="table-card">

    <table class="data-table">

        <thead>

            <tr>

                <th>Reservation No</th>

                <th>Fabric</th>

                <th>Store No</th>

                <th>Order No</th>

                <th>Date</th>

                <th>Reserved Qty</th>

                <th>Purpose</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

        </thead>


        <tbody>

            @forelse($reservations as $reservation)

                <tr>

                    <td>
                        <strong>
                            {{ $reservation->reservation_no }}
                        </strong>
                    </td>


                    <td>

                        @if($reservation->fabric)

                            <strong>
                                {{ $reservation->fabric->fabric_code }}
                            </strong>

                            <br>

                            <span>
                                {{ $reservation->fabric->fabric_name }}
                            </span>

                        @else

                            -

                        @endif

                    </td>


                    <td>
                        {{ $reservation->fabricStore->store_no ?? '-' }}
                    </td>


                    <td>
                        {{ $reservation->order_no ?? '-' }}
                    </td>


                    <td>
                        {{ $reservation->reservation_date?->format('d-m-Y') }}
                    </td>


                    <td>

                        {{ $reservation->reserved_quantity }}

                        {{ $reservation->unit }}

                    </td>


                    <td>
                        {{ $reservation->purpose ?? '-' }}
                    </td>


                    <td>
                        {{ $reservation->status }}
                    </td>


                    <td>

                        <a
                            href="{{ route('reservations.show', $reservation->id) }}"
                            class="btn btn-sm"
                        >
                            View
                        </a>


                        <a
                            href="{{ route('reservations.edit', $reservation->id) }}"
                            class="btn btn-sm"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('reservations.destroy', $reservation->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Delete this reservation?');"
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
                        No reservation records found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div style="margin-top:20px;">

    {{ $reservations->links() }}

</div>

@endsection