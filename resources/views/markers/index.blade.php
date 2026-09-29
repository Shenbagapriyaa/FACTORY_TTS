@extends('layouts.app')

@section('page-title', 'Markers')

@section('page-subtitle', 'Manage marker and cutting information')

@section('content')

<div class="page-header">

    <div>
        <h2>Markers</h2>
    </div>

    <div class="action-buttons">
        <a href="{{ route('markers.create') }}"
           class="btn btn-primary">
            + Add Marker
        </a>
    </div>

</div>


<div class="card">

    <div style="padding: 20px; overflow-x: auto;">

        <table style="
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #d1d5db;
        ">

            <thead>

                <tr>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Marker No
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Pattern No
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        SO No
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Item No
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Marker Name
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Length
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Width
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Efficiency
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Status
                    </th>

                    <th style="border: 1px solid #d1d5db; padding: 12px;">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($markers as $marker)

                    <tr>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->marker_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->pattern_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->so_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->item_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->marker_name }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->marker_length ?? '-' }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->marker_width ?? '-' }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->efficiency !== null
                                ? $marker->efficiency . '%'
                                : '-' }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $marker->status }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">

                            <div style="
                                display: flex;
                                gap: 6px;
                                align-items: center;
                            ">

                                <a href="{{ route('markers.show', $marker) }}"
                                   class="btn btn-secondary">
                                    View
                                </a>

                                <a href="{{ route('markers.edit', $marker) }}"
                                   class="btn btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('markers.destroy', $marker) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this marker?')">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="10"
                            style="
                                border: 1px solid #d1d5db;
                                padding: 30px;
                                text-align: center;
                            ">

                            No markers found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<div style="margin-top: 20px;">

    {{ $markers->links() }}

</div>

@endsection