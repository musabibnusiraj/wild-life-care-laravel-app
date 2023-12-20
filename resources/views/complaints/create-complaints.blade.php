@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Add Complaint
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="institution">Select Institution:</label>
                                <select class="form-control" name="institution" id="institution" required>
                                    <option value="wildlife">Wildlife Conservation</option>
                                    <option value="forest">Forest Conservation</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="location_name">Location:</label>
                                <input type="text" class="form-control" name="location_name" id="location_name" required>
                            </div>

                            <div id="map" style="height: 300px;"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">

                            <div class="form-group">
                                <label for="contact">Contact Number:</label>
                                <input type="text" class="form-control" name="contact" id="contact" required>
                            </div>

                            <div class="form-group">
                                <label for="images">Upload Images:</label>
                                <input type="file" class="form-control-file" name="images[]" id="images" multiple accept="image/*">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit Complaint</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 8
            });

            var input = document.getElementById('location_name');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                map.setCenter(place.geometry.location);
                map.setZoom(15);

                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }
    </script>
@endsection
