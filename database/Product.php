<?php

// use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}, countries, categories, suppliers ");

        $resultArray = array();

        // fetch product data on by one
        while ($item = $result->fetch(PDO::FETCH_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($item_id = null, $table = 'product'){
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * 
                                            FROM {$table} 
                                            WHERE item_id = {$item_id}");

            $resultArray = array();

            // fetch product data on by one
            while ($item = $result->fetch(PDO::FETCH_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    // add product
    public function addProduct($item_genre, $item_brand, $item_name, $item_price, $item_image, $table = "product"){
        if ($this->db->con != null) {
            if(!empty($item_name) && !empty($item_genre) && !empty($item_brand) && !empty($item_price) &&
                !empty($item_image)){
                if(is_numeric($item_price)) {

                    if(is_file($item_image)) {

                        $columns = 'item_genre, item_brand, item_name, item_price, item_image';

                        $result = $this->db->con->query("INSERT INTO {$table}({$columns}) VALUES ('{$item_genre}', '{$item_brand}', '{$item_name}', '{$item_price}', '{$item_image}')");

                        if ($result) {
                            header("Location:" . $_SERVER['PHP_SELF']);
                        }

                        return $result;
                    } else {
                        echo "<div class='px-5 pb-2 text-danger font-size-16 font-rubik'><p>Proszę podać poprawną ścieżkę do pliku</p></div>";
                    }
                } else {
                    echo "<div class='px-5 pb-2 text-danger font-size-16 font-rubik'><p>Cena musi być wartością numeryczną</p></div>";
                }
            } else {
                echo "<div class='px-5 pb-2 text-danger font-size-16 font-rubik'><p>Proszę uzupełnić wszystkie dane</p></div>";
            }
        }
    }

    public function deleteProduct($item_id, $table = "product"){
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }

    }

    public function editProduct($item_id, $column, $value, $table = "product"){
        if($item_id != null) {
            if(!empty($column) && !empty($value)) {
                if($column == 'item_genre' || $column == 'item_brand' || $column == 'item_name' || $column == 'item_image') {
                    $result = $this->db->con->query("UPDATE {$table} SET {$column} = '{$value}' WHERE item_id={$item_id}");

                    if($result){
                        header("Location: Admin_product.php?item_id=$item_id");
                    }

                    return $result;
                } else if($column == 'item_price'){
                    if(is_numeric($value)){
                        $result = $this->db->con->query("UPDATE {$table} SET {$column} = '{$value}' WHERE item_id={$item_id}");

                        if($result){
                            header("Location: Admin_product.php?item_id=$item_id");
                        }

                        return $result;
                    } else {
                        echo "<div class='p-4 text-danger font-size-20 font-rubik'><p>Cena musi być wartością numeryczną</p></div>";
                    }
                } /*else if($column == 'item_image'){
                    if(is_file($value)){
                        $result = $this->db->con->query("UPDATE {$table} SET {$column} = '{$value}' WHERE item_id={$item_id}");

                        if($result){
                            header("Location: Admin_product.php?item_id=$item_id");
                        }

                        return $result;
                    } else {
                        echo "<div class='text-danger font-size-16 font-rubik'><p>Proszę podać poprawną ścieżkę do pliku</p></div>";
                    }*/
            } else {
                echo "<div class='p-4 text-danger font-size-20 font-rubik'><p>Proszę uzupełnić wszystkie dane</p></div>";
            }
        }
    }
}