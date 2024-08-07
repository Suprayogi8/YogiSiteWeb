<?php
session_start();
include 'db.php'; // Pastikan ini sudah menghubungkan ke database dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $captcha = intval($_POST['captcha']);

    // Check CAPTCHA
    if (!isset($_SESSION['captcha_answer']) || $captcha !== $_SESSION['captcha_answer']) {
        header('Location: login.php?error=Incorrect CAPTCHA');
        exit();
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    if (!$stmt) {
        // Handle query preparation error (for debugging purposes)
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit();
        } else {
            header('Location: login.php?error=Invalid username or password');
            exit();
        }
    } else {
        header('Location: login.php?error=Invalid username or password');
        exit();
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if not a POST request (for security reasons)
    header('Location: login.php');
    exit();
}
?>
