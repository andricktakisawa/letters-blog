<?php
include 'db_connect.php';

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);
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
                            <h2>" . $row["title"] . "</h2>
                            <p>" . $post_content . "...</p>
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