<div class="container">
    <h1 class="heading">Questions</h1>
    <div class="col-8">

    <?php
    include("../common/db.php");

    // Check if there is a search term
    if (isset($_GET['search'])) {

        
        $searched_item = $_GET['search_bar'];

        // Prepare the SQL statement with wildcard search
        $search_query = "SELECT `title`, `id` FROM questions WHERE `title` LIKE ?";
        $stmt = $conn->prepare($search_query); // Use $conn which is your mysqli connection

        // Bind the parameter
        $search_param = '%' . $searched_item . '%';
        $stmt->bind_param('s', $search_param); // 's' specifies the variable type => string

        // Execute the statement
        $stmt->execute();
        $search_result = $stmt->get_result(); // Get the result set

        // Fetch and display search results
        if ($search_result->num_rows > 0) {
            while ($row = $search_result->fetch_assoc()) {
                $searched_id = $row['id'];
                $searched_title = htmlspecialchars($row['title']); // Protect against XSS
                echo "<div class='question-list'>
                        <a href='?q=$searched_id'>$searched_title</a>
                      </div>";
            }
        } else {
            echo "<div class='question-list'>No results found.</div>";
        }

        $stmt->close(); // Close the prepared statement
    } else {
        // Fetch all questions only if no search is conducted
        $query = "SELECT * FROM questions";
        $result = $conn->query($query);

        if ($result) {
            // Display all questions
            foreach ($result as $row) {
                $id = $row['id'];
                $title = htmlspecialchars($row['title']); // Protect against XSS
                echo "<div class='question-list'>
                        <a href='?q=$id'>$title</a>
                      </div>";
            }
        } else {
            echo "<p>Error fetching questions.</p>";
        }
    }

    ?>
    
    </div>
</div>
