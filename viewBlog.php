<?php
include("connection.php");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, TITLE, DESCRIPTION, CREATED FROM posts";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $array = $result->fetch_all(MYSQLI_ASSOC);
    $length = count($array);
    for ($outer = 0; $outer < $length; $outer++) {
        for ($inner = 0; $inner < $length; $inner++) {
            if ($array[$outer]["CREATED"] > $array[$inner]["CREATED"]) {
                $tmp = $array[$outer];
                $array[$outer] = $array[$inner];
                $array[$inner] = $tmp;
            }
        }
    }
  } else {
    echo "0 results";
  }

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="viewBlog.css">
    <link rel="stylesheet" href="mobile.css">
    <title>View Blogs</title>
</head>
<body>
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
                    <li><a href="blog.html">blog</a></li>
                    <li><a href="login.php">login</a></li>
                </ul>
                <a href="#" class="mobile">&#8801</a>
            </nav>
        </header>

        <aside class="separate">
            <h2>View Previous Blogs</h2>
            <?php
            while($row = $result->fetch_assoc()) {
                echo '<p class="title">' .$row["TITLE"]. "<p>";
                echo '<p class="text">' .$row["DESCRIPTION"]. "</p>";
                echo "<p>" .$row["CREATED"]. "</p>";
                echo "------------------------------------------------------------------------------------------------------------------";
            }
            ?>
           <?php
           for ($i = 0; $i < count($array); $i++) {

                echo '<p class="title">' .$array[$i]["TITLE"]. "<p>";
                echo '<p class="text">' .$array[$i]["DESCRIPTION"]. "</p>";
                echo "<p>" .$array[$i]["CREATED"]. "</p>";
                echo "------------------------------------------------------------------------------------------------------------------";
            }
            ?>
        </aside>

        <footer>
            <p>kaif amir portfolio ©</p>
        </footer>
    </div>
</body>
</html>