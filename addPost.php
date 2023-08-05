<?php
   session_start();
   include("connection.php");
    if (isset($_POST["title"]) && isset($_POST['description'])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $date = date('Y-m-d H:i:s');


    
    // Insert post into database
    $insert="INSERT INTO posts(title, description, created) VALUES('$title', '$description', '$date')";
    if ($conn->query($insert) === TRUE) {
        header("Location: viewBlog.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <script src="clearProcessing.js" defer></script>
    <script src="validateBlog.js" defer></script>
    <title>blog</title>
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
                    <li><a href="viewBlog.php">viewblogs</a></li>
                    <li><?php
                    if (isset($_SESSION['user_name'])){
                        echo '<a href="logout.php">log out</a>';
                    }else{
                        echo '<a href="login.php">log in</a>';
                    }?></li>
                </ul>
                <a href="#" class="mobile">&#8801</a>
            </nav>
        </header>
        <aside>
            <h2>Blog</h2>
            <form action="" method="post" id="blogform">
                <label for="title">Title:</label>
                <input type="text" id="title" action="addPost.php" name="title">
                <span id="title-error"></span><br><br>
                <label for="content">Enter text here:</label><br>
                <textarea id="description" name="description" rows="10" cols="50"></textarea>
                <span id="description-error"></span><br><br>
                <input type="submit" value="Submit" />
                <input type="button" value="Clear" id="clear-btn" onclick="clearform()">
            </form>   
        </aside>

        <footer>
            <p>kaif amir portfolio ©</p>
        </footer>
    </div>
</body>
</html>