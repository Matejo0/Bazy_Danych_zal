<?php

    session_start();

    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: Admin_Index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Sklep Kawosza - Logowanie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sklep Kawosza</a>
    </div>
</nav>
<div id="container" class="d-flex justify-content-center p-4">
    <div class="font-rubik font-size-20 text-center p-4 w-25 h-20 border border-secondary rounded bg-light">
        <form method="post" class="m-2" action="login-process.php">
            <p>Email: <input type="text" name="email"></p>
            <p>Hasło: <input type="password" name="password"></p>
            <p><button class="btn btn-success" type="submit" name="login">Zaloguj</button></p>
        </form>
        <?php
        if(isset($_SESSION['blad']))
            echo $_SESSION['blad'];
        ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

</body>
</html>