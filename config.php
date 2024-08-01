<?php
$servername = "localhost";
$username = "root"; // sau utilizatorul tău MySQL
$password = "parola"; // parola pentru utilizatorul MySQL
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
