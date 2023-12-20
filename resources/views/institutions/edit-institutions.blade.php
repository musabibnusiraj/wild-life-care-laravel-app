@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Update Institution</h5>
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

                <form id="formAuthentication" class="mb-3" action="{{ route('institution.update', $institution->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-12 mb-3">
                            <label for="instituion_name" class="form-label">Institution Name</label>
                            <input id="instituion_name" type="text"
                                class="form-control @error('instituion_name') is-invalid @enderror" name="instituion_name"
                                value="{{ $institution->name ?? old('instituion_name') }}" required
                                autocomplete="instituion_name" placeholder="Enter instituion name" autofocus>

                            @error('instituion_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="type" class="form-label">Institution Type</label>
                            <select id="type" class="form-control @error('type') is-invalid @enderror" name="type">
                                <option value="forestry" {{ $institution->type === 'forestry' ? 'selected' : '' }}>Forestry
                                    Conservation</option>
                                <option value="environmental_crime"
                                    {{ $institution->type === 'environmental_crime' ? 'selected' : '' }}>Environmental
                                    Resources Conservation</option>
                                <option value="wildlife" {{ $institution->type === 'wildlife' ? 'selected' : '' }}>Wild Life
                                    Conservation</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <select id="branch" class="form-control @error('branch') is-invalid @enderror"
                                name="branch">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch }}"
                                        {{ $institution->branch === $branch ? 'selected' : '' }}>{{ $branch }}
                                    </option>
                                @endforeach
                            </select>
                            @error('branch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $institution->name ?? old('name') }}" required autocomplete="name"
                                placeholder="Enter your username" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $institution->email ?? old('email') }}" required
                                autocomplete="email" placeholder="Enter your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ $institution->address ?? old('address') }}" required
                                autocomplete="address" placeholder="Enter your address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" col-6 mb-3">
                            <label for="address_2" class="form-label">Address 2</label>
                            <input id="address_2" type="text"
                                class="form-control @error('address_2') is-invalid @enderror" name="address_2"
                                value="{{ $institution->address_2 ?? old('address_2') }}" autocomplete="address_2"
                                placeholder="Enter your address_2" autofocus>

                            @error('address_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" type="text"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ $institution->phone ?? old('phone') }}" required autocomplete="phone"
                                placeholder="Enter your phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-control @error('status') is-invalid @enderror"
                                name="status">
                                <option value="1">Active
                                </option>
                                <option value="0">Deactive
                                </option>
                            </select>
                        </div>
                        <div class="col-6 mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3 form-password-toggle">
                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-confirm" class="form-control"
                                    name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" autocomplete="new-password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class=" col-3">
                            <a href="{{ route('institution.index') }}" class="btn btn-dark d-grid w-100">Back</a>
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
