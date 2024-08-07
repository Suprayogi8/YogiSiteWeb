<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Gambar/Y.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YogiSiteWeb</title>
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
            padding: 1rem 2rem; /* Padding lebih besar untuk ruang yang lebih luas */
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            padding: 0.5rem 1rem; /* Padding untuk menu item */
            border-radius: 4px; /* Border radius untuk menu item */
        }

        nav ul li a:hover {
            text-decoration: none;
            background-color: #fff; /* Warna background saat hover */
            color: #689f38; /* Warna font saat hover */
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-left: 2rem; /* Jarak antara menu dan search */
        }

        .search-container input[type="text"] {
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search-container button {
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-left: none;
            background-color: #333;
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button:hover {
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

        h3 {
            opacity: 0;
            transition: opacity 2s;
            margin-bottom: 0.5rem; /* Jarak antara judul dengan deskripsi */
        }

        p {
            margin-top: 0;
            font-style: italic;
            color: #666;
        }

        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: none;
        }

        .slides img {
            width: 80%; /* Sesuaikan lebar gambar dengan container */
            height: auto; /* Sesuaikan tinggi gambar dengan container */
            object-fit: cover; /* Gambar akan menutupi seluruh container */
            border-radius: 8px; /* Tambahkan border radius untuk gambar */
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-items: center; /* Mengatur item grid untuk rata tengah secara horizontal */
            align-content: center; /* Mengatur konten grid untuk rata tengah secara vertikal */
            max-width: 1200px; /* Maksimum lebar grid */
            width: 100%; /* Membuat grid lebar 100% untuk rata tengah */
            margin: 0 auto; /* Untuk memastikan grid selalu di tengah */
        }

        .grid-item {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center; /* Rata tengah konten dalam grid-item */
            cursor: pointer; /* Menjadikan kursor berubah saat dihover untuk menunjukkan ada interaktivitas */
            transition: transform 0.3s, box-shadow 0.3s; /* Transisi untuk hover */
        }

        .grid-item:hover {
            transform: translateY(-5px); /* Efek hover mengangkat item */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar saat hover */
        }

        .grid-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
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
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
        </div>
    </header>
    <main>
        <section id="home">        
                      <div class="slideshow-container">
                <div class="slides">
                    <img src="Gambar/Images 1.png" alt="Images 1">
                </div>
                <div class="slides">
                    <img src="Gambar/Images 2.png" alt="Images 2">
                </div>
                <div class="slides">
                    <img src="Gambar/Images 3.png" alt="Images 3">
                </div>

                <!-- Tambahkan tombol navigasi -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <h3>YOGIWEBSITE</h3>
            <p>INFORMATIKA DIGITAL</p>

            <div class="grid-container">
                <?php
                include 'db.php';

                $sql = "SELECT * FROM images";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<a href="website.php?id=' . $row["id"] . '" class="grid-item">'; // Tambahkan link ke halaman detail.php dengan parameter id
                        echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
                        echo '<h2>' . $row["title"] . '</h2>';
                        echo '<p>' . $row["description"] . '</p>';
                        echo '</a>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </section>
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
            <p>&copy; 2024 Website YOGISITEWEB. All rights reserved.
            POWERED BY YOGISITEWEB
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const title = document.querySelector("h3");
            title.style.opacity = 1;
        });

        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("slides");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }

        setInterval(function() {
            plusSlides(1);
        }, 3000); // Ganti gambar setiap 3 detik
    </script>
</body>
</html>
