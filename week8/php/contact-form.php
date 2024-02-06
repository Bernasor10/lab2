            <?php
	// for socitcloud
	$servername = "localhost";
	$username = "webprogmi222_sf221";
	$password = "xE*Y2nleNVvZm[!!";
	$dbname = "webprogmi222_sf221";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
            ?>
