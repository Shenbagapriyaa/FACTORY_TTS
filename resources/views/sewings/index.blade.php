@extends('layouts.app')

@section('page-title', 'Sewing / Production')
@section('page-subtitle', 'Manage sewing production and bundle movement')

@section('content')

<div class="page-header">

    <div>
        <h2>Sewing / Production</h2>
        <p>Track bundle-wise sewing production from input to output.</p>
    </div>

    <a href="{{ route('sewings.create') }}" class="btn btn-primary">
        + Add Sewing Production
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
                <th>Sewing No</th>
                <th>Bundle No</th>
                <th>Cutting No</th>
                <th>SO No</th>
                <th>Item No</th>
                <th>Size</th>
                <th>Input</th>
                <th>Output</th>
                <th>Stage</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($sewings as $sewing)

                <tr>

                    <td>{{ $sewing->sewing_no }}</td>

                    <td>{{ $sewing->bundle_no }}</td>

                    <td>{{ $sewing->cutting_no }}</td>

                    <td>{{ $sewing->so_no }}</td>

                    <td>{{ $sewing->item_no }}</td>

                    <td>{{ $sewing->size }}</td>

                    <td>{{ $sewing->input_quantity ?? '-' }}</td>

                    <td>{{ $sewing->output_quantity ?? '-' }}</td>

                    <td>{{ $sewing->production_stage }}</td>

                    <td>{{ $sewing->status }}</td>

                    <td>

                        <a href="{{ route('sewings.show', $sewing) }}">
                            View
                        </a>

                        |

                        <a href="{{ route('sewings.edit', $sewing) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('sewings.destroy', $sewing) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this sewing record?')"
                                    style="background:none;border:none;padding:0;cursor:pointer;">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="11" style="text-align:center;">
                        No sewing production records found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div style="margin-top:20px;">
    {{ $sewings->links() }}
</div>

@endsection