<?php

$host = "localhost";
$username = "root";
$password = null;
$database = "discuss";

//echo "DB FILE IS INCLUDED";

$conn = new mysqli($host,$username,$password,$database);

if ($conn->connect_error){
    die("not connected with DB". $conn->connect_error);

}

else{
    echo "Database Connected!!";
}



?>