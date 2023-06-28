<?php
// Leer los mensajes del archivo JSON
$messages = json_decode(file_get_contents('messages.json'));

// Comprobar si hay una cookie con el último mensaje visto
if (isset($_COOKIE['lastMessage'])) {
    $lastMessage = $_COOKIE['lastMessage'];
} else {
    $lastMessage = null;
}

// Seleccionar un mensaje al azar que no sea igual al último
do {
    $message = $messages[array_rand($messages)];
} while ($message === $lastMessage);

// Establecer una cookie con el mensaje de hoy para el próximo día
setcookie('lastMessage', $message, time() + (86400 * 30), "/"); // 86400 = 1 día

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mensajito Diario</title>
    <link rel="stylesheet" href="style.css"> <!-- Reemplaza con el nombre de tu archivo CSS -->
</head>

<body>
    <div class="message">
        <h2>Mensajito Diario</h2>
        <p><?php echo htmlspecialchars($message); ?></p>
        <a href="index.php" class="button">Regresar</a>
    </div>
</body>

</html>