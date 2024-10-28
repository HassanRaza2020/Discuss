<!DOCTYPE html>
<html lang="en">
<head>
    <title>Discuss Project</title>
    <link rel="stylesheet" href="../public/style.css">

    <?php include('../client/commonFiles.php')?>
    
</head>
<body>   
    
    
<?php
 
session_start();

//  include('../common/db.php');
   include('../client/header.php');
//   include('../client/signup.php');


   if (isset($_GET['signup'])) 
{
    include('../client/signup.php');
} 

else if (isset($_GET['login'])) {
    include('../client/login.php');
}


else 
{
    // Optional: Add fallback content or leave it empty
}


?>




</html>