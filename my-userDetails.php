<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my-userDetails";

// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "my-UserDetails");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database for the user details
$sql = "SELECT * FROM logindetails WHERE user_name = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Check if the query returns a result
if (mysqli_num_rows($result) == 1) {
    // User details match, redirect to the home page or perform other actions
    header("Location: home.php");
    exit();
} else {
    // User details do not match, display an error message
    echo "Invalid username or password";
}

// Close the database connection
mysqli_close($conn);

?>