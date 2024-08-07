<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["comment"])) {
    $currentTime = time();

    if (isset($_SESSION["last_comment_time"]) && ($currentTime - $_SESSION["last_comment_time"]) < 3600) {
        echo "You can only submit a comment every 1 hour.";
    } else {
        // Sanitasi input pengguna untuk mencegah XSS
        $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
        $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');

        // Gunakan prepared statements untuk mencegah SQL Injection
        $stmt = $conn->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $comment);

        if ($stmt->execute() === TRUE) {
            $_SESSION["last_comment_time"] = $currentTime;
            header('Location: services.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$sql = "SELECT * FROM comments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Gambar/Y.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dcedc8; /* Warna background hijau muda */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Mengatur tinggi minimum halaman sesuai viewport */
        }

        header {
            background-color: #689f38; /* Warna background hijau */
            color: black; /* Warna font hitam */
            padding: 1rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            margin-left: 20px;
        }

        .logo img {
            max-width: 100px;
            height: auto;
        }

        nav {
            flex-grow: 1;
            margin-left: 2rem;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: black; /* Warna font hitam */
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s; /* Efek transisi saat hover */
        }

        nav ul li a:hover {
            text-decoration: underline;
            color: #333; /* Warna font saat hover */
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .search-container input[type="text"] {
            padding: 0.5rem;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search-container button[type="submit"] {
            padding: 0.5rem 1rem;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button[type="submit"]:hover {
            background-color: #555;
        }

        main {
            flex: 1; /* Mengisi ruang tersisa di antara header dan footer */
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

        .comment-form input, .comment-form textarea {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form button {
            padding: 0.5rem 1rem;
            background-color: #689f38; /* Warna background hijau */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #8ab742; /* Warna background hijau yang lebih terang */
        }

        .comments {
            max-width: 600px;
            margin: 2rem auto;
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .comment {
            border-bottom: 1px solid #ddd;
            padding: 0.5rem 0;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment .name {
            font-weight: bold;
        }

        .comment .date {
            font-size: 0.9rem;
            color: #666;
        }

        .comment .actions {
            text-align: right;
        }

        .comment .actions a {
            color: #333;
            text-decoration: none;
            margin-left: 10px;
        }

        .comment .actions a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #689f38; /* Warna background hijau */
            color: black; /* Warna font hitam */
            text-align: center;
            padding: 2rem 0; /* Tambahkan padding untuk ruang tambahan */
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        footer .footer-content {
            max-width: 1200px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        footer nav ul {
            display: flex;
            justify-content: center;
            padding: 0;
            list-style: none;
            margin-bottom: 1rem; /* Jarak bawah antara menu dan pencarian */
        }

        footer nav ul li {
            margin: 0 15px; /* Jarak antar item menu */
        }

        footer nav ul li a {
            color: black;
            text-decoration: none;
            font-size: 1rem;
        }

        footer nav ul li a:hover {
            text-decoration: underline;
        }

        footer form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer input[type="text"] {
            padding: 0.5rem;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        footer button[type="submit"] {
            padding: 0.5rem 1rem;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        footer button[type="submit"]:hover {
            background-color: #555;
        }

        footer p {
            margin-top: 1rem; /* Jarak atas antara pencarian dan teks copyright */
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Gambar/Y.png" alt="Logo Website">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        <div class="search-container">
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <div class="comment-form">
            <h2>Leave a Comment</h2>
            <form method="POST" action="services.php">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="comment" placeholder="Your Comment" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="comments">
            <h2>Comments</h2>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="comment">
                        <p class="name"><?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="date"><?php echo htmlspecialchars($row["created_at"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="text"><?php echo htmlspecialchars($row["comment"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <!-- 
                        <div class="actions">
                            <a href="edit_comment.php?id=<?php echo $row["id"]; ?>">Edit</a>
                        </div>
                        -->
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
            <p>&copy; 2024 Website Sederhana. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
