<?php
session_start();

include "../common/db.php";

function Error_Message($errorMessage)
{
    // Set error message in the session
    $_SESSION['error_message'] = $errorMessage;
}

if (isset($_POST['signup'])) {
    // Signup code
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

    $user->insert_id;
    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION["user"] = ["username" => $username, "email" => $email];
        header("location: /Discuss/server/?login=true");
        exit;
    }

    $stmt->close();
}

// Login code
else if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = $_POST['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store user details in session

            $_SESSION["user"] = [
                "username" => $user['username'],
                "email" => $user['email'],
                "user_id" => $user['id'], // Store the user ID from the database

            ];
         

            header("location: /Discuss/server");
            exit;
        } else {
            Error_Message("Incorrect Password");
        }
    } else {
        Error_Message("User Not Found");
    }

    // Redirect to the login page after setting the error message
    header("location: /Discuss/server/?login=true");
    exit();
} 

else if (isset($_GET['logout'])) {
    session_unset();
    header("location: /Discuss/server/");
} 

else if (isset($_POST["ask"])) {

    //print_r($_POST);
    $user_id = $_SESSION['user']['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];


    // Prepare the SQL statement
    $question = $conn->prepare("INSERT INTO `questions` (`title`, `description`, `category_id`,`user_id`)
    VALUES ( ?, ?, ?,?)");
    if ($question === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $question->bind_param("ssss", $title, $description, $category, $user_id);

    // Execute the statement
    if ($question->execute()) {
        header("Location: /Discuss/server/");

        exit;
    } else {
        echo "Error adding question to the website.";
    }

    // Close the statement
    $question->close();

}


    else if (isset($_POST['answer'])) 
    {
    //  print_r($_POST);
    

        $user_id = $_SESSION['user']['user_id'];
        $username = $_SESSION['user']['username'];
        $answerText = $_POST['textarea']; // Renamed to avoid conflict
        $question_id = $_POST['id'];


        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO `answers` (`user_id`, `question_id`, `username`, `answer`) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        
        // Bind parameters
        $stmt->bind_param("ssss", $user_id, $question_id, $username, $answerText);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Answer has been added!";
        } else {
            echo "Error adding question to the website.";
        }
        
        // Close the statement
        $stmt->close();
    


    }



 



?>