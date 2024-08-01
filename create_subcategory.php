<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subcategory_name = $_POST['subcategory'];
    $category_id = $_POST['category_id'];

    $stmt = $conn->prepare("INSERT INTO subcategories (name, category_id) VALUES (?, ?)");
    $stmt->bind_param('si', $subcategory_name, $category_id);
    if ($stmt->execute()) {
        echo "Subcategory created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
