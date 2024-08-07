<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Content</title>
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

        .upload-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .upload-form h2 {
            margin-top: 0;
            text-align: center;
        }

        .upload-form input[type="text"],
        .upload-form textarea,
        .upload-form input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .upload-form button {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .upload-form button:hover {
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
    <div class="upload-form">
        <h2>Upload Content</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Failed to upload content. Please try again.</p>';
        } elseif (isset($_GET['success'])) {
            echo '<p class="success">Content uploaded successfully!</p>';
        }
        ?>
        <form action="upload_process.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
