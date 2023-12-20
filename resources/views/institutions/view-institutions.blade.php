@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                Institutions
                <a href="{{ route('institution.create') }}" type="button" class="btn btn-primary float-end">Create
                    Institution</a>
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
                            <th>Institution Name</th>
                            <th></th>
                            <th>Branch</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($institutions as $institution)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $institution->name }}</strong>
                                </td>
                                <td>
                                    @if ($institution->type == 'forestry')
                                        <span class="badge bg-primary">Forestry Conservation</span>
                                    @elseif ($institution->type == 'environmental_crime')
                                        <span class="badge bg-dark">Environmental Resources Conservation</span>
                                    @elseif ($institution->type == 'wildlife')
                                        <span class="badge bg-info">Wild Life Conservation</span>
                                    @endif
                                </td>
                                <td>{{ $institution->branch }}</td>
                                <td>{{ $institution->user->name }}</td>
                                <td>{{ $institution->user->email }}</td>
                                <td>{{ $institution->phone }}</td>
                                <td>
                                    @if ($institution->status)
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-icon btn-primary"
                                        href="{{ route('institution.edit', $institution->id) }}"><i
                                            class="bx bx-edit-alt"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('institution.destroy', $institution->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-icon btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this institution?')">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
