<?php


//session_start();

include("../common/db.php");


if (isset($_POST['signup'])) {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // Hash password before saving
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New user registered successfully";
        $_SESSION["user"] = ["username" => $username, "email" => $email];
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close statement
    $stmt->close();



}


















?>
