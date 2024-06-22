<!-- New Products-->
<?php
    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['new_products_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<section id="new-products">
    <div class="container">
        <h4 class="font-rubik font-size-20">Nowe Produkty</h4>
        <hr>

        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) {?>
                <div class="item p-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "/assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center pt-4">
                            <h6><?php echo $item['item_name'] ?? "Unknown";?></h6>
                            <p class="font-size-14"><?php echo $item['supplier'] ?? "Brand"; ?></p>
                            <div class="price py-1">
                                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo '1'; ?>">
                                <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">W Koszyku</button>';
                                    }else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn color-skin-bg color-second font-size-12">Dodaj do Koszyka</button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach ?>
        </div>


    </div>
</section>
<!-- !New Products-->
