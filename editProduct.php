<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    /* get the values from the form inputs */
    $id = test_input($_POST['edit_pro_id']);
    $productName = test_input($_POST['edit_pro-name']);
    $productCategory = test_input($_POST['edit_product_category']);
    $brand = test_input($_POST['edit_pro-brand']);
    $inStock = test_input($_POST['edit_pro-inStock']);
    $unitPrice = test_input($_POST['edit_pro-unitPrice']);
    $image = $_FILES['edit_pro-image']['name'];

    $target_path = "uploads/" . basename($_FILES['edit_pro-image']['name']);
    $seller = test_input($_POST['edit_pro-seller']);
    $seller_contact = test_input($_POST['edit_pro-seller-contact']);
    $product_details = test_input($_POST['edit_product_details']);
    $product_specification = test_input($_POST['edit_product_specification']);
    /* get the current time  */
    $CurrentTime = time();
    $DateTime    = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);




    $data = [
        'product_name' => $productName, 'brand' => $brand, 'in_stock' => $inStock, 'unit_price' => $unitPrice, 'product_image' => $image,
        'seller' => $seller, 'seller_contact' => $seller_contact, 'product_details' => $product_details, 'product_specification' => $product_specification, 'dateTime' => $DateTime,
        'category' => $productCategory
    ];


    move_uploaded_file($_FILES['edit_pro-image']['tmp_name'], $target_path);
    $product->EditProduct($data, $id);


    $output = "<p class=\"alert alert-success p-1\"> Category Editted successfuly</p>";
    echo $output;
} else {
    echo "<p class=\"alert alert-danger p-1\"> Something went wrong</p>";
}
