<?php


include("../common/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Check if the values are empty and provide feedback
    if (empty($username)) {
        echo "Name is missing.<br>";
    } else {
        echo "Name: " . $username . "<br>";
    }

    if (empty($email)) {
        echo "Email is missing.<br>";
    } else {
        echo "Email: " . $email . "<br>";
    }
} else {
    // Handle the case where the form wasn't submitted
    echo "Form submission error!";
}
    
   

?>
