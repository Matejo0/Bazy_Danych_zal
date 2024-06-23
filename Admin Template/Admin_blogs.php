<?php

    if (!isset($_SESSION['logged']))
    {
    header('Location: ../login.php');
    exit();
    }
?>
<!-- Blogs -->
<section id="blogs">
    <div class="container py-4">
        <h4 class="font-rubik font-size-20">Najnowsze Wpisy</h4>
        <hr>

        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem">
                    <h5 class="card-title font-size-16">Nadchodzące Produkty</h5>
                    <img src="/assets/blog/blog1.jpg" alt="card image" class="card-img-top">
                    <p class="card-text-font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur culpa excepturi explicabo facere impedit laudantium optio perferendis praesentium qui quidem.</p>
                    <a href="#" class="color-second text-left">Czytaj Dalej...</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem">
                    <h5 class="card-title font-size-16">Nadchodzące Produkty</h5>
                    <img src="/assets/blog/blog2.jpg" alt="card image" class="card-img-top">
                    <p class="card-text-font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur culpa excepturi explicabo facere impedit laudantium optio perferendis praesentium qui quidem.</p>
                    <a href="#" class="color-second text-left">Czytaj Dalej...</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem">
                    <h5 class="card-title font-size-16">Nadchodzące Produkty</h5>
                    <img src="/assets/blog/blog3.jpg" alt="card image" class="card-img-top">
                    <p class="card-text-font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur culpa excepturi explicabo facere impedit laudantium optio perferendis praesentium qui quidem.</p>
                    <a href="#" class="color-second text-left">Czytaj Dalej...</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->