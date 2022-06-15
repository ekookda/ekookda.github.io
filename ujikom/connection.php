<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LSPTDTOKO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
