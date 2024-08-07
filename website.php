<?php
// Ambil nilai ID dari parameter URL
$id = $_GET['id'];

// Daftar pengalihan berdasarkan ID
$redirects = [
    1 => 'https://www.microsoft.com/id-id/security/business/security-101/what-is-data-security',
    2 => 'https://integrasolusi.com/blog/tips-ini-langkah-langkah-agar-keamanan-data-perusahaan-tetap-aman-terjamin/',
    3 => 'https://www.merdeka.com/uang/tips-sukses-bagi-yang-ingin-berkarir-menjadi-ahli-it.html',
    4 => 'https://informatika.almaata.ac.id/2024/01/23/5-sifat-dunia-maya-yang-berpengaruh-di-kehidupan/',
    5 => 'https://www.menpan.go.id/site/berita-terkini/pentingnya-digital-leadership-dalam-transformasi-teknologi'
    // Tambahkan sesuai kebutuhan
];

// Cek apakah ID ada dalam daftar pengalihan
if (array_key_exists($id, $redirects)) {
    // Jika ada, redirect ke URL yang sesuai
    header("Location: " . $redirects[$id]);
    exit();
} else {
    // Jika ID tidak ada dalam daftar, tampilkan pesan atau handle secara sesuai
    echo "ID tidak valid atau tidak ditemukan.";
}
?>
