<?php
session_start();

// Generate CAPTCHA question
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$_SESSION['captcha_answer'] = $num1 + $num2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

        .login-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-form h2 {
            margin-top: 0;
            text-align: center;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="number"] {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .login-form button:hover {
            background-color: #555;
        }

        .login-form a {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #333;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
        }
        .logo img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <div class="logo">
            <img src="Gambar/Y.png" alt="Logo">
        </div>
        <h2>Admin Login</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <label for="captcha"><?php echo $num1 . " + " . $num2 . " = ?"; ?></label>
            <input type="number" name="captcha" id="captcha" placeholder="Answer" required>
            <button type="submit">Login</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
