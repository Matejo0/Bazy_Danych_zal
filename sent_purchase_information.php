<?php
session_start();

if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone'])
    && !empty($_POST['street']) && !empty($_POST['housenumber']) && !empty($_POST['zipcode']) && !empty($_POST['city'])
    && !empty($_POST['delivery'])) {

    if(preg_match('/^[a-z0-9\_\.\-]+@[a-z0-9\_\.\-]+(\.[a-z0-9\_\.\-]+)+/i', $_POST['email'])){

        if(preg_match('/^[0-9]{9}+$/', $_POST['phone'])){

            if(is_numeric($_POST['housenumber'])) {

                if (preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $_POST['zipcode'])) {

                    $_SESSION['imie'] = $_POST['firstname'];
                    $_SESSION['nazwisko'] = $_POST['lastname'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['telefon'] = $_POST['phone'];
                    $_SESSION['ulica'] = $_POST['street'];
                    $_SESSION['nrdomu'] = $_POST['housenumber'];
                    $_SESSION['kodpocztowy'] = $_POST['zipcode'];
                    $_SESSION['miejscowosc'] = $_POST['city'];
                    $_SESSION['dostawa'] = $_POST['delivery'];
                    header('Location: checkout.php');

                } else {
                    echo "<div style='color: red; padding: 4px; font-family: Arial'><p>Proszę wprowadzić poprawny kod pocztowy</p></div>";
                }

            } else {
                echo "<div style='color: red; padding: 4px; font-family: Arial'><p>Proszę wprowadzić poprawny numer domu</p></div>";
            }

        } else {
            echo "<div style='color: red; padding: 4px; font-family: Arial'><p>Proszę wprowadzić poprawny numer telefonu</p></div>";
        }

    } else {
        echo "<div style='color: red; padding: 4px; font-family: Arial'><p>Proszę wprowadzić poprawny adres email</p></div>";
    }

} else {
    echo "<div style='color: red; padding: 4px; font-family: Arial'><p>Proszę uzupełnić wszystkie dane</p></div>";
}


