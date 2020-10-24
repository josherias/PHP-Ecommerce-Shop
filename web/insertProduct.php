<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    /* get the values from the form inputs */
    $productName = test_input($_POST['productName']);
    $brand = test_input($_POST['brand']);
    $inStock = test_input($_POST['inStock']);
    $unitPrice = test_input($_POST['unitPrice']);
    $image = $_FILES['image']['name'];

    $target_path = "uploads/" . basename($_FILES['image']['name']);
    $seller = test_input($_POST['seller']);
    $seller_contact = test_input($_POST['seller_contact']);
    $product_details = test_input($_POST['product_details']);
    $product_specification = test_input($_POST['product_specification']);
    /* get the current time  */
    $CurrentTime = time();
    $DateTime    = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);


    /* image extension validation  */
    $test = explode(".", $image);
    $extension = end($test);

    $allowedExtension = array(
        "png",
        "jpg",
        "jpeg"
    );

    $data = [
        'product_name' => $productName, 'brand' => $brand, 'in_stock' => $inStock, 'unit_price' => $unitPrice, 'product_image' => $image,
        'seller' => $seller, 'seller_contact' => $seller_contact, 'product_details' => $product_details, 'product_specification' => $product_specification, 'dateTime' => $DateTime
    ];


    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);


    $product->addNewProduct($data);

    $_SESSION['SuccessMessage'] = "Product added successfully";


    $output = "<p class=\"alert alert-danger p-1\"> Product Added successfuly</p>";


    echo $output;
} else {
    echo "Failed";
}
