@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Add Complaint
            </div>
            <div class="card-body">
                <form action="{{ route('complaint.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label for="institution">Select Institution:</label>
                            <select class="form-control" name="institution_id" id="institution_id" required>
                                <option value="1">Wildlife Conservation</option>
                                <option value="2">Forest Conservation</option>
                                <option value="3">Environmental Crime</option>
                            </select>
                        </div>

                        <div class="col-5 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>

                        <div class="col-5 mb-3">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                        </div>


                        <div class="col-5 mb-3">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>

                        <div class="col-5 mb-3">
                            <iframe id="googleMap" class="d-none"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.57210708673!2d79.88265384477126!3d6.962877388600567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2586a6efd6df7%3A0x743fe749a0abfe00!2sPattiya%20North%2C%20Wattala!5e0!3m2!1sen!2slk!4v1703085245587!5m2!1sen!2slk"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>


                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <div class="col-5 mb-3">
                            <label for="images">Upload Images:</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple
                                accept="image/*">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var iframeSrc = document.getElementById('googleMap').src;

            // Improved regular expression
            var match = iframeSrc.match(/(?:!3d)(-?\d+\.\d+)(?:!2d)(-?\d+\.\d+)/);

            if (match) {
                var latitude = match[1];
                var longitude = match[2];

                console.log('Latitude:', latitude);
                console.log('Longitude:', longitude);
            } else {
                console.error('Latitude and longitude not found in the iframe URL.');
            }
        });
    </script>
@endsection
