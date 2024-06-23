<!-- New Products-->
<?php

    if (!isset($_SESSION['logged'])) {
        header('Location: ../login.php');
        exit();
    }

    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['new_products_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }

        if(isset($_POST['add_product_submit'])){
            // call method addProduct
            $product->addProduct($_POST['item_genre'], $_POST['item_brand'], $_POST['item_name'], $_POST['item_price'], $_POST['item_image']);
        }

        if(isset($_POST['delete_product_submit'])){
            $deletedproduct =$product->deleteProduct($_POST['item_id']);
        }
    }
?>
<section id="new-products">
    <div class="container">
        <h4 class="font-rubik font-size-20">Nowe Produkty</h4>
        <button class="btn btn-success text-white font-size-16 pb-2" onclick="openForm()">DODAJ PRODUKT</button>
        <div class="form-popup font-rubik" id="myForm">
            <form method="post" class="form-container m-2">
                <h4>Dodaj Produkt</h4>

                <p>Nazwa Produktu: <input type="text" name="item_name"></p>

                <p>Gatunek Produktu: <input type="text" name="item_genre"></p>

                <p>Artysta: <input type="text" name="item_brand"></p>

                <p>Cena Produktu: <input type="text" name="item_price"></p>

                <p>Ścieżka do Obrazka: <input type="text" name="item_image"></p>

                <button type="submit" name="add_product_submit" class="btn btn-success font-size-12">Dodaj</button>
                <button type="button" class="btn btn-danger font-size-12" onclick="closeForm()">Zamknij</button>
            </form>
        </div>

        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) {?>
                <div class="item p-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'Admin_product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "/assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center pt-4">
                            <h6><?php echo $item['item_name'] ?? "Unknown";?></h6>
                            <p class="font-size-14"><?php echo $item['item_brand'] ?? "Brand"; ?></p>
                            <div class="price py-1">
                                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo '1'; ?>">
                                <button type="submit" name="delete_product_submit" class="delete btn btn-danger font-size-12">USUŃ PRODUKT</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach ?>
        </div>


    </div>
</section>
<!-- !New Products-->
