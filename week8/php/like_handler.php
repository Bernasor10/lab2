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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update like count in the database
    $sql = "UPDATE rsbernasor2_myguests SET like_count = like_count + 1 WHERE id = 1";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Retrieve like count from the database
    $sql = "SELECT like_count FROM rsbernasor2_myguests WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["like_count"];
    } else {
        echo "0";
    }
}

$conn->close();
?>
