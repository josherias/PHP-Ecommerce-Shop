<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    $id = $_POST['id'];
    $data = $product->displaySingleProduct('products', $id);
    echo json_encode($data);
} else {
    echo "Failed";
}
