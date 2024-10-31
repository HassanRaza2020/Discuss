<div class="container">
    <h1 class="heading"> Questions</h1>
    <div class="col-8">

    <?php
    include("../common/db.php");

    $query = "SELECT * FROM questions";
    $result = $conn->query($query);

    if ($result) {
        foreach ($result as $row) {
           
            $id = $row['id'];
            $title = htmlspecialchars($row['title']); // Protect against XSS
            echo  "<div class='question-list'>
            <a href='?q=$id'>$title</a>
            </div>";
        }
    } 
    else 
    {
        echo "<p>Error fetching questions.</p>";
    }
    ?>
</div>
</div>
