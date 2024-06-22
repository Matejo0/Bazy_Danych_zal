<?php

    session_start();

    if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
    {
        header('Location: login.php');
        exit();
    }

    require_once "functions.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Miki123&&

    if ($result = $db->con->query(sprintf("SELECT * FROM user WHERE email='%s'", $email)))
    {
        $how_many_users = $result->rowCount();
        if($how_many_users>0)
        {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password']))
            {
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];

                unset($_SESSION['blad']);
                $result->closeCursor();
                header('Location: Admin_Index.php');
            }
            else
            {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
                header('Location: login.php');
            }

        } else {

            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
            header('Location: login.php');

        }

        $db->con=null;
    }
