<?php

    if (!isset($_SESSION['logged']))
    {
        header('Location: ../login.php');
        exit();
    }
?>
<!--Owl-carousel-->
<section id="banner-area">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="/assets/Banner.png" alt="Banner1">
        </div>
        <div class="item">
            <img src="/assets/Banner1.png" alt="Banner2">
        </div>
        <div class="item">
            <img src="/assets/Banner.png" alt="Banner3">
        </div>
    </div>
</section>
<!--!Owl-carousel-->