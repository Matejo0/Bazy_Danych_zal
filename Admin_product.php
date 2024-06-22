<?php

session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
    exit();
}

//include header.php
include("Admin_header.php");
?>

<?php

/* include products template */
include("Admin Template/Admin_products.php");
/* include products template*/

/* include top-sale */
include("Admin Template/Admin_top-sale.php");
/* include top-sale */

?>

<?php
//include footer.php
include("Admin_footer.php");
?>
