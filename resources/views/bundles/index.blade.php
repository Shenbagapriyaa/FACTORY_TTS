@extends('layouts.app')

@section('page-title', 'Bundle / QR Tracking')
@section('page-subtitle', 'Manage cutting bundles and QR tracking')

@section('content')

<div class="page-header">

    <div>
        <h2>Bundle / QR Tracking</h2>
        <p>Track bundles created from the cutting process.</p>
    </div>

    <a href="{{ route('bundles.create') }}" class="btn btn-primary">
        + Create Bundle
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <table class="data-table">

        <thead>
            <tr>
                <th>Bundle No</th>
                <th>QR Code</th>
                <th>Cutting No</th>
                <th>SO No</th>
                <th>Item No</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Bundle Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($bundles as $bundle)

                <tr>

                    <td>{{ $bundle->bundle_no }}</td>

                    <td>{{ $bundle->qr_code }}</td>

                    <td>{{ $bundle->cutting_no }}</td>

                    <td>{{ $bundle->so_no }}</td>

                    <td>{{ $bundle->item_no }}</td>

                    <td>{{ $bundle->size }}</td>

                    <td>{{ $bundle->bundle_quantity }}</td>

                    <td>
                        {{ $bundle->bundle_date?->format('d-m-Y') }}
                    </td>

                    <td>{{ $bundle->status }}</td>

                    <td>

                        <a href="{{ route('bundles.show', $bundle) }}">
                            View
                        </a>

                        |

                        <a href="{{ route('bundles.edit', $bundle) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('bundles.destroy', $bundle) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this bundle?')"
                                    style="background:none;border:none;padding:0;cursor:pointer;">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="10" style="text-align:center;">
                        No bundles found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div style="margin-top:20px;">
    {{ $bundles->links() }}
</div>

@endsection