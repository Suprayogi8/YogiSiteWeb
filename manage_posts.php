<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
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
        }

        .post-item {
            background-color: white;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .post-item img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .post-info {
            flex-grow: 1;
            margin-left: 1rem;
        }

        .post-info h2 {
            margin: 0;
        }

        .post-info p {
            margin: 0.5rem 0 0;
        }

        .post-actions a {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 1rem;
        }

        .post-actions a:hover {
            background-color: #555;
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
        <h1>Manage Posts</h1>
        <?php
        $sql = "SELECT * FROM images";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="post-item">';
                echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
                echo '<div class="post-info">';
                echo '<h2>' . $row["title"] . '</h2>';
                echo '<p>' . $row["description"] . '</p>';
                echo '</div>';
                echo '<div class="post-actions">';
                echo '<a href="edit_post.php?id=' . $row["id"] . '">Edit</a>';
                echo '<a href="delete_post.php?id=' . $row["id"] . '">Delete</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No posts found.</p>';
        }
        $conn->close();
        ?>
    </main>
</body>
</html>
