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

<!-- Contact Me Section -->
<section id="contact">
    <h3 class="section-title"><i class="fas fa-envelope"></i> Contact</h3>
    <p class="feedback-prompt">Do you like my personal website so far?<br></p>
    <div class="like-button-container">
        <i class='fa-regular fa-thumbs-up' id="like-button"></i>
        <p id="like-count">Like Count: 0</p>
    </div>
    <p id="suggestions">Send me your <strong>suggestions</strong> to improve my website by filling up the form below:<br>
        or if you’re interested in <em>collaborating</em>, availing my services, or if there’s<br> 
        something else you’d like to discuss, feel free to reach out to me directly at<br>
        <strong>ronaldobernasor2@gmail.com</strong>. I look forward to hearing from you!</p> 
            <!-- FAQs Section -->
    <?php
    $faqs = [
        "What is your website about?" => "It's about my personal portfolio and blog.",
        "How can I contact you?" => "You can use the form on this page or email me directly."
    ];

    foreach ($faqs as $question => $answer) {
        echo "<p><strong>Q:</strong> $question</p>";
        echo "<p><strong>A:</strong> $answer</p>";
    }
    ?>       

<div class="section-content">
        <div class="age-calculator-form">
            <?php
            // Function to calculate age
            function calculateAge($birthYear) {
                $currentYear = date("Y");
                return $currentYear - $birthYear;
            }

            $userFeedback = ""; // Initialize an empty string for user feedback

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['birthyear'])) {
                $birthYear = intval($_POST['birthyear']);
                $currentYear = date("Y");

                // Validate the birth year
                if (is_numeric($birthYear) && $birthYear > 1900 && $birthYear <= $currentYear) {
                    $age = calculateAge($birthYear); // Use the function to calculate age
                    if ($age < 18) {
                        $userFeedback = "You are under 18 years old.";
                    } else {
                        $userFeedback = "You are $age years old.";
                    }
                } else {
                    $userFeedback = "Please enter a valid birth year.";
                }
            }

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = $_POST['email'];
                // Validate email with RegEx
                if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                    $userFeedback .= "<br>Please enter a valid email address.";
                }
            }

            if (!empty($userFeedback)) {
                echo "<p>$userFeedback</p>";
            }
            ?>

            <!-- Age Calculation Form -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="birthyear">Enter your birth year:</label>
                <input type="text" id="birthyear" name="birthyear" required>
                <input type="submit" value="Calculate Age">
            </form>
        </div>

        <!-- Original Contact Form -->
        <form id="suggestion-form">
            <label for="fullname"><span class="shadow">Full Name:</span></label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="email"><span class="shadow">Email Address:</span></label>
            <input type="email" id="email" name="email" required>
            <label for="message"><span class="shadow">Write a message:</span></label>
            <textarea id="message" name="message" required></textarea>            
            <input type="submit" value="Send">
        </form>
    </div>
</section>

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
$facebookLink = "https://www.facebook.com/your-facebook-profile";
$githubLink = "https://github.com/your-github-profile";
$linkedinLink = "https://www.linkedin.com/in/your-linkedin-profile";
$instagramLink = "https://www.instagram.com/your-instagram-profile";
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

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <head>
        <script src="https://kit.fontawesome.com/732c08c56d.js" crossorigin="anonymous"></script>
    </head>
    <script src="../js/contact-me.js"></script>
    <script src="../js/script.js"></script>

    </body>