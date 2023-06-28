<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo "<title>" . $row["title"] . ' | ' . 'Carta No. ' . $row["id"] . "</title>";
    ?>
    <meta name="theme-color" content="#5050f5">
    <link rel="apple-touch-icon" href="images/icon-192x192.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="card">
        <h2><?php echo $row["title"]; ?></h2>
        <p><?php echo $row["content"]; ?></p>
        <br>
        <p>Con amor, <br> Andrick Takisawa</p>
        <img class="sign" src="firma.png" alt="Firma de Andrick Takisawa">
        <div style="margin-top: 20px; display: flex; align-items: center; justify-content: center;">
            <a href="/" class="button" style="margin: 0 auto;">Regresar</a>
        </div>
    </div>
</body>

</html>