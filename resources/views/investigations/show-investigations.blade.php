@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Investigation Detail</h5>
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
                        <label for="username" class="form-label">Insvestigation Note</label>
                        <p><b> {{ $investigation->notes ?? '' }}</b></p>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email" class="form-label">Status</label>
                        <div>
                            @if (isset($investigation->status))
                                @if ($investigation->status == 'pending')
                                    <span class="badge bg-label-secondary me-1">Pending</span>
                                @elseif($investigation->status == 'in_progress')
                                    <span class="badge bg-label-primary me-1">In Progress</span>
                                @elseif($investigation->status == 'completed')
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
                        <label for="username" class="form-label">Insvestigation Officer</label>
                        <p><b> {{ $investigation->officer->user->name ?? '' }}</b></p>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="username" class="form-label">Insvestigation Officer Badge Number</label>
                        <p><b> {{ $investigation->officer->badge_number ?? '' }}</b></p>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
