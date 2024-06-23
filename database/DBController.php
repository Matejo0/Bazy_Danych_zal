<?php

class DBController
{
    //Database Connection Properties
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database= 'sklep';

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        } catch (Exception $error){
            die("Connection failed: " . $error->getMessage());
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    //for PDO closing connection
    private function closeConnection(){
        if($this->con != null){
            $this->con = null;
        }
    }

}