<?php
$facebookLink = "https://www.facebook.com/maximuslincoln010/";
$githubLink = "https://github.com/Bernasor10"; // String
$linkedinLink = "https://www.linkedin.com/in/ronaldo-bernasorii-b987761b3/";
$instagramLink = "https://www.instagram.com/potatolicious.10/"; // String
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
    <title>Ronaldolicious</title>
    <style>
    </style>
</head>
<body>
    <video autoplay muted loop id="background-wallpaper">
        <source src="../images/thelive-wallpaper02.mp4" type="video/mp4">
        Your current browser does not support the video tag.
    </video>
    <div class="overlay"></div>

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

<!-- About Section -->
<section id="about">
    <div class="about-grid">
        <div>
            <h3 class="about-header"><i class="fas fa-user"></i> About Me</h3>
            <p class="about-description">
                I was born in <strong><em>December 10, 2001</em></strong>, I am currently <strong><em>22 years old</em></strong> and my Junior High School journey includes four years at 
                <em>Santa Clara Parish School</em> in Pasay City and I graduated Senior High School at <em>Asia Pacific College</em>.
                One of my hobbies is <strong><em>cycling</strong></em>. I picked it up during the pandemic as a way to stay active. It was just me, my bike, and the open road every morning. But now, with my schedule getting busier, I don't get to cycle as much. Even so, whenever 
                I find some free time, I enjoy going for a ride. It's always a <strong><em>good time</strong></em>.
            </p>
            </div>            
        <div>
            <h3 class="about-header"><i class="fas fa-heart"></i> Interests</h3>
            <ul class="about-list">
                <li><strong>Binge-watching K-dramas</strong> is something I really enjoy. It is a great way 
                    to <em>unwind</em> and get lost in different stories</li>
                <li>I enjoy <strong>jamming to K-pop and Western music</strong>.</li>
                <li><strong>Playing video games</strong> like Valorant, CODM, and Wildrift, Among Us is something I really enjoy. 
                    It is a <em>fun experience</em></li>
                <li><strong>Cat and dog lover</strong>. I used to have dogs and cats before, even a snake
                    🐍
                </li>
                <li>I <strong>like memes</strong></li>
            </ul>
        </div>
        <div>
            <h3 class="about-header"><i class="fas fa-utensils"></i> My top 10 favorite foods</h3>
            <ol class="ol-about-list">
                <li>French fries 🍟</li>
                <li>Munggo 🥣</li>
                <li>Chicken fillet 🍗</li>
                <li>Mojos 🥔</li>
                <li>Lasagna 🍝</li>
                <li>Salad 🥗</li>
                <li>Pasta 🍝</li>
                <li>Siomai rice 🍚</li>
                <li>Sinigang na baboy 🍲🐷</li>
                <li>Bulalo 🥩</li>
            </ol>
            
        </div>
        <div>
            <h3 class="about-header"><i class="fas fa-thumbs-down"></i> Things that I hate</h3>
            <ul class="about-list">
                <li><strong>Eating my potatoes</strong> without my permission</li>
                <li>People who <i>judge quickly</i> without knowing the full story.</li>
                <li>Spreading false informations</li>
            </ul>
            <!-- Adding the GIF -->
            <img src="../images/saitama.gif" alt="Saitama GIF" class="Saitama, the one punch man" />
        </div>
    </div>
    <div class="about-grid transparent-grid">
        <div class="about-gif-container">
            <img src="../images/huh-cat-meme.gif" alt="Huh Cat Meme">
        </div>
        <div class="quote-container quote1 flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <!-- Front content goes here -->
                    <p class="quote-text">Click or hover to reveal the quote!</p>
                </div>
                <div class="flip-card-back">
                    <blockquote class="quote-text">
                        "When you find your path, you must not be afraid. You need to have sufficient courage to make mistakes. Disappointment, defeat, and despair are the tools God uses to show us the way."
                    </blockquote>
                    <cite>- Paulo Coelho</cite>
                </div>                
            </div>
        </div>
        <div class="quote-container quote2 flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <div class="flip-card-front">

                    <p class="quote-text">Click or hover to reveal the quote!</p>
                </div>
                <div class="flip-card-back">
                    <blockquote class="quote-text">
                        "Do not stop when you are tired, stop when you are done."
                    </blockquote>
                    <cite>- J.S</cite>
                </div>
                
            </div>
        </div>
        <div class="about-gif-container">
            <img src="../images/dog-suspiciouslook.gif" alt="A dog with a suspicious look on its face">
        </div>
    </div>

<!-- Footer with Social Links and More -->
<footer class="social-links-container">
    <!-- About Section -->
    <div class="footer-grid-item">
        <h4>About Me</h4>
        <p>I'm Ronaldo Bernasor II, a BSIT student passionate about web development and technology. This website is a portfolio of my work and a window into my world of tech and creativity.</p>
    </div>

    <!-- Navigation Links -->
    <div class="footer-grid-item">
        <h4>Quick Links</h4>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about-me.php">About Me</a></li>
            <li><a href="playlist.php">Playlist</a></li>
            <li><a href="contact-me.php">Contact</a></li>
            <li><a href="resources.php">Resources</a></li>
        </ul>
    </div>

    <?php
// Define social media links
$facebookLink = "https://www.facebook.com/maximuslincoln010/";
$githubLink = "https://github.com/Bernasor10";
$linkedinLink = "https://www.linkedin.com/in/ronaldo-bernasorii-b987761b3/";
$instagramLink = "https://www.instagram.com/potatolicious.10/";
?>
<!-- Social Media Links -->
<div class="footer-grid-item">
    <h4>Connect with Me</h4>
    <div class="social-links">
        <?php
        // Array of social links
        $socialLinks = [
            'facebook' => $facebookLink,
            'github' => $githubLink,
            'linkedin' => $linkedinLink,
            'instagram' => $instagramLink
        ];

        // Loop through social links and display them with existing CSS classes
        foreach ($socialLinks as $network => $link) {
            echo "<a href='{$link}' target='_blank'><span class='icon'><i class='bx bxl-{$network} bxl'></i></span></a>";
        }
        ?>
    </div>
</div>
</footer>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<head>
    <script src="https://kit.fontawesome.com/732c08c56d.js" crossorigin="anonymous"></script>
</head>
<script src="../js/script.js"></script>

</body>