<?php include 'header.php'; ?>
<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO categories (name, user_id) VALUES (?, ?)");
    $stmt->bind_param('si', $category_name, $user_id);
    if ($stmt->execute()) {
        echo "Category created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
