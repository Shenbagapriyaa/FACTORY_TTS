@extends('layouts.app')

@section('page-title', 'Fabrics')

@section('page-subtitle', 'Fabric master data')

@section('content')

<div class="toolbar">

    <form class="search" method="GET">

        <input
            name="search"
            value="{{ $search }}"
            placeholder="Search code, name, type or color..."
        >

        <button class="btn" type="submit">
            Search
        </button>

    </form>

    <a
        class="btn primary"
        href="{{ route('fabrics.create') }}"
    >
        + Add Fabric
    </a>

</div>


<div class="panel table-wrap">

    <table>

        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>GSM</th>
                <th>Width</th>
                <th>Color</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>

            @forelse($fabrics as $fabric)

                <tr>

                    <td>
                        <strong>
                            {{ $fabric->fabric_code }}
                        </strong>
                    </td>

                    <td>
                        {{ $fabric->fabric_name }}
                    </td>

                    <td>
                        {{ $fabric->fabric_type }}
                    </td>

                    <td>
                        {{ $fabric->gsm ?? '-' }}
                    </td>

                    <td>
                        {{ $fabric->width ?? '-' }}
                    </td>

                    <td>
                        {{ $fabric->color ?? '-' }}
                    </td>

                    <td>
                        <span class="status {{ strtolower($fabric->status) }}">
                            {{ $fabric->status }}
                        </span>
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('fabrics.show', $fabric) }}"
                                class="action-view"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('fabrics.edit', $fabric) }}"
                                class="action-edit"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('fabrics.destroy', $fabric) }}"
                                onsubmit="return confirm('Delete this fabric?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="action-delete"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="empty">
                        No fabrics found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div class="pagination">
    {{ $fabrics->links() }}
</div>

@endsection