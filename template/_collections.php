<?php
//fetch products using product object
$productArray = $product->displayProductsLimit('products', 20);
//shuffle the products array
shuffle($productArray);

?>

<section id="collections" class="my-4">
    <div class="container">
        <h5 class="font-rubik font-size-20 py-3">Collections</h5>
        <div class="row color-back border">
            <div class="col-sm-12">
                <div class="d-flex flex-wrap p-2" style="position: relative;">

                    <!-- start for each loop -->
                    <?php foreach ($productArray as $row) : ?>
                        <div class="item py-3">
                            <a href="<?php printf('%s?item_id=%s', 'Details.php', $row['id']) ?>"> <img src="./uploads/<?php echo $row['product_image'] ?? './assets/products/clothes/korea-2020-stadium-home-football-shirt-6lRTlG (1).jpg'; ?>" alt="" width="150px" height="200px" class="img-fluid p-2" />
                            </a>
                        </div>
                    <?php endforeach; //end for reach 
                    ?>

                    <a href="Categories.php" class="more item mx-3 mb-3 color-back text-center border rounded-circle nav-link" style=" position: absolute; width: 150px; height:150px; bottom: 0;right:30px; z-index: 10; padding:40px 50px ;">
                        <h1><i class="fas fa-chevron-right"></i></h1>
                        <p class="font-rale font-size-12"><strong>View More</strong></p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>