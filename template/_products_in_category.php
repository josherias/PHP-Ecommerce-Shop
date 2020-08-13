<?php
//get category from url click
$category = $_GET['category'];
?>
<!----x- Header.php file --x-->

<section id="products_in_category" class="my-5">
    <div class="container">
        <h5 class="font-rubik font-size-20 py-3">Category : <strong><?php echo $category; ?></strong></h5>
        <div class="row ">
            <div class="col-sm-12">
                <div class="d-flex flex-wrap justify-content-center align-items-center font-rubik">
                    <?php
                    $productsArray = $product->displayProductincategory('products', $category);
                    foreach ($productsArray as $row) :
                    ?>
                        <!-- ----item---- -->
                        <div class="card border-light m-2" style="max-width: 18rem;">

                            <div class="card-body text-center">
                                <img src="./uploads/<?php echo $row['product_image'] ?? 'Image'; ?>" alt="image" class="card-img image-fluid my-2" style="width: 170px; height:190px" />
                                <p class="font-rubik"><strong><?php echo $row['product_name'] ?? 'category title'; ?></strong></p>
                                <p class="card-text">$ &nbsp; <?php echo $row['unit_price'] ?? 0; ?></p>
                                <p class="card-text"><?php echo $row['brand'] ?? 'Brand'; ?></p>
                            </div>
                        </div>
                        <!-- ----item---- -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>




</section>