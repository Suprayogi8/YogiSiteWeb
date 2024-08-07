<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 2rem;
            text-align: center;
        }

        .admin-options {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .admin-options h2 {
            margin-top: 0;
        }

        .admin-options a {
            display: block;
            margin: 1rem 0;
            padding: 0.5rem 0;
            color: #333;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f0f0f0;
        }

        .admin-options a:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="admin-options">
            <h2>Welcome, Admin</h2>
            <a href="manage_posts.php">Manage Posts</a>
            <a href="manage_comments.php">Manage Comments</a>
        </div>
    </main>
</body>
</html>
