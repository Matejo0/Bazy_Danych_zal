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
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = $result->fetch(PDO::FETCH_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($item_id = null, $table = 'product'){
        if(isset($item_id)){
            $stmt = $this->db->con->prepare("SELECT * FROM {$table} WHERE item_id = :item_id");
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();

            $resultArray = array();

            // fetch product data one by one
            while ($item = $stmt->fetch(PDO::FETCH_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
        return null;
    }

    // add product
    public function addProduct($item_genre, $item_brand, $item_name, $item_price, $item_image, $table = "product"){
        if ($this->db->con != null) {
            if(!empty($item_name) && !empty($item_genre) && !empty($item_brand) && !empty($item_price) &&
                !empty($item_image)){
                if(is_numeric($item_price)) {

                    if(is_file($item_image)) {

                        $columns = 'item_genre, item_brand, item_name, item_price, item_image';

                        $stmt = $this->db->con->prepare("INSERT INTO {$table} ({$columns}) VALUES (:item_genre, :item_brand, :item_name, :item_price, :item_image)");
                        $stmt->bindParam(':item_genre', $item_genre);
                        $stmt->bindParam(':item_brand', $item_brand);
                        $stmt->bindParam(':item_name', $item_name);
                        $stmt->bindParam(':item_price', $item_price);
                        $stmt->bindParam(':item_image', $item_image);

                        $result = $stmt->execute();

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
            $stmt = $this->db->con->prepare("DELETE FROM {$table} WHERE item_id = :item_id");
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $result = $stmt->execute();
            
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
        return false;
    }

    public function editProduct($item_id, $column, $value, $table = "product"){
        if($item_id != null) {
            if(!empty($column) && !empty($value)) {
                if($column == 'item_genre' || $column == 'item_brand' || $column == 'item_name' || $column == 'item_image') {
                    $stmt = $this->db->con->prepare("UPDATE {$table} SET {$column} = :value WHERE item_id = :item_id");
                    $stmt->bindParam(':value', $value);
                    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
                    $result = $stmt->execute();

                    if($result){
                        header("Location: Admin_product.php?item_id=$item_id");
                    }

                    return $result;
                } else if($column == 'item_price'){
                    if(is_numeric($value)){
                        $stmt = $this->db->con->prepare("UPDATE {$table} SET {$column} = :value WHERE item_id = :item_id");
                        $stmt->bindParam(':value', $value);
                        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
                        $result = $stmt->execute();

                        if($result){
                            header("Location: Admin_product.php?item_id=$item_id");
                        }

                        return $result;
                    } else {
                        echo "<div class='p-4 text-danger font-size-20 font-rubik'><p>Cena musi być wartością numeryczną</p></div>";
                    }
                }
            } else {
                echo "<div class='p-4 text-danger font-size-20 font-rubik'><p>Proszę uzupełnić wszystkie dane</p></div>";
            }
        }
        return false;
    }
}
