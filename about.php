<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Gambar/Y.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
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
            justify-content: flex-start; /* Menyelaraskan menu ke kiri */
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
            display: flex;
            flex-direction: column;
            align-items: center; /* Rata tengah konten utama */
            text-align: center;
        }

        .content {
            max-width: 800px;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .content h1 {
            font-size: 2.5rem;
            color: #333; /* Warna font judul */
        }

        .content p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555; /* Warna font teks */
        }

        .content .icon {
            font-size: 3rem;
            color: #689f38; /* Warna ikon */
            margin-top: 1rem;
            margin-bottom: 1rem;
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
        <div class="content">
            <h1>Tentang Kami</h1>
            <div class="icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <p>Selamat datang di halaman tentang kami. Kami adalah tim yang berdedikasi dalam bidang informatika digital.</p>
            <p>Website ini bertujuan untuk memberikan informasi edukasi bagi yang ingin mengetahui keamanan data dasar yang penting. Kami percaya bahwa dengan pemahaman yang baik tentang keamanan data, kita dapat menciptakan lingkungan digital yang lebih aman.</p>
            <p>Web ini dirilis pada tahun 2024 dengan visi untuk menumbuhkan kesadaran tentang pentingnya keamanan data. Kami berkomitmen untuk menyediakan konten yang berkualitas dan relevan untuk membantu Anda melindungi data pribadi dan memahami langkah-langkah keamanan yang perlu diambil.</p>
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
