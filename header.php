<?php session_start(); ?>
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
                    <li><?php echo "current user " . $_SESSION["user_name"]; ?></li>
                </ul>
                <a href="#" class="mobile">&#8801</a>
            </nav>
        </header>