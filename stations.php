<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nearby EV Charging Stations</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        #map { height: 500px; width: 90%; margin: auto; }
        .container { margin-top: 20px; }
    </style>
</head>
<body>

<h2>📍 Nearby EV Charging Stations</h2>
<p>Your location will be used to show nearby charging stations.</p>
<div id="map"></div>

<script>
function initMap() {
    // Default location (fallback)
    var defaultLocation = { lat: 18.5204, lng: 73.8567 }; // Pune, India

    // Try to get user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            showMap(userLocation);
        }, function() {
            showMap(defaultLocation); // If user denies location access
        });
    } else {
        showMap(defaultLocation); // If browser doesn't support Geolocation
    }
}

function showMap(location) {
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: location
    });

    // Add marker for user location
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: "You are here"
    });

    // Charging station locations (Dummy data - Replace with actual DB data)
    var stations = [
        { lat: 18.5300, lng: 73.8450, name: "Solar EV Station 1" },
        { lat: 18.5000, lng: 73.8600, name: "Solar EV Station 2" }
    ];

    stations.forEach(station => {
        new google.maps.Marker({
            position: { lat: station.lat, lng: station.lng },
            map: map,
            title: station.name,
            icon: "https://maps.google.com/mapfiles/ms/icons/green-dot.png"
        });
    });
}
</script>

</body>
</html>
