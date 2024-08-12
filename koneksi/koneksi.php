<?php
$user = 'root'; // Sesuaikan dengan username database Anda
$pass = ''; // Sesuaikan dengan password database Anda
$dsn = "mysql:host=localhost;dbname=rentravel"; // Sesuaikan dengan nama database Anda

try {
    $koneksi = new PDO($dsn, $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

global $url;
$url = "http://localhost/rent/";

$sql_web = "SELECT * FROM infoweb WHERE id = 1";
$row_web = $koneksi->prepare($sql_web);
$row_web->execute();
global $info_web;
$info_web = $row_web->fetch(PDO::FETCH_OBJ);

error_reporting(0);
?>
