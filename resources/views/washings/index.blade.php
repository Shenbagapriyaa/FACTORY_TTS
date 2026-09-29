@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Washing / Laser</h1>
        <p>Manage washing and laser production processes.</p>
    </div>

    <a href="{{ route('washings.create') }}" class="btn btn-primary">
        + Add Washing / Laser
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="table-responsive">
        <table class="table" style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="border:1px solid #ddd; padding:12px;">Washing No</th>
                    <th style="border:1px solid #ddd; padding:12px;">Sewing No</th>
                    <th style="border:1px solid #ddd; padding:12px;">Bundle No</th>
                    <th style="border:1px solid #ddd; padding:12px;">SO No</th>
                    <th style="border:1px solid #ddd; padding:12px;">Item No</th>
                    <th style="border:1px solid #ddd; padding:12px;">Size</th>
                    <th style="border:1px solid #ddd; padding:12px;">Process</th>
                    <th style="border:1px solid #ddd; padding:12px;">Input Qty</th>
                    <th style="border:1px solid #ddd; padding:12px;">Output Qty</th>
                    <th style="border:1px solid #ddd; padding:12px;">Status</th>
                    <th style="border:1px solid #ddd; padding:12px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($washings as $washing)
                    <tr>
                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->washing_no }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->sewing_no }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->bundle_no }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->so_no }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->item_no }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->size }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->process_type }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->input_quantity }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->output_quantity ?? '-' }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px;">
                            {{ $washing->status }}
                        </td>

                        <td style="border:1px solid #ddd; padding:12px; white-space:nowrap;">

                            <a href="{{ route('washings.show', $washing) }}">
                                View
                            </a>

                            |

                            <a href="{{ route('washings.edit', $washing) }}">
                                Edit
                            </a>

                            |

                            <form action="{{ route('washings.destroy', $washing) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete this washing record?')"
                                        style="border:none;background:none;color:red;cursor:pointer;">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="11"
                            style="border:1px solid #ddd; padding:20px; text-align:center;">
                            No washing / laser records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $washings->links() }}
    </div>

</div>

@endsection