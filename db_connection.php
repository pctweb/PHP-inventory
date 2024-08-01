<?php
$servername = "localhost";
$username = "root"; // Schimbă dacă este cazul
$password = "parola";     // Schimbă dacă este cazul
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conectare eșuată: " . $conn->connect_error);
}
