<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"] == $admin_password) {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
    } else {
        echo "<p>Contraseña incorrecta.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form method="post" action="login.php">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>