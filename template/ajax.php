<?php

/* require database class */
require_once('../Database/Database.php');

/* require Product class */
require_once('../Database/Product.php');



/* creating database object */
$db = new Database();

/* create product object */
$product = new Product($db);



if (isset($_POST['item_id'])) {
    $item = $product->displaySingleProduct($table = 'products', $_POST['item_id']);
    echo json_encode($item);
}
