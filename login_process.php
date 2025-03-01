<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $email, $hashed_password);
            $stmt->fetch();
            
            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $email;
                header("Location: index.php"); // Redirect to homepage
                exit;
            } else {
                echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('User not found'); window.location.href='login.php';</script>";
        }
        $stmt->close();
    } else {
        echo "Error preparing query.";
    }
}
$conn->close();
?>
