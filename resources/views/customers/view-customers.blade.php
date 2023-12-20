@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Complainers</h5>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($customers as $customer)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $customer->user->name }}</strong>
                                    </td>
                                    <td>{{ $customer->user->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        @if ($customer->status)
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="dropdown-item" href="{{ route('customer.edit', $customer->id) }}"><i
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
