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
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
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