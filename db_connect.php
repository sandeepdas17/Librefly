<?php
// Database configuration
$host = 'localhost';  // or '127.0.0.1'
$dbname = 'ebook_management';  // Your database name
$username = 'root';  // Default username for local server
$password = '';  // Leave blank for local setup (XAMPP/WAMP)

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the error to a file (don't display it to users in production)
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed: Please try again later."); // Friendly message for users
}
?>
