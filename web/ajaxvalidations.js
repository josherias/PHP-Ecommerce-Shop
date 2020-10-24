$(document).ready(function () {
  //form validation

  //image
  $("#pro-image").keyup(function () {
    //get selected image
    var selectedImage = document.getElementById("pro-image").files[0];
    //get name of selected file
    var image_name = selectedImage.name;
    //get extension of selected file
    var image_extension = image_name.split(".").pop().toLowerCase();
    //check if the extension exist in array and if not alert

    var image_size = selectedImage.size;
    if (
      jQuery.inarray(image_extension, ["gif", "png", "jpg", "jpeg"]) == -1 &&
      image_size > 2000000
    ) {
      alert("invalid image size or file");
    }
  });

  //pro-name
  $("#pro-name").keyup(function () {
    var regexp = /^[a-zA-Z0-9 ]+[a-zA-Z0-9 ]$/;

    if (regexp.test($("#pro-name").val())) {
      $("#pro-name")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-name").closest(".form-control").addClass("text-success");
    } else {
      $("#pro-name")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });

  //pro-brand
  $("#pro-brand").keyup(function () {
    var regexp = /^[a-zA-Z0-9 ]+$/;

    if (regexp.test($("#pro-brand").val())) {
      $("#pro-brand")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-brand").closest(".form-control").addClass("text-success");
    } else {
      $("#pro-brand")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });

  //pro-inStock
  $("#pro-inStock").keyup(function () {
    var regexp = /^[0-9 ]+$/;

    if (regexp.test($("#pro-inStock").val())) {
      $("#pro-inStock")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-inStock").closest(".form-control").addClass("text-success");
    } else {
      $("#pro-inStock")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });

  //pro-unitPrice
  $("#pro-unitPrice").keyup(function () {
    var regexp = /^[0-9 ]+$/;

    if (regexp.test($("#pro-unitPrice").val())) {
      $("#pro-unitPrice")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-unitPrice").closest(".form-control").addClass("text-success");
    } else {
      $("#pro-unitPrice")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });
  //pro-selleer
  $("#pro-seller").keyup(function () {
    var regexp = /^[a-zA-Z0-9 ]+$/;

    if (regexp.test($("#pro-seller").val())) {
      $("#pro-seller")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-seller").closest(".form-control").addClass("text-success");
    } else {
      $("#pro-seller")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });
  //pro seller-contact
  $("#pro-seller-contact").keyup(function () {
    var regexp = /^[0-9 ]{10}$/;

    if (regexp.test($("#pro-seller-contact").val())) {
      $("#pro-seller-contact")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#pro-seller-contact")
        .closest(".form-control")
        .addClass("text-success");
    } else {
      $("#pro-seller-contact")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });

  //#product_details
  $("#product_details").keyup(function () {
    var regexp = /^[a-zA-Z0-9 ]+$/;

    if (regexp.test($("#product_details").val())) {
      $("#product_details")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#product_details").closest(".form-control").addClass("text-success");
    } else {
      $("#product_details")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });

  //#product specification
  $("#product_specification").keyup(function () {
    var regexp = /^[a-zA-Z0-9 ]+$/;

    if (regexp.test($("#product_specification").val())) {
      $("#product_specification")
        .closest(".form-control")
        .removeClass("alert alert-danger text-danger");
      $("#product_specification")
        .closest(".form-control")
        .addClass("text-success");
    } else {
      $("#product_specification")
        .closest(".form-control")
        .addClass("alert alert-danger text-danger");
    }
  });
});
