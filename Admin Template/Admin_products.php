<!-- product -->
<?php
    if (!isset($_SESSION['logged'])) {
        header('Location: ../login.php');
        exit();
    }

    $item_id = $_GET['item_id'] ?? 1;


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['edit_product_submit'])) {
            $editedrecord = $product->editProduct($item_id, $_POST['edited_column'], $_POST['value']);
        }
    }


    foreach ($product->getData() as $item):
        if($item['item_id'] == $item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "/assets/products/1.png"; ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo ms-6" style="display: flex; justify-content: space-between">
                    <div class="col-sm-6">
                        <button class="btn btn-primary font-size-20" onclick="openForm()">EDYTUJ PRODUKT</button>
                        <div class="form-popup font-rubik" id="myForm">
                            <form method="post" class="form-container m-2">
                                <h4>Edytuj Produkt</h4>
                                <p>Wybierz pole do edycji:
                                <select name="edited_column">
                                    <option value="item_genre">Gatunek</option>
                                    <option value="item_brand">Artysta</option>
                                    <option value="item_name">Nazwa</option>
                                    <option value="item_price">Cena</option>
                                    <option value="item_image">Ścieżka obrazka</option>
                                </select></p>
                                <p>Nowa wartość: <input type="text" name="value"></p>

                                <button type="submit" name="edit_product_submit" class="btn btn-primary font-size-12">Zatwierdź zmianę</button>
                                <button type="button" class="btn btn-danger font-size-12" onclick="closeForm()">Zamknij</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small><?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <p class="font-size-12">Gatunek: <i class="text-info"><?php echo $item['item_genre'] ?? "Genre"; ?></i></p>
                <hr class="m-0">
                <!-- product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Cena:</td>
                        <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Uwzględniając wszystkie podatki</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Cena z dostawą:</td>
                        <td><span class="font-size-16 text-danger">$10.00</span></td>
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

                </div>
                <!-- !order-details -->


                <!-- product qty section -->
                <!--<div class="qty d-flex pt-4">
                    <h6 class="font-baloo">Ilość</h6>
                    <div class="px-4 d-flex font-rale">
                        <button class="qty-up border bg-light" data-id="<?php /*echo $item['item_id'] ?? '0';*/?>"><i class="fas fa-angle-up"></i></button>
                        <input type="text" data-id="<?php /*echo $item['item_id'] ?? '0';*/?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button data-id="<?php /*echo $item['item_id'] ?? '0';*/?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                    </div>
                </div>-->
                <!-- !product qty section -->


            </div>

            <div class="col-12 pt-4">
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



