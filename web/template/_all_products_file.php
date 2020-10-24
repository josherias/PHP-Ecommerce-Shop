<section id="_all_products_file" class="my-5">

    <div class="container">

        <div class="row">
            <div class="col-sm-12 offset-md-1">
                <div class=" justify-content-center align-items-center font-rale">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="justify-content-center d-flex">
                            <div class="col-md-8"><input class="form-control form-control-lg" type="text" placeholder="Search Products, Brands, Categories" name="search" aria-label="Search" /></div>
                            <div class="col-md-4"><button type="submit" class="btn color-black-bg color-white btn-lg" name="searchBtn">Search</button></div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-sm-12 mt-4">
                <h5 class="font-rubik font-size-20 py-3">All Products</h5>
                <div class="d-flex flex-wrap justify-content-center align-items-center font-rubik">
                    <?php
                    if (isset($_POST['searchBtn'])) {
                        $search = $_POST['search'];
                        $product_array =  $product->SearchProduct($search);
                    } else {
                        $product_array = $product->displayProducts('products');
                    }

                    foreach ($product_array as $row) :
                    ?>
                        <!-- ----item---- -->
                        <div class="card border-light m-2" style="max-width: 18rem;">
                            <div class="card-header font-rubik"><?php echo $row['product_name'] ?? 'Product Name'; ?></div>
                            <div class="card-body text-center">
                                <a href="<?php printf('%s?item_id=%s', 'Details.php', $row['id']) ?>"><img src="./uploads/<?php echo $row['product_image'] ?? 'Image'; ?>" alt="image" class="card-img image-fluid my-2" style="width: 190px; height:200px" /></a>
                                <p class="font-rubik"><?php echo $row['brand'] ?? 'Brand'; ?></p>
                                <small class="font-rubik">Category : <?php echo $row['category'] ?? 'Category'; ?></small>
                            </div>
                        </div>
                        <!-- ----item---- -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>




</section>