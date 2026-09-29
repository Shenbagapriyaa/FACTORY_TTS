@extends('layouts.app')

@section('page-title', 'Fabric Issue')
@section('page-subtitle', 'Manage fabric issued for production')

@section('content')

<div class="page-header">
    <div>
        <h2>Fabric Issue</h2>
        <p>Manage fabric issued from store for production activities.</p>
    </div>

    <a href="{{ route('fabric-issues.create') }}" class="btn btn-primary">
        + Add Fabric Issue
    </a>
</div>


<div class="table-card">

    <table class="data-table">

        <thead>
            <tr>
                <th>Issue No</th>
                <th>Reservation</th>
                <th>Fabric</th>
                <th>Store No</th>
                <th>Order No</th>
                <th>Issue Date</th>
                <th>Issue Quantity</th>
                <th>Issued To</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($issues as $issue)

                <tr>

                    {{-- Issue No --}}
                    <td>
                        <strong>
                            {{ $issue->issue_no }}
                        </strong>
                    </td>


                    {{-- Reservation --}}
                    <td>
                        {{ $issue->reservation->reservation_no ?? '-' }}
                    </td>


                    {{-- Fabric --}}
                    <td>

                        @if($issue->fabric)

                            <strong>
                                {{ $issue->fabric->fabric_code }}
                            </strong>

                            <br>

                            <span>
                                {{ $issue->fabric->fabric_name }}
                            </span>

                        @else

                            -

                        @endif

                    </td>


                    {{-- Store --}}
                    <td>
                        {{ $issue->fabricStore->store_no ?? '-' }}
                    </td>


                    {{-- Order --}}
                    <td>
                        {{ $issue->order_no ?? '-' }}
                    </td>


                    {{-- Issue Date --}}
                    <td>
                        {{ $issue->issue_date?->format('d-m-Y') }}
                    </td>


                    {{-- Quantity --}}
                    <td>
                        {{ $issue->issue_quantity }}
                        {{ $issue->unit }}
                    </td>


                    {{-- Issued To --}}
                    <td>
                        {{ $issue->issued_to ?? '-' }}
                    </td>


                    {{-- Status --}}
                    <td>
                        {{ $issue->status }}
                    </td>


                    {{-- Actions --}}
                    <td>

                        <a
                            href="{{ route('fabric-issues.show', $issue->id) }}"
                            class="btn btn-sm"
                        >
                            View
                        </a>


                        <a
                            href="{{ route('fabric-issues.edit', $issue->id) }}"
                            class="btn btn-sm"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('fabric-issues.destroy', $issue->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Delete this fabric issue record?');"
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
                        colspan="10"
                        style="text-align:center;"
                    >
                        No fabric issue records found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div style="margin-top:20px;">
    {{ $issues->links() }}
</div>

@endsection