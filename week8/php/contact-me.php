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
    <p id="suggestions">Send me your <strong>suggestions</strong> to improve my website by filling up the form below:<br>
        or if you’re interested in <em>collaborating</em>, availing my services, or if there’s<br> 
        something else you’d like to discuss, feel free to reach out to me directly at<br>
        <strong>ronaldobernasor2@gmail.com</strong>. I look forward to hearing from you!</p> 
        <p class="feedback-prompt">Do you like my personal website so far?<br></p>
    <div class="like-button-container">
        <i class='fa-regular fa-thumbs-up' id="like-button"></i>
        <p id="like-count">Like Count: 0</p>
    </div>

    <!-- FAQs Section -->
    <?php
    $faqs = [
        "What is your website about?" => "It's all about my personal portfolio showing my interest, dislikes, and music preferences.",
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

            $nameErr = $emailErr = $genderErr = $websiteErr = "";
            $name = $email = $gender = $comment = $website = "";

            $userFeedback = ""; // Initialize an empty string for user feedback

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }

                if (empty($_POST["website"])) {
                    $website = "";
                } else {
                    $website = test_input($_POST["website"]);
                    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                        $websiteErr = "Invalid URL";
                    }
                }

                if (empty($_POST["comment"])) {
                    $comment = "";
                } else {
                    $comment = test_input($_POST["comment"]);
                }

                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["gender"]);
                }
                
                if (empty($nameErr) && empty($emailErr) && empty($websiteErr) && empty($genderErr)) {
                    // No errors, display user's input
                    echo "<h2>Your Input:</h2>";
                    echo "Name: " . $name . "<br>";
                    echo "Email: " . $email . "<br>";
                    echo "Website: " . $website . "<br>";
                    echo "Comment: " . $comment . "<br>";
                    echo "Gender: " . $gender . "<br>";
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

<!-- W3Schools Form -->
<h2>PHP Form Validation Example</h2>
<p><span class="error">*Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <fieldset>
        <legend>Personal Information</legend>
        Full Name <span class="error">*</span> <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>
        E-mail <span class="error">*</span> <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>
        Website <span class="error">*</span> <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error"><?php echo $websiteErr;?></span>
    </fieldset>
    <br>
    <fieldset>
        <legend>Additional Information</legend>
        Comments <textarea name="comment" rows="5" cols="40" class="styled-input"><?php echo $comment;?></textarea>
        <br><br>
        Gender
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $genderErr;?></span>
    </fieldset>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
</form>
</div>
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