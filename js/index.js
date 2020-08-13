$(document).ready(function () {
  // banner owl carousel

  $("#banner .owl-carousel").owlCarousel({
    dots: true,
    loop: true,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
  });

  //new products owl carousel
  $("#new_products .owl-carousel").owlCarousel({
    dots: true,
    loop: true,
    items: 4,

    autoplay: true,
    autoplayTimeout: 3000,
    responsiveClass: true,
    responsive: {
      0: { items: 1 },
      600: {
        items: 3,
      },
      1000: {
        items: 3,
      },
    },
  });

  //products owl carousel
  $("#products .owl-carousel").owlCarousel({
    dots: false,
    loop: true,
    items: 4,
    autoplayTimeout: 4000,

    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: { items: 1 },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });

  //quatity and price
  $(`#upCart[data-id='${$("#upCart").data("id")}']`).on(
    "change keyup",
    function () {
      //var newQty = $("#upCart").val();
      var newQty = $(this).val();

      let $subtotal = $(`.subTotal[data-id='${$(".subTotal").data("id")}']`);
      let $totalPrice = $("#total_price");

      $.ajax({
        url: "template/ajax.php",
        type: "post",
        data: { item_id: $(this).data("id") },
        success: function (data) {
          let obj = JSON.parse(data);
          let item_price = obj[0]["unit_price"];

          //increase price of productt
          $subtotal.text(parseInt(item_price * newQty).toFixed(2));

          //set total price
          let total = parseInt($totalPrice.text()) + parseInt(item_price);
          $totalPrice.text(total.toFixed(2));
        },
      });
    }
  );

  ///
});
