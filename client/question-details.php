<div class="container">
   
    <?php
    include("../common/db.php");

    // Get the 'q' parameter from the URL safely
    $id = $_GET['q'] ?? null;

    if ($id) {
        // Prepare the SQL statement with comma separation for multiple columns
        $stmt = $conn->prepare("SELECT `title`, `description` FROM `questions` WHERE `id` = ?");
        $stmt->bind_param("i", $id); // Bind the parameter as an integer

        // Execute the statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $title = htmlspecialchars($row['title']); // Protect against XSS
                $description = htmlspecialchars($row['description']);          
                echo "<h4 class='question-title'>".$title."</h4>";
                echo "<p>".$description."</p>";
                

            } else {
                echo "<p>No question found.</p>";
            }
        } else {
            echo "<p>Error executing query.</p>";
        }




        // Close the statement
        $stmt->close();
    } else 
    {
        echo "<p>Invalid question `ID.</p>";
    }


    ?>
    


<form action="../server/requests.php" method="POST">

<!-- Hidden input field to pass the 'id' value -->
<input type="hidden" name="id" value="<?php echo $_GET['q'] ?? ''; ?>">

<!-- Textarea for the user's answer -->
<textarea placeholder="Your answer..." class="form-control" name="textarea"></textarea>

<!-- Submit button -->
<button class="btn-answer" name="answer">Answer</button>
</form>



</div>

