<?php
$user_id = $_SESSION['user_id'] ?? 8;
// fetch products from database wen
$cartData = $cart->getCartData('cart', $user_id);

//Delet from cart 
if (isset($_POST['delete_from_cart_btn'])) {
    $delete_id = $_POST['product_id'];

    $cart->deleteFromCart('cart', $delete_id);
    $_SESSION['SuccessMessage'] = 'Product Deleted Succesfully From Cart';
    Redirect('Cart.php');
}


//add item to wishlist
if (isset($_POST['add_to_wishlist_btn'])) {
    $product_id = $_POST['product_id'];
    //get item with the matching id from cart
    $cartArray = $cart->getSingleCart('cart', $product_id);
    //loop thru the cartarray and add the items to the wishlist 
    foreach ($cartArray as $row) {
        $cart->addToWishList($row);
    }
    //delete item with specific id from cart
    $cart->deleteFromCart('cart', $product_id);
    $_SESSION['SuccessMessage'] = 'Product added Succesfully to WishList';
    Redirect('Cart.php');
}

?>

<section id="cart-section" class="color-back py-5">
    <div class="container">
        <!-- ---------- alert--------------- -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <!-- ---------- alert--------------- -->
        <div class="row">

            <h4 class="font-baloo font-size-20">Cart (<?php echo $cart->cartCount($cartData); ?> items)</h4>

            <!-- ---------cart item----------- -->
            <?php



            foreach ($cartData as $cartItem) :
                //select data from products where id equals to the product ids stored in the cart
                $cartProduct = $product->displaySingleProduct($table = 'products', $cartItem['product_id']);
                //loop through the products array and also store the totals of products in the $ItemTotals array
                $ItemTotals[] = array_map(function ($item) {

            ?>



                    <div class="col-sm-12 py-3">
                        <div class="card d-flex" id="cart_product">
                            <div class="row">
                                <!-- ----image----- -->
                                <div class="col-sm-2">
                                    <h5 class="font-size-16 font-baloo text-center py-2 ">
                                        ITEM
                                    </h5>
                                    <div class="card-image text-center">
                                        <img src="./uploads/<?php echo $item['product_image'] ?? './assets/products/phones/15.png" style="width: 200px; height: 150px;' ?>" alt="" class="img-fluid p-2" />
                                    </div>
                                </div>
                                <!-- -x---image----x- -->
                                <!-- ------Description------- -->
                                <div class="col-sm-4 border-left">
                                    <br>
                                    <div class="card-text p-2 text-center font-rale">
                                        <p class="text-lead">Seller : <?php echo $item['seller'] ?? 'Seller Name'; ?></p>
                                        <p class="font-rale text-primary"><?php echo substr($item['product_details'], 0, 50) ?? 'item description'; ?></p>
                                        <br />

                                        <!-- form -->
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                                            <!-- hidden input -->
                                            <input type="hidden" name="product_id" value="<?php echo $item['id'] ?? '1'; ?>" id="hidden_input">
                                            <!-- add to wishlist button -->

                                            <button class="btn btn-primary btn-sm" name="add_to_wishlist_btn">
                                                <i class="far fa-heart"></i> ToWishList</button>
                                            <!-- add to wishlist button -->


                                            <!-- delete button -->
                                            <button class="btn btn-danger btn-sm" name="delete_from_cart_btn" id="delete_from_cart_btn">
                                                <i class="fas fa-trash p-1"></i> Delete</button>
                                            <!-- delete button -->
                                        </form>
                                        <!-- form -->
                                    </div>
                                </div>
                                <!-- --x----Description---x---- -->
                                <!-- -------Quantity---- -->
                                <div class="col-sm-2 border-left my-1">
                                    <br>
                                    <h5 class="font-size-16 font-baloo text-center">
                                        QUANTITY
                                    </h5>
                                    <div class="text-center font-rale py-2">
                                        <input type="number" size="2" value="1" id="upCart" data-id="<?php echo $item['id'] ?? 0; ?>" style="max-width: 50px;" MIN="1" MAX="10" class="text-center">
                                    </div>

                                </div>

                                <!-- -x------Quantity---x- -->
                                <!-- ----unit price--- -->
                                <div class="col-sm-2 border-left my-1">
                                    <br>
                                    <h5 class="font-size-16 font-baloo text-center">
                                        UNIT PRICE
                                    </h5>
                                    <div class="text-center font-rale">
                                        <span class="text-danger">$<strike><?php echo $item['unit_price'] ?? 0; ?></strike></span>
                                        <br />
                                        <span class="text-lead">$ <?php echo $item['unit_price'] ?? 0; ?></span><br />
                                        <small>10% Discount</small>
                                    </div>
                                </div>
                                <!-- ----unit price--- -->

                                <!-- ----subtotal--- -->
                                <div class="col-sm-2 border-left my-1">
                                    <br>
                                    <h5 class="font-size-16 font-baloo text-center">
                                        SUB TOTAL
                                    </h5>
                                    <div class="text-center font-rale">
                                        <span class="text-success subTotal" data-id="<?php echo $item['id'] ?? 0; ?>"><strong><?php echo $item['unit_price'] ?? '0'; ?></strong></span>
                                    </div>
                                </div>
                                <!-- ----subtotal--- -->
                            </div>
                        </div>
                    </div>
            <?php

                    return $item['unit_price']; //return all the product prices using the $ItemTotals array
                }, $cartProduct);

            //loop through the products en return product with particular id
            endforeach;  //end for each loop
            ?>

            <!-- ----x-----cart item------x----- -->

            <!-- -------total------- -->
            <div class="col-sm-12 py-2">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <span class="font-baloo font-size-20 mx-2">Total: </span>
                            <span class="font-baloo font-size-20 mx-2" id="total_price"><?php echo isset($ItemTotals) ? $cart->getSum($ItemTotals) : 0;  ?></span>
                            <br />
                            <div class="font-rubik font-size-14 py-2">
                                <p>Local Delivery Fees not included yet</p>
                                <p>
                                    International Shipping & Customs Fees not included yet
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --x-----total-----x-- -->

            <!-- -------banner last -------- -->
            <div class="col-sm-12 my-2">
                <div class="row">
                    <div class="col-sm-6 ml-auto text-right">
                        <a href="index.php" class="btn color-black-bg text-light px-3 btn-lg change1">
                            Continue shopping
                        </a>
                        <button type="button" class="btn btn-outline-secondary text-dark text-light px-3 btn-lg change2">
                            Proceed to check out
                        </button>
                    </div>
                </div>
            </div>
            <!-- ----x---banner last -----x--- -->
        </div>
    </div>


</section>