
<div class="answer-div">
<h3 class="answers"> Answers</h3>

<?php

include('../common/db.php');

$id = $_GET['q'] ?? null;  // Fetch the question ID from the URL


if ($id) {
    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT a.answer, username FROM answers a JOIN questions q ON a.question_id = q.id WHERE q.id = ?");
    $stmt->bind_param("i", $id);  // Bind the $id as an integer parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        foreach ($result as $row) {
            
            $answers = htmlspecialchars($row['answer']);  // Protect against XSS
            $name = htmlspecialchars($row['username']);
           
            echo "<div class='answer-list'>
            <h6>$name</h6>
            $answers
            </div>";
        }
    } else {
        echo "<p>Error fetching answers.</p>";
    }
    
    $stmt->close();  // Close the statement
} else {
    echo "<p>No question ID provided.</p>";
}

$conn->close();  // Close the database connection
?>
</div>
