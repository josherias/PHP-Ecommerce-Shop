<?php
if (isset($_POST['add_product_btn'])) {
    $categoryTitle = $_POST['category_title'];
    $categoryInfo = $_POST['category_info'];

    $categoryImage = $_FILES['category_image']['name'];
    $target_path = "uploads/" . basename($_FILES['category_image']['name']);



    $data = ['title' => $categoryTitle, 'category_image' => $categoryImage, 'category_info' => $categoryInfo];

    move_uploaded_file($_FILES['category_image']['tmp_name'], $target_path);
    $category->AddCategory($data);
    $_SESSION['SuccessMessage'] = "Category added successfully";
}
?>
<section id="_categories" class="my-5">
    <div class="container">
        <h5 class="font-rubik font-size-20 py-3">Categories</h5>
        <div class="row ">
            <div class="col-sm-12">
                <div class="d-flex flex-wrap justify-content-center align-items-center font-rubik">
                    <?php
                    $cartegoryArray = $category->DisplayCategory();
                    foreach ($cartegoryArray as $row) :
                    ?>
                        <!-- ----item---- -->
                        <div class="card border-light m-2" style="max-width: 18rem;">
                            <div class="card-header font-rubik"><strong><?php echo $row['title'] ?? 'category title'; ?></strong></div>
                            <div class="card-body text-center">
                                <a href="ProductsPage.php?category=<?php echo $row['title'] ?? 'Shoes'; ?>"><img src="./uploads/<?php echo $row['category_image'] ?? 'Image'; ?>" alt="image" class="card-img image-fluid my-2" style="width: 190px; height:200px" /></a>
                                <span class="card-text badge badge-pill badge-danger font-size-14 font-rale p-2"><?php echo $row['category_info'] ?? 'category Information'; ?></span>
                            </div>
                        </div>
                        <!-- ----item---- -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</section>