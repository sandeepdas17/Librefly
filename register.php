<?php
// Include database connection
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $checkQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (email, password, role) VALUES (?, ?, 'user')";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful. You can now log in.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
