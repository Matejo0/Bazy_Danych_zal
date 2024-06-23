<!--Special Price-->
<?php

    if (!isset($_SESSION['logged'])) {
        header('Location: ../login.php');
        exit();
    }

    $genre = array_map(function($pro){return $pro['item_genre'];}, $product_shuffle);
    $unique = array_unique($genre);
    sort($unique);
    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['special_price_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }

        if(isset($_POST['delete_product_submit'])){
            $deletedproduct =$product->deleteProduct($_POST['item_id']);
        }
    }

    $in_cart = $Cart->getCartId($product->getData('cart'));
?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Oferty Specjalne</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">Wszystkie Marki</button>
            <?php
                array_map(function ($genre){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $genre, $genre);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use($in_cart){?>
            <div class="grid-item border <?php echo $item['item_genre'] ?? "genre"; ?>">
                <div class="item p-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'Admin_product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "/assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center pt-4">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <p class="font-size-14"><?php echo $item['item_brand'] ?? "Brand"; ?></p>
                            <div class="price py-1">
                                <span>$<?php echo $item['item_price'] ?? '0' ?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo '1'; ?>">
                                <button type="submit" name="delete_product_submit" class="delete btn btn-danger font-size-12">USUŃ PRODUKT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!--!Special Price-->
