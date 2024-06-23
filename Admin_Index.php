<?php
ob_start();

session_start();
if (!isset($_SESSION['logged']))
{
    header('Location: login.php');
    exit();
}

//include header.php
include("Admin_header.php");
?>

<?php
/* include banner area */
include("Admin Template/Admin_banner-area.php");
/* include banner area */

/* include top-sale */
include("Admin Template/Admin_top-sale.php");
/* include top-sale */

/* include special-price */
include("Admin Template/Admin_special-price.php");
/* include special-price */

/* include new-products */
include("Admin Template/Admin_new-products.php");
/* include new-products */

/* include blogs */
include("Admin Template/Admin_blogs.php");
/* include blogs */
?>

<?php
//include footer.php
include("Admin_footer.php");
?>