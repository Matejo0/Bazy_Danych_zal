<?php
    session_start();

    unset($_SESSION['imie']);
    unset($_SESSION['nazwisko']);
    unset($_SESSION['email']);
    unset($_SESSION['telefon']);
    unset($_SESSION['ulica']);
    unset($_SESSION['nrdomu']);
    unset($_SESSION['kodpocztowy']);
    unset($_SESSION['miejscowosc']);
    unset($_SESSION['dostawa']);
    session_destroy();

    header('Location: cart.php');

?>