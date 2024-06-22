<?php
session_start();

if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
    header('Location: Admin_product.php');
    exit();
}

//include header.php
include("header.php");
?>

<?php

    /* include products template */
    include("Template/_products.php");
    /* include products template*/

    /* include top-sale */
    include("Template/_top-sale.php");
    /* include top-sale */

?>

<?php
//include footer.php
include("footer.php");
?>