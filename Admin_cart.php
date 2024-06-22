<?php

    session_start();
    if (!isset($_SESSION['logged']))
    {
        header('Location: login.php');
        exit();
    }

    ob_start();
    //include header.php
    include("Admin_header.php");
?>

<?php

    /* include cart item if it is not empty */
    count($product->getData('cart')) ? include("Admin Template/Admin_cart-tamplate.php") : include("Admin Template/notFound/Admin_cart_notFound.php");
    /* include cart item if it is not empty */

?>

<?php
    //include footer.php
    include("Admin_footer.php");
?>
