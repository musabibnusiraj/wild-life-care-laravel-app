@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Complaints</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Images</th>
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
                                    @foreach ($complaint->attachments as $attachment)
                                    <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Image" class="img-thumbnail" width="50">
                                @endforeach
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
                                    <a href="{{ route('complaint.show', $complaint->id) }}" class="btn btn-info btn-sm">View</a>
                   
                                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
