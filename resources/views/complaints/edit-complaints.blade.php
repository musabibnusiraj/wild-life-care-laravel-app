@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Complaint
            </div>
            <div class="card-body">
                <form action="{{ route('complaint.update', $complaint->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Use the PUT method for updates --}}

                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="institution">Select Institution:</label>
                            <select class="form-control" name="institution_id" id="institution_id" required>
                                <option value="1" {{ $complaint->institution->type == 'wildlife' ? 'selected' : '' }}>
                                    Wildlife Conservation</option>
                                <option value="2" {{ $complaint->institution->type == 'forestry' ? 'selected' : '' }}>
                                    Forest
                                    Conservation</option>
                                <option value="3"
                                    {{ $complaint->institution->type == 'environmental_crime' ? 'selected' : '' }}>
                                    Environmental Crime</option>
                            </select>
                        </div>

                        <div class="col-5 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ $complaint->subject }}" required>
                        </div>

                        <div class="col-5 mb-3">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required>{{ $complaint->description }}</textarea>
                        </div>

                        <div class="col-5 mb-3">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $complaint->location->address ?? '' }}" required>
                        </div>


                        <div class="col-5 mb-3">
                            <label for="images">Upload Images:</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple
                                accept="image/*">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Complaint</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
