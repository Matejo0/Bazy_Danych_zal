<?php

session_start();

if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
    header('Location: Admin_cart.php');
    exit();
}

ob_start();
//include header.php
include("header.php");
?>

<?php

    /* include cart item if it is not empty */
    count($product->getData('cart')) ? include("Template/_cart-tamplate.php") : include("Template/notFound/_cart_notFound.php");
    /* include cart item if it is not empty */


?>

<?php
//include footer.php
include("footer.php");
?>
