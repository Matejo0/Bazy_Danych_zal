<?php

if (!isset($_SESSION['logged']))
{
    header('Location: ../login.php');
    exit();
}
?>
<!-- Owl-carousel -->
<section id="banner-area">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="/assets/baner1.png" alt="Banner1">
        </div>
        <div class="item">
            <img src="/assets/baner2.png" alt="Banner2">
        </div>
        <div class="item">
            <img src="/assets/baner3.png" alt="Banner3">
        </div>
        <div class="item">
            <img src="/assets/baner4.png" alt="Banner4">
        </div>
        <div class="item">
            <img src="/assets/baner5.png" alt="Banner5">
        </div>
        <div class="item">
            <img src="/assets/baner6.png" alt="Banner6">
        </div>
        <div class="item">
            <img src="/assets/baner7.png" alt="Banner7">
        </div>
        <div class="item">
            <img src="/assets/baner8.png" alt="Banner8">
        </div>
    </div>
</section>
<!-- !Owl-carousel -->
