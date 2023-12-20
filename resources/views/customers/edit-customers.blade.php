@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Update Complainer</h5>
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
                @endif

                <form id="formAuthentication" class="mb-3" action="{{ route('customer.update', $customer->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $customer->user->name ?? old('name') }}" disabled
                                autocomplete="name" placeholder="Enter your username" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $customer->user->email ?? old('email') }}" disabled
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
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $customer->phone ?? old('phone') }}" disabled autocomplete="phone"
                                placeholder="Enter your phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" col-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ $customer->address ?? old('address') }}" disabled
                                autocomplete="address" placeholder="Enter your address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-6 mb-3">
                            <label for="address_2" class="form-label">Address 2</label>
                            <input id="address_2" type="text"
                                class="form-control @error('address_2') is-invalid @enderror" name="address_2"
                                value="{{ $customer->address_2 ?? old('address_2') }}" disabled autocomplete="address_2"
                                placeholder="Enter your address_2" autofocus>

                            @error('address_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-control @error('status') is-invalid @enderror"
                                name="status">
                                <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Deactive
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-3">
                            <a href="{{ route('customer.index') }}" class="btn btn-dark d-grid w-100">Back</a>
                        </div>
                        <div class=" col-6">
                        </div>
                        <div class=" col-3">
                            <button class="btn btn-primary d-grid w-100">Update</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
