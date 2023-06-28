<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: login.php");
}

include 'db_connect.php';

$title = $conn->real_escape_string($_POST["title"]);
$content = $conn->real_escape_string($_POST["content"]);

$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
} else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
}

$conn->close();
