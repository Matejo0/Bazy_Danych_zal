<!--Top Sale-->
<?php

    if (!isset($_SESSION['logged'])) {
        header('Location: ../login.php');
        exit();
    }


    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }

        if(isset($_POST['delete_product_submit'])){
            $deletedproduct =$product->deleteProduct($_POST['item_id']);
        }
    }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Najczęściej Kupowane</h4>
        <!--owl carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) {?>
            <div class="item p-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'Admin_product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center pt-4">
                        <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
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
        <!--!owl carousel-->
    </div>
</section>
<!--!Top Sale-->