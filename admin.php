<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tsukimi+Rounded:wght@400;600&display=swap');

        body {
            background: #e0e5ec;
            font-family: 'Tsukimi Rounded', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: flex-end;
            background: #e0e5ec;
            box-shadow: 0px 10px 10px #bfc6d1,
                0px -5px 10px #ffffff;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 20px;
            background: #e0e5ec;
            box-shadow: 5px 5px 10px #bfc6d1,
                -5px -5px 10px #ffffff;
            margin-right: 50px;
        }

        .neumorphic {
            border-radius: 20px;
            background: #e0e5ec;
            display: inline-block;
            padding: 2rem;
            position: relative;
            width: 300px;
            box-shadow: 10px 10px 20px #bfc6d1,
                -10px -10px 20px #ffffff;
        }

        .neumorphic input[type="text"],
        .neumorphic textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border-radius: 15px;
            border: none;
            outline: none;
            box-shadow: 5px 5px 10px #bfc6d1,
                -5px -5px 10px #ffffff;
            background: #e0e5ec;
        }

        .neumorphic input[type="submit"] {
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 50px;
            background-image: linear-gradient(rgb(214, 202, 254), rgb(158, 129, 254));
            color: white;
            cursor: pointer;
            box-shadow: 1px 3px 0px rgb(139, 113, 255);
            transition-duration: .3s;
            font-weight: 600;
        }

        .neumorphic input[type="submit"]:active {
            transform: translate(2px, 0px);
            box-shadow: 0px 1px 0px rgb(139, 113, 255);
            padding-bottom: 1px;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <form class="neumorphic" method="post" action="create-post.php">
        <input type="text" name="title" placeholder="Título" required>
        <textarea name="content" rows="5" placeholder="Contenido" required></textarea>
        <input type="submit" value="Publicar">

        <p class="message"></p>
    </form>
</body>

</html>