<?php

$productArray = $product->displayProducts();
/* var_dump($productArray); */
//shuffle the products order
shuffle($productArray);

?>

<section id="new_products">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h4 class="font-rubik font-size-20">New Products</h4>
                <div class="owl-carousel owl-theme \">

                    <!-- start of forach loop -->
                    <?php foreach ($productArray as $item) : ?>
                        <div class="item w-90">
                            <div class="card border-0 p-3 font-rale">
                                <div style="height: 330px; overflow: hidden;">

                                    <a href="<?php printf('%s?item_id=%s', 'Details.php', $item['id']); ?>">
                                        <img src="uploads/<?php echo $item['product_image'] ?? './assets/products/shoes/react-metcon-training-shoe-vzDkWQ (2).jpg'; ?>" alt="" class="card-image-top img-fluid" />
                                    </a>
                                </div>

                                <div class="m-auto py-3 text-center">
                                    <h3 class="card-title font-rale font-size-18"><?php echo $item['product_name'] ?? 'Product Name'; ?></h3>
                                    <h5 class="card-text font-baloo font-size-14 text-danger">$<strike>200</strike></h5>
                                    <h5 class="card-text font-baloo">$<?php echo $item['unit_price'] ?? 0; ?></h5>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; //end for each loop 
                    ?>
                </div>


            </div>
        </div>
    </div>
</section>