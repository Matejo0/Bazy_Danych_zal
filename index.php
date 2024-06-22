<?php

    session_start();

    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: Admin_Index.php');
        exit();
    }

    ob_start();
    //include header.php
    include("header.php");
?>

<?php
    /* include banner area */
    include("Template/_banner-area.php");
    /* include banner area */

    /* include top-sale */
    include("Template/_top-sale.php");
    /* include top-sale */

    /* include special-price */
  #  include("Template/_special-price.php");
    /* include special-price */

    /* include new-products */
    include("Template/_new-products.php");
    /* include new-products */

    /* include blogs */
    include("Template/_blogs.php");
    /* include blogs */
?>

<?php
//include footer.php
include("footer.php");
?>