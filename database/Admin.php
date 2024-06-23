<?php

class Admin
{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    /*public function checkData($email, $password){
        if ($result = $this->db->con->query(sprintf("SELECT * FROM users WHERE email='%s'", $email)))
        {
            $how_many_users = $result->rowCount();
            if($how_many_users>0)
            {
                $row = $result->fetch(PDO::FETCH_ASSOC);

                if ($password == $row['password'])
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];

                    unset($_SESSION['blad']);
                    $result->closeCursor();
                    header('Location: index.php');
                }
                else
                {
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
                    header('Location: cart.php');
                }

            } else {

                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
                header('Location: cart.php');

            }

        }
    }*/

}