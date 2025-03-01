<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $arrival = $_POST['arrival_time'];
    $duration = $_POST['charging_duration'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $user = $_SESSION['user'];
    
    $stmt = $conn->prepare("INSERT INTO bookings (user, user_name, arrival_time, charging_duration, latitude, longitude, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("ssssss", $user, $name, $arrival, $duration, $latitude, $longitude);
    $stmt->execute();
    echo "<script>alert('Booking submitted!');</script>";
}

$bookings = $conn->query("SELECT * FROM bookings WHERE user='" . $_SESSION['user'] . "'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Charging Slot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .booking-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="booking-container">
            <h2 class="text-center">Book a Charging Slot</h2>
            <form method="post">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Arrival Time</label>
                    <input type="datetime-local" name="arrival_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Duration (minutes)</label>
                    <input type="number" name="charging_duration" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Latitude</label>
                    <input type="text" id="latitude" name="latitude" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Longitude</label>
                    <input type="text" id="longitude" name="longitude" class="form-control" required>
                </div>
                <button type="button" class="btn btn-secondary w-100 mb-2" onclick="getLocation()">Get Current Location</button>
                <button type="submit" class="btn btn-primary w-100">Book</button>
            </form>
        </div>
        <div class="mt-5">
            <h3>Your Bookings</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Arrival Time</th>
                        <th>Duration</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $bookings->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['arrival_time']); ?></td>
                            <td><?php echo htmlspecialchars($row['charging_duration']); ?> mins</td>
                            <td><?php echo htmlspecialchars($row['latitude']); ?></td>
                            <td><?php echo htmlspecialchars($row['longitude']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
