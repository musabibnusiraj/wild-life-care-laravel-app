@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Investigations</h5>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Notes</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($investigations as $investigation)
                                <tr>
                                    <td>{{ $investigation->notes }}</td>
                                    <td>
                                        @if ($investigation->status == 'pending')
                                            <span class="badge bg-label-secondary me-1">Pending</span>
                                        @elseif($investigation->status == 'in_progress')
                                            <span class="badge bg-label-primary me-1">In Progress</span>
                                        @elseif($investigation->status == 'completed')
                                            <span class="badge bg-label-primary me-1">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="dropdown-item"
                                            href="{{ route('investigation.edit', $investigation->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
