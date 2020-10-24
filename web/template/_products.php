<?php
$user_id = $_SESSION['user_id'] ?? 8;
/* Fetch products using product object */
$productArray = $product->displayProducts();
/* shuffle the fetched array */
shuffle($productArray);

$id = '';

?>
<section id="products">
    <div class="container mb-4">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="font-rubik font-size-20">Products</h4>
                <div class="owl-carousel owl-theme">
                    <!-- start for each loop -->
                    <?php
                    $item_id = array_map(function ($row) use ($cart, $user_id) {
                    ?>

                        <div class="item w-90">
                            <div class="card border-0 p-3 font-rale">
                                <div style="height: 300px; overflow: hidden;">
                                    <a href="<?php printf('%s?item_id=%s', 'Details.php', $row['id']) ?>"> <img src="./uploads/<?php echo $row['product_image'] ?? './assets/products/shoes/react-metcon-training-shoe-vzDkWQ (2).jpg'; ?>" alt="" class="card-image-top img-fluid" />
                                    </a>
                                </div>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <!-- hidden input field to capture product_id -->
                                    <input type="hidden" name="product_id" id="input_hidden" data-id="<?php echo $row['id'] ?? 1; ?>">

                                    <div class="m-auto py-3 text-center">
                                        <h3 class="card-title font-rale font-size-18"><?php echo $row['product_name'] ?? 'Product Name'; ?></h3>
                                        <p class="card-text font-baloo text-center">$ <?php echo $row['unit_price'] ?? '0'; ?> </p>
                                        <!-- ------- add to cart button------------ -->

                                        <?php

                                        $itemsInCart = $cart->getCartData('cart', $user_id); // gets all the items already stored in the cart

                                        $cartIds = $cart->getCartId($itemsInCart); //gets all ids of items alreday in cart

                                        //check if product id alreadry exists in array
                                        if (in_array($row['id'], $cartIds)) {
                                            echo ' <button type="submit" disabled class="btn btn-secondary form-control" >
                                            In Cart <i class="fas fa-cart-arrow-down"></i>
                                        </button>';
                                        } else {
                                            $id = $row['id'];
                                            echo "<button type='button' class='btn color-black-bg color-white text-center form-control' id='add_to_cart' data-id='$id' data-toggle='modal' data-target='#viewCartModal'>
                                            Add to Cart <i class='fas fa-cart-arrow-down'></i>
                                        </button>";
                                        }

                                        ?>
                                        <!-- ------- add to cart button------------ -->

                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php

                    }, $productArray);
                    //end for each 
                    ?>


                </div>
                <!-- view cart modal -->
                <!-- Modal -->
                <div class="modal fade font-rubik" id="viewCartModal" tabindex="-1" role="dialog" aria-labelledby="viewCartModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id=""></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="messageModal"></div>
                                <div class="my-3 text-center">
                                    <h4 class="text-success">Click To Add Item to Cart</h4>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-sm-6"><button class="btn btn-danger form-control" data-dismiss="modal" id="add_to_cart_new">Add to Cart</button></div>
                                    <div class="col-sm-6"><a href="Cart.php" class="btn color-black-bg form-control text-light">View Cart</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- view cart modal -->
            </div>
        </div>
    </div>
</section>