@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Edit Investigations</h5>
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

                <form id="formAuthentication" class="mb-3"
                    action="{{ route('investigation.update', $investigation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="notes" class="form-label">Investigation Note</label>
                            <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes"
                                required autocomplete="notes" placeholder="Enter investigation note" autofocus>{{ $investigation->notes ?? old('notes') }}</textarea>

                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="status" class="form-label">Investigation Status</label>
                            <select id="status" class="form-control @error('status') is-invalid @enderror"
                                name="status">
                                <option value="pending" {{ $investigation->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="in_progress" {{ $investigation->status == 'in_progress' ? 'selected' : '' }}>
                                    In Progress</option>
                                <option value="completed" {{ $investigation->status == 'completed' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-3">
                            <a href="{{ route('investigation.index') }}" class="btn btn-dark d-grid w-100">Back</a>
                        </div>
                        <div class=" col-6">
                        </div>
                        <div class=" col-3">
                            <button class="btn btn-primary d-grid w-100">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
