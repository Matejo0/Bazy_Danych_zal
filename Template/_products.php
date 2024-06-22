<!-- product -->
<?php
    $item_id = $_GET['item_id'] ?? 1;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['products_submit'])){
            // call method addToCart
            $Cart->addToCartFromProducts($_POST['user_id'], $_POST['item_id']);
        }
    }

    foreach ($product->getData() as $item):
        if($item['item_id'] == 1):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "/assets/products/1.png"; ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo ms-6" style="display: flex; justify-content: space-between">
                    <div class="col-sm-6">
                        <form method="POST">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo '1'; ?>">
                            <?php
                                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">W Koszyku</button>';
                                }else{
                                    echo '<button type="submit" name="products_submit" class="btn color-skin-bg color-second font-size-16 form-control">Dodaj do Koszyka</button>';
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>Producent: <?php echo $item['supplier'] ?? "Supplier"; ?></small>
                <p class="font-size-12">Kraj pochodznia: <i class="text-info"><?php echo $item['country'] ?? "Country"; ?></i></p>
                <p class="font-size-12">Kategoria: <i class='text-info'><?php echo $item['category'] ?? "category"; ?></i></p>
                <hr class="m-0">

                <!-- product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Cena:</td>
                        <td class="font-size-20 text-danger">$<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Uwzględniając wszystkie podatki</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Cena z dostawą:</td>
                        <td>$<span class="product_price_with_delivery" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo $item['item_price'] ?? 0; ?></span></td>
                    </tr>
                </table>
                <!-- product price -->

                <!-- #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">14 Dni <br> na Zwrot</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Bezpieczna <br>Dostawa</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Roczna <br>Gwarancja</a>
                        </div>
                    </div>
                </div>
                <!-- #policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <h5 class="font-baloo font-size-20">Opcje Dostawy</h5>
                    <small><input type="radio" class="delivery" name="delivery" value="3"> Paczkomat</small>
                    <small><input type="radio" class="delivery" name="delivery" value="5"> DHL</small>
                    <small><input type="radio" class="delivery" name="delivery" value="4"> DPD</small>
                    <small><input type="radio" class="delivery" name="delivery" value="6"> Fedex</small>
                </div>
                <!-- !order-details -->

                 <!--product qty section -->
                <!--<div class="qty d-flex pt-4">
                    <h6 class="font-baloo">Ilość:</h6>
                    <div class="px-4 d-flex font-rale">
                        <button class="qty-up border bg-light" data-id="<?php /*echo $item['item_id'] ?? '0';*/?>"><i class="fas fa-angle-up"></i></button>
                        <input type="text" data-id="<?php /*echo $item['item_id'] ?? '0';*/?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button data-id="<?php /*echo $item['item_id'] ?? '0';*/?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                    </div>
                </div>-->
                <!-- !product qty section -->

            </div>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
            </div>
        </div>
    </div>
</section>
<!-- !product -->
<?php
    endif;
    endforeach;
?>



