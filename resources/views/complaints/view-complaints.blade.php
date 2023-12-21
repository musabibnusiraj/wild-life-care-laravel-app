@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Complaints</h5>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->subject }}</td>
                                    <td>{{ $complaint->description }}</td>
                                    <td>
                                    </td>
                                    <td>
                                        @if ($complaint->status == 'submitted')
                                            <span class="badge bg-label-primary">{{ $complaint->status }}</span>
                                        @elseif ($complaint->status == 'in_progress')
                                            <span class="badge bg-label-warning">{{ $complaint->status }}</span>
                                        @elseif ($complaint->status == 'resolved')
                                            <span class="badge bg-label-success">{{ $complaint->status }}</span>
                                        @else
                                            <span class="badge bg-label-secondary">{{ $complaint->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @role('Admin')
                                            @if (!isset($complaint->assigned_officer_id))
                                                <a href="{{ route('investigation.show', $complaint->id) }}"
                                                    class="btn btn-primary btn-sm active assign-modal"
                                                    data-complaint-id="{{ $complaint->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#assignModal">Assign Officer</a>
                                            @else
                                                <a href="{{ route('investigation.view', $complaint->id) }}"
                                                    class="btn btn-info btn-sm">Investigation</a>
                                            @endif
                                        @endrole

                                        @role('User')
                                            @if (isset($complaint->assigned_officer_id))
                                                <a href="{{ route('investigation.view', $complaint->id) }}"
                                                    class="btn btn-info btn-sm">Investigation</a>
                                            @endif
                                        @endrole

                                        @role('Officer')
                                            @if (isset($complaint->assigned_officer_id))
                                                <a href="{{ route('investigation.edit', $complaint->institution->id) }}"
                                                    class="btn btn-info btn-sm">Investigation Edit</a>
                                            @endif
                                        @endrole
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Modal -->
    <div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('complaint.assign.officer') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignOfficerModalLabel">Assign Officer</h5>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 mb-3">
                            <label for="officer_id" class="form-label">Officers</label>
                            <select id="officer_id"
                                class="form-control text-capitalize @error('officer_id') is-invalid @enderror"
                                name="officer_id">
                                @if (isset($officers))
                                    @foreach ($officers as $officer)
                                        <option value="{{ $officer->id }}" class="text-capitalize">
                                            {{ $officer->user->name ?? '' }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('officer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input name="complaint_id" type="hidden" id="complaint_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="printBtn">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Invoice Modal -->
@endsection
