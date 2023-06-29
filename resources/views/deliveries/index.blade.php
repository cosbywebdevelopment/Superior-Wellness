@extends('layouts.app')
@section('title', 'Today\'s Deliveries')


@section('content')

    <input id="start" value="Broombank Park, Chesterfield, UK" size="35" disabled hidden>
    <p>{{ $first->business_name }}: <input id="waypoint1" value="{{ $first->addresses->first()->address }}" size="35" disabled></p>
    <p>{{ $second->business_name }}: <input id="waypoint2" value="{{ $second->addresses->first()->address }}" size="35" disabled></p>
    <p>{{ $third->business_name }}: <input id="waypoint3" value="{{ $third->addresses->first()->address }}" size="35" disabled></p>
    <input id="end" value="Broombank Park, Chesterfield, UK" size="35" disabled hidden>

    <div id="container">
        <div id="google_map"></div>
        <div class="pb-3">
            <input type="submit" id="submit" class="btn btn-primary"value="Get Planned Route"/>
        </div>
        <div id="directions-panel"></div>
    </div>


@endsection
@push('foot')
    <script>

        function initMap() {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById("google_map"), {
                zoom: 6,
                center: { lat: 41.85, lng: -87.65 },
            });

            directionsRenderer.setMap(map);
            document.getElementById("submit").addEventListener("click", () => {
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            const waypts = [];
            const addressArray = [];

            addressArray.push(document.getElementById("waypoint1").value);
            addressArray.push(document.getElementById("waypoint2").value);
            addressArray.push(document.getElementById("waypoint3").value);

            for (let i = 0; i < addressArray.length; i++) {
                    waypts.push({
                        location: addressArray[i],
                        stopover: true,
                    });
            }

            directionsService
                .route({
                    origin: document.getElementById("start").value,
                    destination: document.getElementById("end").value,
                    waypoints: waypts,
                    optimizeWaypoints: true,
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL,
                })
                .then((response) => {
                    directionsRenderer.setDirections(response);

                    const route = response.routes[0];
                    const summaryPanel = document.getElementById("directions-panel");

                    summaryPanel.innerHTML = "";
                    let total_duration =0;
                    let time;
                    // For each route, display summary information.
                    for (let i = 0; i < route.legs.length; i++) {
                        const routeSegment = i + 1;
                        total_duration += route.legs[i].duration.value
                        time = (new Date(total_duration * 1000)).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0];
                        summaryPanel.innerHTML +=
                            "<b>Route Segment: " + routeSegment + "</b><br>";
                        summaryPanel.innerHTML += route.legs[i].start_address + " to ";
                        summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
                        summaryPanel.innerHTML += route.legs[i].duration.text + "<br>";
                        summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
                        // Iterate through the object
                        for (let s = 0; s < route.legs[i].steps.length; s++) {
                            summaryPanel.innerHTML += route.legs[i].steps[s].instructions + "<br>";
                        }
                        summaryPanel.innerHTML += "<br><br>";
                    }
                    summaryPanel.innerHTML += 'TOTAL DURATION: ' + '<strong>' + time + '</strong>' + "<br><br><br>";
                })
                .catch((e) => window.alert("Directions request failed due to " + e));
        }
        window.initMap = initMap;

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mEYVHOQHayGVyJpsfciUzZiR5QMxbgQ&callback=initMap"

    ></script>
@endpush
