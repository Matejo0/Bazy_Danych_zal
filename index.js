$(document).ready(function(){

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })


    // new phones owl carousel
    $("#new-products .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })


    // product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });

                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty up button


    // click on qty down button
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];


                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });

                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }
            }}); // closing ajax request
    });

    $("button.delete").click(function(e){
        if(!confirm('Na pewno chcesz usunąć ten produkt?')){
            e.preventDefault();
            return false;
        }
        return true;
    });


    const product_price = parseFloat($('.product_price[data-id]').text()) || 0.00,
        product_price_with_delivery = $('.product_price_with_delivery[data-id]');

    //console.log(product_price.text(), product_price_with_delivery.text());

    $('#order-details').on('click', calculatePriceWithDelvery);

    function calculatePriceWithDelvery(e) {
        //console.log(e.target);
        if (e.target.nodeName == 'INPUT' && e.target.type == 'radio') {
            const delivery_price = parseFloat($('[name="delivery"]:checked').val()) || 0.00;
            //console.log(delivery_price);
            product_price_with_delivery.text((parseFloat(product_price + delivery_price)).toFixed(2));
        }
    }


    const sum_price = parseFloat($('.sum_price').text()) || 0.00,
        sum_price_with_delivery = $('.sum_price_with_delivery[data-id]');


    $('#order-choice').on('click', calculateSumWithDelvery);

    function calculateSumWithDelvery(e) {
        if (e.target.nodeName == 'INPUT' && e.target.type == 'radio') {
            const delivery_price = parseFloat($('[name="delivery"]:checked').val()) || 0.00;
            //console.log(delivery_price);
            sum_price_with_delivery.text((parseFloat(sum_price + delivery_price)).toFixed(2));
        }
    }


});

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}