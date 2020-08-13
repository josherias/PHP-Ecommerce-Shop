<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    $id = $_POST['edit_category_id'];
    $categoryTitle = $_POST['edit_category_title'];
    $categoryInfo = $_POST['edit_category_info'];

    $categoryImage = $_FILES['edit_category_image']['name'];
    $target_path = "uploads/" . basename($_FILES['edit_category_image']['name']);



    $data = ['title' => $categoryTitle, 'category_image' => $categoryImage, 'category_info' => $categoryInfo];

    move_uploaded_file($_FILES['edit_category_image']['tmp_name'], $target_path);
    $category->EditCategory($data, $id);


    $output = "<p class=\"alert alert-success p-1\"> Category Editted successfuly</p>";
    echo $output;
} else {
    echo "<p class=\"alert alert-danger p-1\"> Something went wrong</p>";
}
