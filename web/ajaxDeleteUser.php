<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

//delete user ajax
if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $user->RemoveUser('users', $id);
    echo 'User deleted succcessfuly';
}

//delete category ajax
if (isset($_POST['category_id'])) {
    $id = $_POST['category_id'];
    $category->DeleteCategory('category', $id);
    echo 'category deleted succcessfuly';
}

//delete product ajax
if (isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    $product->DeleteProduct('products', $id);
    echo 'product deleted succcessfuly';
}
