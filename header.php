<DOCTYPE html>
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
            <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "parola", "mydatabase");
                            if ($mysqli->connect_error) {
                                die("Connection failed: " . $mysqli->connect_error);
                            }
                            $result = $mysqli->query("SELECT * FROM categories");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li class="nav-item dropdown">';
                                    echo '<a class="nav-link dropdown-toggle" href="category.php?id=' . $row['id'] . '" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $row['name'] . '</a>';
                                    echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                    $cat_id = $row['id'];
                                    $subresult = $mysqli->query("SELECT * FROM subcategories WHERE category_id = $cat_id");
                                    while ($subrow = $subresult->fetch_assoc()) {
                                        echo '<li><a class="dropdown-item" href="#">' . $subrow['name'] . '</a></li>';
                                    }
                                    echo '</ul>';
                                    echo '</li>';
                                }
                            }
                            $mysqli->close();
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reset_password.php">Reset Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
