<select class="form-control" name="category" id="category">
    <option value="" disabled selected> Select A Category</option>
    <?php 
    include("../common/db.php");
    $query = "SELECT * FROM category";
    $result = $conn->query($query);
    foreach ($result as $row) {
        //var_dump($row);
        $name = ucfirst($row['name']);
        $id = $row['Id'];
        echo "<option value='$id'>$name</option>";
       
    }
    ?>
</select>

<script>console.log("Test Passed");</script>
