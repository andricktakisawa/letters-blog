<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tsukimi+Rounded:wght@400;600&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="post">
        <h2><?php echo $row["title"]; ?></h2>
        <p><?php echo $row["content"]; ?></p>
        <br>
        <p>Con amor, <br> Andrick Takisawa</p>
        <img class="sign" src="firma.png" alt="Firma de Andrick Takisawa">
    </div>
</body>

</html>