<!--
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["comment"])) {
    $id = $_POST["id"];
    $comment = $_POST["comment"];

    $sql = "UPDATE comments SET comment='$comment' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: services.php');
        exit();
    } else {
        echo "Error updating comment: " . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM comments WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No comment found with ID: $id";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .comment-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment-form h2 {
            margin-top: 0;
        }

        .comment-form textarea {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form button {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form button:hover {
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
            </ul>
        </nav>
    </header>
    <main>
        <div class="comment-form">
            <h2>Edit Comment</h2>
            <form method="POST" action="edit_comment.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <textarea name="comment" required><?php echo $row['comment']; ?></textarea>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Website Sederhana. All rights reserved.</p>
    </footer>
</body>
</html>
-->