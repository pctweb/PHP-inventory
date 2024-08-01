<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principală</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div>
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                <?php
                // Conectează-te la baza de date
                $mysqli = new mysqli("localhost", "root", "parola", "mydatabase");

                // Verifică conexiunea
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Obține categoriile
                $result = $mysqli->query("SELECT * FROM categories");
                if ($result->num_rows > 0) {
                    echo '<ul>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="dropdown">';
                        echo '<a href="#">' . $row['name'] . '</a>';
                        echo '<div class="dropdown-content">';

                        // Obține subcategoriile
                        $cat_id = $row['id'];
                        $subresult = $mysqli->query("SELECT * FROM subcategories WHERE category_id = $cat_id");
                        while ($subrow = $subresult->fetch_assoc()) {
                            echo '<a href="#">' . $subrow['name'] . '</a>';
                        }

                        echo '</div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                $mysqli->close();
                ?>
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                <a class="nav-link active" aria-current="page" href="reset_password.php">Reset Password</a>
            </div>
        </nav>
    </header>
    <div class="container">