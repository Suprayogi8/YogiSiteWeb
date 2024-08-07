<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM images WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: manage_posts.php?success=1');
} else {
    header('Location: manage_posts.php?error=1');
}
?>
