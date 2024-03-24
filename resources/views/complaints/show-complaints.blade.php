@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Complaint Detail</h5>
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="£" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img class="w-px-200 h-auto rounded-circle">
                        </span>
                    </a>
                </div>

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


                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Complaint Subject</label>
                        <p><b> {{ $complaint->subject ?? '' }}</b></p>

                    </div>
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Complaint Description</label>
                        <p><b> {{ $complaint->description ?? '' }}</b></p>

                    </div>
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Complaint Officer Name</label>
                        <p>
                            <b>
                                {{ $complaint->officer ? $complaint->officer->user->name ?? '' : '' }}
                            </b>
                        </p>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Complaint Institution</label>
                        <p><b> {{ $complaint->institution->name ?? '' }}</b></p>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email" class="form-label">Status</label>
                        <div>
                            @if (isset($complaint->status))
                                @if ($complaint->status == 'pending')
                                    <span class="badge bg-label-secondary me-1">Pending</span>
                                @elseif($complaint->status == 'in_progress')
                                    <span class="badge bg-label-warning me-1">In Progress</span>
                                @elseif($complaint->status == 'resolved')
                                    <span class="badge bg-label-primary me-1">Completed</span>
                                @endif
                            @endif
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Attachments:</label>
                        <ul>
                            <div class="row">

                                @foreach ($complaint->attachments as $attachment)
                                    <div class=" col-3">
                                        <a href="{{ asset($attachment->file_path) }}" target="_blank">
                                            <img src="{{ asset($attachment->file_path) }}" alt="Attachment" width="100">
                                        </a>
                                    </div>
                                @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-3">
                        <a href="{{ route('complaint.index') }}" class="btn btn-dark d-grid w-100">Back</a>
                    </div>
                    <div class=" col-6">
                    </div>
                    <div class=" col-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
