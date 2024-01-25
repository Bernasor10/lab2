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
    <link rel="icon" href="images/maximus.png" type="image/x-icon">
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

<!-- Playlist Section -->
<section id="playlist">
    <div class="playlist-header">
        <!-- New div for the header text -->
        <div class="header-text">
            <h2>My Spotify Playlist</h2>
        </div>
    </div>
    <!-- Grid Container for GIFs -->
    <div class="gif-grid">
        <!-- Chipi GIF (Left) -->
        <div class="cat-gif-container">
            <img src="../images/chipi.gif" alt="Chipi Chapa Cat Meme GIF" class="left-cat-gif"/>
        </div>
        <!-- Cat Jam GIF (Middle) -->
        <div class="cat-gif-container">
            <img src="../images/catjam-cat.gif" alt="Cat Jamming Meme GIF" class="middle-cat-gif"/>
        </div>
    </div>
    <!-- Grid Container for Playlists -->
    <div class="playlist-grid">
        <!-- Non-English Playlist -->
        <div class="playlist-grid-item">
            <h2>Non-English Playlist</h2>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/2ydHt73gEEjkTII4a7kTi8?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <!-- English Playlist -->
        <div class="playlist-grid-item">
            <h2>English Playlist</h2>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4V5QIbU1nq51Z1h189b3qF?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <!-- Tagalog Playlist (Mostly) -->
        <div class="playlist-grid-item">
            <h2>Tagalog Playlist (Mostly)</h2>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/0CH99T13A2ssIdkj4Vw2nN?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <!-- Study Playlist (Mostly) -->
        <div class="playlist-grid-item">
            <h2>Non-Vocal Playlist</h2>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/3bcT701qWdhJCEnZlKhVdY?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
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

    <!-- Social Media Links -->
    <div class="footer-grid-item">
        <h4>Connect with Me</h4>
        <div class="social-links">
            <a href="<?php echo $facebookLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-facebook-circle'></i></span></a>
            <a href="<?php echo $githubLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-github'></i></span></a>
            <a href="<?php echo $linkedinLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-linkedin-square'></i></span></a>
            <a href="<?php echo $instagramLink; ?>" target="_blank"><span class="icon"><i class='bx bxl-instagram'></i></span></a>
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