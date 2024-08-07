<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $uploadOk = 1;

    if ($image) {
        $target_dir = "Gambar/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Update the database with new image URL
                $sql = "UPDATE images SET title='$title', description='$description', image_url='$target_file' WHERE id='$id'";
            } else {
                header('Location: edit_post.php?id=' . $id . '&error=1');
                exit();
            }
        } else {
            header('Location: edit_post.php?id=' . $id . '&error=1');
            exit();
        }
    } else {
        // Update the database without changing the image URL
        $sql = "UPDATE images SET title='$title', description='$description' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: manage_posts.php?success=1');
    } else {
        header('Location: edit_post.php?id=' . $id . '&error=1');
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM images WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .edit-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .edit-form h2 {
            margin-top: 0;
            text-align: center;
        }

        .edit-form input[type="text"],
        .edit-form textarea,
        .edit-form input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-form button {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .edit-form button:hover {
            background-color: #555;
        }

        .error {
            color: red;
            text-align: center;
        }

        .success {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="edit-form">
        <h2>Edit Post</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Failed to update post. Please try again.</p>';
        }
        ?>
        <form action="edit_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
            <textarea name="description" required><?php echo $row['description']; ?></textarea>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
