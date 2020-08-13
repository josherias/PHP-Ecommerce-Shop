<?php

// fetch products from wishlist table wen
$user_id = $_SESSION['user_id'] ?? 8;
$WishData = $cart->getCartData('wishlist', $user_id);

//Delet from wishlist 
if (isset($_POST['delete_from_wishlist_btn'])) {
    $delete_id = $_POST['product_id'];

    $cart->deleteFromCart('wishlist', $delete_id);
    $_SESSION['SuccessMessage'] = 'Product Deleted Succesfully From WishList';
    Redirect('WishList.php');
}

/* add to cart */
if (isset($_POST['add_to_cart_btn'])) {
    $product_id = $_POST['product_id'];
    //get item with the matching id from cart
    $WishArray = $cart->getSingleCart('wishlist', $product_id);
    //loop thru the cartarray and add the items to the wishlist 
    foreach ($WishArray as $row) {
        $cart->addToCart($row);
    }
    //delete item with specific id from cart
    $cart->deleteFromCart('wishlist', $product_id);
    $_SESSION['SuccessMessage'] = 'Product added Succesfully to Cart';
    Redirect('WishList.php');
}

?>

<section id="cart-section" class="color-back py-5 my-5">
    <div class="container">
        <!-- ---------- alert--------------- -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <!-- ---------- alert--------------- -->
        <div class="row">

            <h4 class="font-baloo font-size-20">WishList (<?php echo $cart->cartCount($WishData); ?> items)</h4>

            <!-- ---------cart item----------- -->
            <?php



            foreach ($WishData as $wishItem) :
                //select data from products where id equals to the product ids stored in the cart
                $wishProduct = $product->displaySingleProduct($table = 'products', $wishItem['product_id']);
                //loop through the products array and also store the totals of products in the $ItemTotals array
                array_map(function ($item) {

            ?>



                    <div class="col-sm-12 py-2">
                        <div class="card d-flex" id="cart_product">
                            <div class="row">
                                <!-- ----image----- -->
                                <div class="col-sm-2">
                                    <br>
                                    <h5 class="font-size-16 font-baloo text-center">
                                        ITEM
                                    </h5>
                                    <div class="card-image text-center">
                                        <img src="./uploads/<?php echo $item['product_image'] ?? './assets/products/phones/15.png" style="width: 200px; height: 150px;' ?>" alt="" class="img-fluid p-2" />
                                    </div>
                                </div>
                                <!-- -x---image----x- -->
                                <!-- ------Description------- -->
                                <div class="col-sm-6 border-left my-1">
                                    <br>
                                    <div class="card-text text-center font-rale">
                                        <p class="text-lead">Seller : <?php echo $item['seller'] ?? 'Seller Name'; ?></p>
                                        <p class="font-rale text-primary"><?php echo substr($item['product_details'], 0, 50) ?? 'item description'; ?></p>
                                        <br />
                                        <!-- form -->
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                                            <!-- hidden input -->
                                            <input type="hidden" name="product_id" value="<?php echo $item['id'] ?? '1'; ?>" id="hidden_input">
                                            <!-- add to wishlist button -->

                                            <button class="btn btn-primary btn-sm" name="add_to_cart_btn">
                                                To Cart</button>
                                            <!-- add to wishlist button -->


                                            <!-- delete button -->
                                            <button class="btn btn-danger btn-sm" name="delete_from_wishlist_btn" id="delete_from_wishlist_btn">
                                                <i class="fas fa-trash p-1"></i> Delete</button>
                                            <!-- delete button -->
                                        </form>
                                        <!-- form -->
                                    </div>
                                </div>
                                <!-- --x----Description---x---- -->

                                <!-- ----unit price--- -->
                                <div class="col-sm-3 border-left my-1 text-center">
                                    <br>
                                    <h5 class="font-size-16 font-baloo">
                                        UNIT PRICE
                                    </h5>
                                    <div class="text-center font-rale">
                                        <span>$<?php echo $item['unit_price'] ?? 0; ?></span>
                                        <br />
                                        <span class="text-danger text-lead">$ <strike><?php echo $item['unit_price'] ?? '0'; ?></strike></span><br />
                                        <small>10% Discount</small>
                                    </div>
                                </div>
                                <!-- ----unit price--- -->


                            </div>
                        </div>
                    </div>
            <?php

                    return $item['unit_price']; //return all the product prices using the $ItemTotals array
                }, $wishProduct);

            //loop through the products en return product with particular id
            endforeach;  //end for each loop
            ?>


        </div>
    </div>


</section>