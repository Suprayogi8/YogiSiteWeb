<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "web_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
