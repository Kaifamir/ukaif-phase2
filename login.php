<?php
   session_start();
   include("connection.php");
  if (isset($_POST['uname']) && isset($_POST['password'])) {
 
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $formUsername = validate($_POST['uname']);
    $formPassword = validate($_POST['password']);

    if (empty($formUsername)){
      header("Location: login.php?error=User Name is required");
      exit();
    }else if(empty($formPassword)){
      header("Location: login.php?error=Password is required");
      exit();
    
    //else if details does not match sql stored details then display error message.
    }else{



// Query the database for the user details
$sql = "SELECT * FROM logindetails WHERE user_name = '$formUsername' AND password = '$formPassword'";
$result = mysqli_query($conn, $sql);

// Check if the query returns a result
if (mysqli_num_rows($result) == 1) {
 
    $_SESSION["user_name"] = $formUsername;
    // User details match, redirect to the home page or perform other actions
    header("Location: addPost.php");
    exit();
} else {
    // User details do not match, display an error message
    header("Location: login.php?error=User Name or Password is incorrect");
}

// Close the database connection
mysqli_close($conn);

    }


  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="mobile.css">
    <title>about me</title>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <h2>kaif amir</h2>
                </div>
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="aboutme.html">about</a></li>
                    <li><a href="education.html">education</a></li>
                    <li><a href="experience.html">experience</a></li>
                    <li><a href="skills.html">skills</a></li>
                    <li><a href="contact.html">contact</a></li>
                    <li><a href="login.php">login</a></li>
                </ul>
                <a href="#" class="mobile">&#8801</a>
            </nav>
        </header>
    <aside>
        <h2>Login</h2>
        <p>login to create and view previous blog posts!</p>
        <br>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
            <form name="loginForm" action="login.php" method="post" onsubmit="return validateForm()">
                <label for="username">Username:</label>
                <input type="username" placeholder="User Name" name="uname"><br><br>
                <label for="password">Password:</label>
                <input type="password" placeholder="Password" name="password"><br><br>
                <input type="submit" value="Login">
            </form>
    </aside>
        <footer>
            <p>kaif amir portfolio ©</p>
        </footer>
    </div>
</body>
</html>