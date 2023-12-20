@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Complaints</h1>

        @if(!is_null($complaints) && count($complaints) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->subject }}</td>
                            <td>{{ $complaint->description }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No complaints found.</p>
        @endif
    </div>
@endsection
