<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

try {
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = $conn->query($sql);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartas para Valeria | Cloud</title>
    <meta name="theme-color" content="#5050f5">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="images/icon-192x192.png">
    <script src="script.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "826a5cdb-03e1-43b7-8816-a56f99b37f69",
            });
        });
    </script>
</head>

<body>
    <div style="margin-bottom: 50px; display: flex; align-items: center; justify-content: center;">
        <a class="button" href="message.php">Ver Mensaje Diario</a>
    </div>

    <div class="blog">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $post_content = substr($row["content"], 0, 255);
                $post_title = str_replace(' ', '-', strtolower($row["title"]));
                echo "<div class='post'>
                            <h2 class='title'>" . $row["title"] . "</h2>
                            <p class='desc'>" . $post_content . "...</p>
                            <a class='button' href='post.php?id=" . $row["id"] . "&title=" . $post_title . "'>Ver más </a>
                          </div>";
            }
        } else {
            echo "<p>No hay cartas de amor todavía...</p>";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>