<?php
session_start();
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pagina principală</title>
</head>

<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <a href="login.php">Login</a> |
        <a href="register.php">Register</a> |
        <a href="reset_password.php">Reset Password</a> |
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>

    <?php if (isset($_SESSION['username'])) : ?>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <div class="border border-success p-2 mb-2">
            <form action="create_category.php" method="post">
                <h3>Create Category</h3>
                <label for="category">Category Name:</label>
                <input type="text" id="category" name="category" required>
                <label for="category_image">Category Image:</label>
                <input type="file" id="category_image" name="category_image" accept="image/*" required><br><br>

                <input type="submit" value="Create">
            </form>
            <p>
            <form action="create_subcategory.php" method="post">
                <h3>Create Subcategory</h3>
                <label for="subcategory">Subcategory Name:</label>
                <input type="text" id="subcategory" name="subcategory" required>
                <label for="category_id">Category ID:</label>
                <input type="number" id="category_id" name="category_id" required>
                <input type="submit" value="Create">
            </form>
            </p>
        </div>
    <?php endif; ?>
</body>
<?php include 'footer.php'; ?>

</html>
