<!-- Shopping cart section  -->
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }
    }
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Koszyk</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData('cart') as $item):
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "/assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small><?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product qty -->
                        <div class="qty d-flex pt-4">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0';?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0';?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0';?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Usuń</button>
                            </form>
                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                           Cena: $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Z nami możesz być pewny bezpiecznych zakupów</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Suma:&nbsp; <span class="text-danger">$<span class="sum_price text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <h6 class="font-baloo font-size-16">Z dostawą: $<span class="sum_price_with_delivery" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></h6>
                        <a href="./checkout.php" class="btn btn-warning mt-3">Przejdź do zakupu</a>
                    </div>
                    <div id="order-choice" class="font-rale d-flex flex-column text-dark">
                        <small><input type="radio" class="delivery" name="delivery" value="3">Paczkomat</small>
                        <small><input type="radio" class="delivery" name="delivery" value="5">DHL</small>
                        <small><input type="radio" class="delivery" name="delivery" value="4">DPD</small>
                        <small><input type="radio" class="delivery" name="delivery" value="6">Fedex</small>
                    </div>
                </div>

            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->