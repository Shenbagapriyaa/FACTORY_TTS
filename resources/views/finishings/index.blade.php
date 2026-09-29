@extends('layouts.app')

@section('title', 'Finishing')

@section('page-title', 'Finishing')

@section('page-subtitle', 'Manage garment finishing and final inspection')

@section('content')

<div class="page-header">

    <div>
        <h2>Finishing Records</h2>

        <p>
            Track thread trimming, ironing, size measurement and visual inspection.
        </p>
    </div>

</div>


<div style="margin-top: 18px; margin-bottom: 18px;">

    <a href="{{ route('finishings.create') }}"
       class="btn btn-primary">

        + Add Finishing

    </a>

</div>


@include('partials.flash')


<div class="card">

    <table class="table finishing-table">

        <thead>

            <tr>

                <th>Finishing No</th>
                <th>Washing No</th>
                <th>Bundle No</th>
                <th>SO No</th>
                <th>Item No</th>
                <th>Size</th>
                <th>Input</th>
                <th>Output</th>
                <th>Defect</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>

        </thead>


        <tbody>

            @forelse($finishings as $finishing)

                <tr>

                    <td>
                        {{ $finishing->finishing_no }}
                    </td>

                    <td>
                        {{ $finishing->washing_no }}
                    </td>

                    <td>
                        {{ $finishing->bundle_no }}
                    </td>

                    <td>
                        {{ $finishing->so_no }}
                    </td>

                    <td>
                        {{ $finishing->item_no }}
                    </td>

                    <td>
                        {{ $finishing->size }}
                    </td>

                    <td>
                        {{ $finishing->input_quantity }}
                    </td>

                    <td>
                        {{ $finishing->output_quantity ?? '-' }}
                    </td>

                    <td>
                        {{ $finishing->defect_quantity ?? '-' }}
                    </td>

                    <td>
                        {{ $finishing->status }}
                    </td>

                    <td class="actions-cell">

                        <div class="action-buttons">

                            <a href="{{ route('finishings.show', $finishing) }}"
                               class="action-btn">

                                View

                            </a>

                            <a href="{{ route('finishings.edit', $finishing) }}"
                               class="action-btn">

                                Edit

                            </a>

                            <form action="{{ route('finishings.destroy', $finishing) }}"
                                  method="POST"
                                  class="delete-form"
                                  onsubmit="return confirm('Delete this finishing record?');">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="action-btn">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="11"
                        class="empty-row">

                        No finishing records found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    @if($finishings->hasPages())

        <div style="margin-top: 20px;">

            {{ $finishings->links() }}

        </div>

    @endif

</div>


<style>

    .finishing-table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border: 1px solid #d1d5db;
    }


    .finishing-table th,
    .finishing-table td {
        border: 1px solid #d1d5db;
        padding: 10px 8px;
        text-align: center;
        vertical-align: middle;
    }


    .finishing-table th {
        font-weight: 600;
        font-size: 13px;
    }


    .finishing-table td {
        font-size: 13px;
    }


    .finishing-table th:nth-child(1),
    .finishing-table td:nth-child(1) {
        width: 9%;
    }


    .finishing-table th:nth-child(2),
    .finishing-table td:nth-child(2) {
        width: 9%;
    }


    .finishing-table th:nth-child(3),
    .finishing-table td:nth-child(3) {
        width: 8%;
    }


    .finishing-table th:nth-child(4),
    .finishing-table td:nth-child(4) {
        width: 10%;
    }


    .finishing-table th:nth-child(5),
    .finishing-table td:nth-child(5) {
        width: 10%;
    }


    .finishing-table th:nth-child(6),
    .finishing-table td:nth-child(6) {
        width: 5%;
    }


    .finishing-table th:nth-child(7),
    .finishing-table td:nth-child(7) {
        width: 6%;
    }


    .finishing-table th:nth-child(8),
    .finishing-table td:nth-child(8) {
        width: 7%;
    }


    .finishing-table th:nth-child(9),
    .finishing-table td:nth-child(9) {
        width: 7%;
    }


    .finishing-table th:nth-child(10),
    .finishing-table td:nth-child(10) {
        width: 9%;
    }


    .finishing-table th:nth-child(11),
    .finishing-table td:nth-child(11) {
        width: 20%;
    }


    .actions-cell {
        white-space: nowrap;
    }


    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        flex-wrap: nowrap;
    }


    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 6px 8px;

        border: 1px solid #d1d5db;

        border-radius: 4px;

        background: transparent;

        text-decoration: none;

        font-size: 12px;

        cursor: pointer;

        white-space: nowrap;
    }


    .action-btn:hover {
        opacity: 0.8;
    }


    .delete-form {
        display: inline;
        margin: 0;
        padding: 0;
    }


    .empty-row {
        text-align: center !important;
        padding: 30px !important;
        font-weight: 500;
    }

</style>

@endsection