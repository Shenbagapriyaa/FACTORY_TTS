@extends('layouts.app')

@section('page-title', 'Fabric Groups')

@section('page-subtitle', 'Group fabrics for production use')

@section('content')

<div class="toolbar">

    <form class="search" method="GET">

        <input
            name="search"
            value="{{ $search }}"
            placeholder="Search group code or name..."
        >

        <button class="btn" type="submit">
            Search
        </button>

    </form>

    <a
        class="btn primary"
        href="{{ route('fabric-groups.create') }}"
    >
        + Add Group
    </a>

</div>


<div class="panel table-wrap">

    <table>

        <thead>

            <tr>
                <th>Code</th>
                <th>Group Name</th>
                <th>Fabrics</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>


        <tbody>

            @forelse($groups as $group)

                <tr>

                    <td>
                        <strong>
                            {{ $group->group_code }}
                        </strong>
                    </td>

                    <td>
                        {{ $group->group_name }}
                    </td>

                    <td>
                        {{ $group->fabrics_count }}
                    </td>

                    <td>
                        <span class="status {{ strtolower($group->status) }}">
                            {{ $group->status }}
                        </span>
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('fabric-groups.show', $group) }}"
                                class="action-view"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('fabric-groups.edit', $group) }}"
                                class="action-edit"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('fabric-groups.destroy', $group) }}"
                                onsubmit="return confirm('Delete this group?')"
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
                    <td colspan="5" class="empty">
                        No fabric groups found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div class="pagination">
    {{ $groups->links() }}
</div>

@endsection