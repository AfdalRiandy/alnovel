<?php
$servername = "localhost";
$username = "root";
$password = ""; // Add your MySQL root password here
$dbname = "alnovel";
$dbport="3308";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>