<?php

    if (!isset($_SESSION['logged']))
    {
    header('Location: login.php');
    exit();
    }
?>

</main>
<!--!start #main-->

<!--start #footer-->
<footer id="footer" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <h4 class="font-rubik font-size-20">Sklep Kawosza</h4>
                <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt esse hic iusto officia provident quae.</p>
            </div>
            <div class="col-lg-4 col-12">
                <h4 class="font-rubik font-size-20">Newsletter</h4>
                <form class="form-row">
                    <div class="col">
                        <label>
                            <input type="text" class="form-control" placeholder="Email *">
                        </label>
                    </div>
                    <div class="col mt-2">
                        <button type="submit" class="btn btn-primary mb-2">Subskrybuj</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Informacje</h4>
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">O Nas</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Informacje o dostawie</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Polityka Prywatności</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Zasady i Warunki</a>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Konto</h4>
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Moje Konto</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Historia Zamówień</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright text-center bg-dark text-white py-2">
</div>
<!--!start #footer-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<!--Owl Carousel Js file-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- isotope plugin cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Custom Javascript-->
<script src="index.js"></script>

</body>
</html>