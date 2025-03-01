<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$bookings = $conn->query("SELECT * FROM bookings");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_booking'])) {
    $id = $_POST['booking_id'];
    $status = $_POST['status'];
    $conn->query("UPDATE bookings SET status='$status' WHERE id=$id");
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Manage Bookings</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Arrival</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $bookings->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['arrival_time']; ?></td>
                    <td><?php echo $row['charging_duration']; ?> mins</td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if (!empty($row['latitude']) && !empty($row['longitude'])) { ?>
                            <a href="https://www.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>" target="_blank">View Location</a>
                        <?php } else { ?>
                            Not Available
                        <?php } ?>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                            <select name="status" class="form-select">
                                <option value="Approved">Approve</option>
                                <option value="Rejected">Reject</option>
                            </select>
                            <button type="submit" name="update_booking" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
