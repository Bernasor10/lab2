<?php
// Define PHP variables
$title = "Ronaldo Bernasor II";
$nickname = "Bam";
$degree = "BSIT";
$college = "Asia Pacific College";
$greeting = "Hi! My name is $title";
$youtubeLink = "https://www.youtube.com/watch?v=BbeeuzU5Qc8";
$facebookLink = "https://www.facebook.com/maximuslincoln010/";
$githubLink = "https://github.com/Bernasor10";
$linkedinLink = "https://www.linkedin.com/in/ronaldo-bernasorii-b987761b3/";
$instagramLink = "https://www.instagram.com/potatolicious.10/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="../images/maximus.png" type="image/x-icon">
    <title><?php echo $title; ?></title>
    <style>
        /* Add your CSS here */
    </style>
</head>
<body>
    <div id="welcome-message" style="display: none;">
        <p>Welcome Adventurer!</p>
    </div>
    <video autoplay muted loop id="background-wallpaper">
        <source src="../images/thelive-wallpaper02.mp4" type="video/mp4">
        Your current browser does not support the video tag.
    </video>

    <div id="mySidebar" class="sidebar">
        <!-- Close Button -->
        <a href="javascript:void:0" class="closebtn" onclick="closeSidebar()"></a>
        
    <!-- Video -->
    <img id="somsomi" src="../images/somsomiii.gif" width="100%" style="position: relative;"
    alt="Jeon Somi Happy happy">
    
    <!-- Container for Navigation Links -->
    <div class="sidebar-nav-links">
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="about-me.php"><i class="fas fa-user"></i> About Me</a>
        <a href="playlist.php"><i class="fas fa-music"></i> Playlist</a>
        <a href="contact-me.php"><i class="fas fa-envelope"></i> Contact</a>
        <a href="resources.php"><i class="fas fa-book"></i> Resources</a>
    </div>
</div>

<!-- Navigation Bar -->
<nav class="navbar">
<a id="logo" href="home.php">
    <div class="logo">호날두</div>
</a>
<div class="menu-toggle">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>
<ul class="nav-links">
    <li><a href="home.php">Home</a></li>
    <li><a href="about-me.php">About Me</a></li>
    <li><a href="playlist.php">Playlist</a></li>
    <li><a href="contact-me.php">Contact</a></li>
    <li><a href="resources.php">Resources</a></li>
</ul>
</nav>

<!-- Home Section -->
<section id="home">
    <div class="main-content">
        <div class="main-content-grid">
            <div class="text-container">
            <?php
                    echo "<h1 class=\"header\"><span class=\"type\" data-text=\"Hi, I'm $title\">$greeting</span></h1>";
                    echo "<h2 class=\"subheader\"><span class=\"type1\" data-text=\"Potato Lover\"></span></h2>";
                    echo "<p>";
                    echo "And you can call me <strong>$nickname</strong>. I <em>love</em> potatoes and enjoy them in all varieties.<br>";
                    echo "I am currently pursuing my studies in <strong>$degree</strong> at <em>$college</em>.<br>";
                    echo "This is my <strong>first time</strong> creating a website, and I am <em>excited</em> about this new learning<br>";
                    echo "experience. I chose $degree because I have always been <em>fascinated</em> by computers<br>";
                    echo "and the <strong>endless possibilities</strong> they offer.<br>";
                    echo "If you want to know more about me, just click <strong>Learn More</strong><br>";
                    echo "or <strong class=\"highlight-video\">Introduction Video</strong> 😉";
                    echo "</p>";            
                    echo "<a href=\"about-me.php\" class=\"button\">Learn More</a>";
                    echo "<a href=\"$youtubeLink\" class=\"button\" target=\"_blank\">Introduction Video</strong></a>";
                    echo "<div id=\"time\"></div>";
                    ?>
                <div id="time"></div>
            </div>
            <div class="image-container">
                <img src="../images/me.jpg" alt="Image of mine" class="right-side-image" />
            </div>

        </div>
    </div>
<!-- Footer with Social Links -->
<footer class="social-links-container">
    <h3 class="social-links-title">Connect with Me</h3>
    <div class="social-links">
    <a href="<?php echo $facebookLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-facebook-circle'></i></span></a>
            <a href="<?php echo $githubLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-github'></i></span></a>
            <a href="<?php echo $linkedinLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-linkedin-square'></i></span></a>
            <a href="<?php echo $instagramLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-instagram'></i></span></a>
    </div>
</footer>
</section>
<!-- End of Home Section -->
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <head>
        <script src="https://kit.fontawesome.com/732c08c56d.js" crossorigin="anonymous"></script>
    </head>
    <script src="../js/script.js"></script>
        
</body>
</html>