<?php 
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my-blog";
    
    // Establish a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    ?>