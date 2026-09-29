@extends('layouts.app')

@section('page-title', 'Cutting')

@section('page-subtitle', 'Manage cutting and production information')

@section('content')

<div class="page-header">
    <div>
        <h2>Cutting</h2>
    </div>

    <div class="action-buttons">
        <a href="{{ route('cuttings.create') }}" class="btn btn-primary">
            + Add Cutting
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
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Cutting No</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Marker No</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Pattern No</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">SO No</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Item No</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Cutting Date</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Planned Qty</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Actual Qty</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Status</th>
                    <th style="border: 1px solid #d1d5db; padding: 12px;">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($cuttings as $cutting)

                    <tr>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->cutting_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->marker_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->pattern_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->so_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->item_no }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->cutting_date?->format('d-m-Y') }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->planned_cut_qty ?? '-' }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->actual_cut_qty ?? '-' }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                            {{ $cutting->status }}
                        </td>

                        <td style="border: 1px solid #d1d5db; padding: 12px;">

                            <div style="
                                display: flex;
                                gap: 6px;
                                align-items: center;
                            ">

                                <a href="{{ route('cuttings.show', $cutting) }}"
                                   class="btn btn-secondary">
                                    View
                                </a>

                                <a href="{{ route('cuttings.edit', $cutting) }}"
                                   class="btn btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('cuttings.destroy', $cutting) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this cutting?')">
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
                            No cutting records found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div style="margin-top: 20px;">
    {{ $cuttings->links() }}
</div>

@endsection