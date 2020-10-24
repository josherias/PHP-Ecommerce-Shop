<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    $categoryTitle = $_POST['category_title'];
    $categoryInfo = $_POST['category_info'];

    $categoryImage = $_FILES['category_image']['name'];
    $target_path = "uploads/" . basename($_FILES['category_image']['name']);



    $data = ['title' => $categoryTitle, 'category_image' => $categoryImage, 'category_info' => $categoryInfo];

    move_uploaded_file($_FILES['category_image']['tmp_name'], $target_path);
    $category->AddCategory($data);
    $_SESSION['SuccessMessage'] = "Category added successfully";


    $output = "<p class=\"alert alert-danger p-1\"> Category Added successfuly</p>";



    echo $output;
} else {
    echo "Failed";
}
