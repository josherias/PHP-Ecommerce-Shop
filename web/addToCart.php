<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

$user_id = $_SESSION['user_id'] ?? 8;
if (isset($user))
    if (!empty($_POST)) {

        $product_id = $_POST['id'];
        $data = ['product_id' => $product_id, 'user_id' => $user_id];
        $cart->addToCart($data);
    } else {
        echo "Failed";
    }
