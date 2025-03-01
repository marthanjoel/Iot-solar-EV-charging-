<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "solar_ev_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
