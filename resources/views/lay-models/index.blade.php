@extends('layouts.app')

@section('page-title', 'Lay Models')

@section('page-subtitle', 'Production lay model master data')

@section('content')

<div class="toolbar">

    <form class="search" method="GET">

        <input
            name="search"
            value="{{ $search }}"
            placeholder="Search code, name or fabric group..."
        >

        <button class="btn" type="submit">
            Search
        </button>

    </form>

    <a
        class="btn primary"
        href="{{ route('lay-models.create') }}"
    >
        + Add Lay Model
    </a>

</div>


<div class="panel table-wrap">

    <table>

        <thead>

            <tr>
                <th>Code</th>
                <th>Model Name</th>
                <th>Group</th>
                <th>Fabric</th>
                <th>Lay Length</th>
                <th>Plies</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>


        <tbody>

            @forelse($layModels as $layModel)

                <tr>

                    <td>
                        <strong>
                            {{ $layModel->lay_model_code }}
                        </strong>
                    </td>

                    <td>
                        {{ $layModel->lay_model_name }}
                    </td>

                    <td>
                        {{ $layModel->fabricGroup->group_name ?? '-' }}
                    </td>

                    <td>
                        {{ $layModel->fabric->fabric_name ?? '-' }}
                    </td>

                    <td>
                        {{ $layModel->lay_length ?? '-' }}
                    </td>

                    <td>
                        {{ $layModel->plies ?? '-' }}
                    </td>

                    <td>
                        <span class="status {{ strtolower($layModel->status) }}">
                            {{ $layModel->status }}
                        </span>
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('lay-models.show', $layModel) }}"
                                class="action-view"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('lay-models.edit', $layModel) }}"
                                class="action-edit"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('lay-models.destroy', $layModel) }}"
                                onsubmit="return confirm('Delete this lay model?')"
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
                        No lay models found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div class="pagination">
    {{ $layModels->links() }}
</div>

@endsection