@extends('layouts.app')

@section('page-title', 'Pattern / CAD')

@section('page-subtitle', 'Manage pattern and CAD details')

@section('content')

<div class="page-header">

    <div>
        <h2>Pattern / CAD</h2>
        <p>Manage patterns prepared for production orders.</p>
    </div>

    <a href="{{ route('patterns.create') }}" class="btn btn-primary">
        + Add Pattern
    </a>

</div>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


<div class="card">

    <div class="table-wrapper">

        <table class="data-table">

            <thead>

                <tr>
                    <th>Pattern No</th>
                    <th>SO No</th>
                    <th>Item No</th>
                    <th>Pattern Name</th>
                    <th>Version</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($patterns as $pattern)

                    <tr>

                        <td>
                            {{ $pattern->pattern_no }}
                        </td>

                        <td>
                            {{ $pattern->so_no }}
                        </td>

                        <td>
                            {{ $pattern->item_no }}
                        </td>

                        <td>
                            {{ $pattern->pattern_name }}
                        </td>

                        <td>
                            {{ $pattern->pattern_version }}
                        </td>

                        <td>
                            {{ $pattern->created_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            <span class="status-badge">
                                {{ $pattern->status }}
                            </span>
                        </td>

                        <td>

                            <div class="action-buttons">

                                <a href="{{ route('patterns.show', $pattern) }}"
                                   class="btn btn-secondary">
                                    View
                                </a>

                                <a href="{{ route('patterns.edit', $pattern) }}"
                                   class="btn btn-secondary">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('patterns.destroy', $pattern) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this pattern?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="empty-state">
                            No patterns found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    @if($patterns->hasPages())

        <div class="pagination-wrapper">
            {{ $patterns->links() }}
        </div>

    @endif

</div>

@endsection