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

        // SQL to select all records but limit to 10
        $sql = "SELECT * FROM rsbernasor2_myguests LIMIT 10";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["full_name"] . " - Email: " . $row["email_address"] . 
                " - Gender: " .   $row["gender"] . " - Phone: " . $row["phone_number"] . " - Website: " . $row["website"] . 
                " - Comment: " . $row["comment"] . " - Registration Date: " . $row["reg_date"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
