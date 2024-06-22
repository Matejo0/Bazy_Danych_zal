<?php

session_start();

require ("functions.php");

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Sklep Kawosza - Dostawa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sklep Kawosza</a>
    </div>
</nav>
<?php if(empty($_SESSION['imie'])) { ?>
<div class="container">
    <form method="post" action="sent_purchase_information.php" class="m-2">
        <h6 class="font-size-20 pb-2 color-primary">Wprowadź swoje dane:</h6>
        <div class="row font-rubik font-size-16">
            <div class="col">
                <label>Imię:</label>
                <p><input type="text" name="firstname"></p>
                <label>Nazwisko:</label>
                <p><input type="text" name="lastname"></p>
                <label>Email:</label>
                <p><input type="text" name="email"></p>
                <label>Numer telefonu:</label>
                <p><input type="text" name="phone"></p>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label>Ulica:</label>
                        <p><input type="text" name="street"></p>
                    </div>
                    <div class="col">
                        <label>Numer:</label>
                        <p><input type="text" name="housenumber" size="4"></p>
                    </div>
                </div>
                <label>Kod pocztowy:</label>
                <p><input type="text" name="zipcode" size="10"></p>
                <label>Miejscowość:</label>
                <p><input type="text" name="city"></p>
            </div>
            <div class="col">
                <h6 class="color-primary">Opcje Dostawy:</h6>
                <p><select name="delivery">
                        <option value="Paczkomat">Paczkomat</option>
                        <option value="DHL">DHL</option>
                        <option value="DPD">DPD</option>
                        <option value="FedEx">FedEx</option>
                    </select></p>
            </div>
        </div>
        <div style="display: flex; justify-content: flex-end">
            <button class="btn btn-success" type="submit" name="sent">Prześlij</button>
        </div>
    </form>
</div>
<?php } else { ?>
    <section id="cart" class="py-3 mb-5">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Wybrane Przedmioty:</h5>

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
                        <div class="py-4">
                            <h5 class="font-baloo font-size-20">Suma:&nbsp; <span class="text-danger">$<span class="sum_price text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                            <h6 class="font-baloo font-size-16">Z dostawą: $<span class="sum_price_with_delivery" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></h6>
                                <a href="confirm_purchase.php" class="btn btn-success mt-3">Potwierdź zakup</a>
                        </div>
                    </div>

                </div>
                <!-- !subtotal section-->
            </div>
            <!--  !shopping cart items   -->
            <div class="row">
                <h5>Dane do Dostawy:</h5>
                <div class="col font-size-16 font-rubik">
                    <?php
                        echo "<p>" . $_SESSION['imie'] . " " . $_SESSION['nazwisko'] . "</p>";
                        echo "<p>" . $_SESSION['email'] . "</p>";
                        echo "<p>+48 " . $_SESSION['telefon'] . "</p>";
                        echo "<p> ul. " . $_SESSION['ulica'] . " " . $_SESSION['nrdomu'] . "</p>";
                        echo "<p>" . $_SESSION['kodpocztowy'] . " " . $_SESSION['miejscowosc'] .  "</p>";
                    ?>
                </div>
        </div>
        </div>
    </section>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="index.js"></script>

</body>
</html>