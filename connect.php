<?php
$servername = "mysql-container";
$username = "root";
$password = "daffa12345";
$dbname = "data"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi Database Gagal, error : " . $conn->connect_error);
}
