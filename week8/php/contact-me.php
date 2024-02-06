        <?php
        require_once 'contact-form.php';
        $facebookLink = "https://www.facebook.com/maximuslincoln010/";
        $githubLink = "https://github.com/Bernasor10";
        $linkedinLink = "https://www.linkedin.com/in/ronaldo-bernasorii-b987761b3/";
        $instagramLink = "https://www.instagram.com/potatolicious.10/";

        // Define variables and initialize with empty values
        $nameErr = $emailErr = $genderErr = $websiteErr = $phoneErr = $commentErr = "";
        $name = $email = $gender = $comment = $website = $phone = "";
        $userFeedback = "";

        // Function for sanitizing input
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate name
            if (empty(trim($_POST["name"]))) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Only English alphabet letters are allowed";
                }
            }

            // Validate email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (!empty(trim($_POST["phone"]))) {
                $phone = test_input($_POST["phone"]);
                if (!preg_match("/^[0-9]{11}$/", $phone)) {
                    $phoneErr = "Invalid phone number format";
                }
            }
            
            // Validate website
            if (empty(trim($_POST["website"]))) {
                $websiteErr = "Please enter your website.";
            } else {
                $website = test_input($_POST["website"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                    $websiteErr = "Invalid URL";
                }
            }

            // Validate gender
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            // Validate comment
            if (empty(trim($_POST["comment"]))) {
                $commentErr = "Please enter a comment.";
            } else {
                $comment = test_input($_POST["comment"]);
            }

            if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($websiteErr) && empty($genderErr) && empty($commentErr)) {
                $sql = "INSERT INTO rsbernasor2_myguests (full_name, email_address, phone_number, website, gender, comment) VALUES (?, ?, ?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("ssssss", $param_name, $param_email, $param_phone, $param_website, $param_gender, $param_comment);

                    $param_name = $name;
                    $param_email = $email;
                    $param_phone = $phone;
                    $param_website = $website;
                    $param_gender = $gender;
                    $param_comment = $comment;

                    if ($stmt->execute()) {
                        $_SESSION['message'] = "Record added successfully.";
                        header("Location: ../php/contact-me.php");
                        exit;
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Closing the statement
                    $stmt->close();
                }
            }

            // Closing the connection
            $conn->close();
        }
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

        <!-- Contact Me Section -->
        <section id="contact">
            <h3 class="section-title reveal-animation"><i class="fas fa-envelope"></i> Contact Me</h3>

            <div class="section-content">
                <div class="age-calculator-form">
                    <h2 class="form-title">PHP Form Validation</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $name;?>" class="styled-input" placeholder="Full Name (Required)">
                            <span class="error"><?php echo $nameErr;?></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="<?php echo $email;?>" class="styled-input" placeholder="E-mail Address (Required)">
                            <span class="error"><?php echo $emailErr;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="tel" name="phone" value="<?php echo $phone;?>" class="style-input" placeholder="Phone Number (Optional)">
                            <small class="format-example">Sample format: 09123456789<br></small>
                            <span class="error"><?php echo $phoneErr;?></span>
                        </div>

                        <div class="form-group">
                            <input type="text" name="website" value="<?php echo $website;?>" class="styled-input" placeholder="Your Website (Required)">
                            <small class="format-example">Sample format: http:// or https://<br></small>
                                <span class="error"><?php echo $websiteErr;?></span>
                            </div>
                    </div>

            <div class="gender-section">
            <p>Gender:</p>
            <div class="gender-options">
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other
                <span class="error">* <?php echo $genderErr;?></span>
            </div>
            <div class="comments-section">
            <textarea name="comment" rows="5" cols="40" class="styled-input" placeholder="Comment (Required)"><?php echo $comment;?></textarea>
            <span class="error"><?php echo $commentErr;?></span>
            </div>
            <br>
        </div>
            <input type="submit" name="submit" value="Submit" onclick="buttonClickAnimation(this);">
        </form>

        </div>
        </div>
        <p class="feedback-prompt reveal-animation">Do you like my personal website so far?<br></p>
        <div class="like-button-container reveal-animation">
            <i class='fa-regular fa-thumbs-up' id="like-button"></i>
            <p id="like-count">Total Likes:</p>
        </div>
        <p id="suggestions" class="reveal-animation">
            If you have any further <strong>suggestions</strong> on how to improve my website, or if you’re interested in<br>
            <em>collaborating</em>, availing my services, or have any other questions, please don't hesitate to reach me out directly at<br>
            <strong>ronaldobernasor2@gmail.com</strong>. I'm always excited to connect and look forward to hearing from you!
        </p>
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

            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <head>
                <script src="https://kit.fontawesome.com/732c08c56d.js" crossorigin="anonymous"></script>
            </head>
            <script src="../js/contact-me.js"></script>
            <script src="../js/resourcesManager.js"></script>
            <script>
        function buttonClickAnimation(button) {
            button.style.opacity = "1";
            setTimeout(function() {
                button.style.opacity = "1";
            }, 150);
        }
        </script>
            </body>
