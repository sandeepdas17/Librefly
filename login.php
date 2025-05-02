<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('db_connect.php');

// Start the session
session_start();

// Check the request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

// Capture form data
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Validate input
if (empty($email) || empty($password)) {
    die("Please enter both email and password.");
}

// Query to find user by email
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Database query failed: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch user data
    $user = $result->fetch_assoc();

    // Verify the password (plain-text comparison)
    if ($user['password'] === $password) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header('Location: adminpanel.html'); // Redirect admin users
        } else {
            header('Location: index.html'); // Redirect non-admin users
        }
        exit;
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid email or password.";
}

$stmt->close();
$conn->close();
?>
