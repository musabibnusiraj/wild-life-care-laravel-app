@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                Officers
                <a href="{{ route('officer.create') }}" type="button" class="btn btn-primary float-end d-none">Create
                    Officer</a>
            </h5>
            <div class="table-responsive text-nowrap">
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
                <table class="table">

                    <thead>
                        <tr>
                            @role('Super-Admin')
                                <th>Institution Name</th>
                            @endrole
                            <th>Name</th>
                            <th>Email</th>
                            <th>Badge Number</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            @role('Admin')
                                <th></th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($officers as $officer)
                            <tr>
                                @role('Super-Admin')
                                    <td>{{ $officer->institution ? $officer->institution->name : '' }}</td>
                                @endrole

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $officer->user->name }}</strong>
                                </td>
                                <td>{{ $officer->user->email }}</td>
                                <td>{{ $officer->badge_number }}</td>
                                <td>{{ $officer->phone }}</td>
                                <td>{{ $officer->address }}</td>
                                <td>
                                    @if ($officer->status)
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Deactive</span>
                                    @endif
                                </td>

                                @role('Admin')
                                    <td>
                                        <a class="btn btn-icon btn-primary" href="{{ route('officer.edit', $officer->id) }}"><i
                                                class="bx bx-edit-alt"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('officer.destroy', $officer->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-icon btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this officer?')">
                                                <i class="bx bx-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
