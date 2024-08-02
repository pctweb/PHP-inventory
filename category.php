<!-- index.php -->
<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/styles.css">
<?php
// Detaliile de conectare la baza de date
$servername = "localhost";
$username = "root";
$password = "parola";
$dbname = "mydatabase";

// Creează o conexiune
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică dacă există erori la conectare
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Interogarea pentru a selecta toate categoriile
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Afișează rezultatele cu linkuri
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<a href='pagina_categorie.php?id=" . $row["id"] . "'>";
        echo "<div class='category'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        if (!empty($row['image_path'])) {
            echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        }
        echo "</div>";
        echo "</a>";
    }
} else {
    echo "Nu există categorii.";
}

// Închide conexiunea
$conn->close();
?>
<?php include 'footer.php'; ?>
