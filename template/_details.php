<?php

$user_id = $_SESSION['user_id'] ?? 8;

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {


//     if (isset($_POST['add_to_cart_btn'])) {

//         $product_id = $_POST['product_id'];

//         $data = ['product_id' => $product_id, 'user_id' => $user_id];

//         $cart->addToCart($data);

//         $_SESSION['SuccessMessage'] = "Product Has been Added to Cart";
//         Redirect('Cart.php');
//     } else {
//         Redirect('index.php');
//         $_SESSION['ErrorMessage'] = "Product Not Added to Cart";
//     }





//     //add item to wishlist
//     if (isset($_POST['back_to_shop'])) {
//         Redirect('index.php');
//     }
// }


/* fetch products from database wen */


$singleProduct = $product->displayProducts();
//get item id using get method from the clicked item and assign default value of id=1 if isset is empty
$id = $_GET['item_id'] ?? 1;








?>

<?php
foreach ($singleProduct as $row) :
    if ($row['id'] == $id) :
?>
        <section id="details" class="py-3 color-back">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 px-5">
                        <img src="./uploads/<?php echo $row['product_image'] ?? './assets/products/clothes/korea-2020-stadium-home-football-shirt-6lRTlG.jpg'; ?>" alt="" class="img-fluid" />
                        <!-- ----------buttons----------- -->
                        <!-- form -->
                        <form method="post">
                            <div class="form-row py-2 font-size-16 font-baloo">

                                <!-- hidden input field to capture product_id -->
                                <input type="hidden" name="product_id" value="<?php echo $row['id'] ?? 1; ?>">

                                <div class="col">
                                    <!-- add to cart btn -->

                                    <?php

                                    $itemsInCart = $cart->getCartData($table = 'cart', $user_id); // gets all the items already stored in the cart

                                    $cartIds = $cart->getCartId($itemsInCart) ?? []; //gets all ids of items alreday in cart
                                    //check if product id alreadry exists in array
                                    if (in_array($row['id'], $cartIds)) {
                                        echo ' <button type="submit" disabled class="btn btn-secondary form-control" >
                                        In Cart <i class="fas fa-cart-arrow-down"></i>
                                    </button>';
                                    } else {
                                        $id = $row['id'] ?? 1;
                                        echo "<button type='button' class='btn btn-danger form-control' name='add_to_cart_btn' id='add_to_cart_btn' data-id='$id' data-toggle='modal' data-target='#viewCartModal'>
                                        Add to Cart <i class='fas fa-cart-arrow-down'></i>
                                    </button>";
                                    }

                                    ?>

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
                                                        <h4 class="text-success">Item Added to cart Successfully</h4>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="col-sm-6"><button class="btn btn-danger form-control" data-dismiss="modal">Continue Shopping</button></div>
                                                        <div class="col-sm-6"><a href="Cart.php" class="btn color-black-bg form-control text-light">View Cart</a></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- view cart modal -->




                                    <!--x add to cart btn x-->
                                </div>
                                <div class="col">
                                    <a href="index.php" class="btn color-black-bg form-control text-light" name="back_to_shop">
                                        Back To Shop
                                    </a>
                                </div>

                            </div>
                        </form>
                        <!-- form -->

                        <!-- ----------buttons----------- -->
                    </div>
                    <div class="col-sm-6 mt-5 px-5">

                        <h5 class="font-baloo font-size-20"><?php echo $row['product_name'] ?? 'Product Name'; ?></h5>
                        <small>By <?php echo $row['brand'] ?? 'Brand'; ?> </small>
                        <hr />
                        <h5 class="font-baloo font-size-16">
                            DVD Player Multiple Playback 15W With Remote Controller
                            Multi-angle Viewing USB
                        </h5>
                        <p class="font-rale font-size-14">
                            Brand
                            <a href="#"><?php echo $row['brand'] ?? 'Brand'; ?> | &nbsp;
                                <a href="#">Similar Products from Generic</a></a>
                        </p>
                        <hr />
                        <!-- --------price--------- -->
                        <table class="my-3">
                            <tr class="font-rale font-size-16">
                                <td class="px-3">Original Price</td>
                                <td class="px-3 text-danger"><strike>USD $ <?php echo $row['unit_price'] ?? '0'; ?></strike></td>
                            </tr>
                            <tr class="font-rale font-size-16">
                                <td class="px-3">New Price</td>
                                <td class="px-3">
                                    <strong>USD $<?php echo $row['unit_price'] ?? '0'; ?></strong>
                                    <span class=""> &nbsp; &nbsp; -10%</span>
                                </td>
                                <td class="px-3">
                                    Save : <span class="text-danger"> USD $100</span>
                                </td>
                            </tr>
                            <tr class="font-rale font-size-16">
                                <td class="px-3">Tax</td>
                                <td class="px-3">
                                    <strong>USD $10</strong>
                                </td>
                            </tr>
                        </table>
                        <!-- ---x-----price-------x-- -->
                        <hr />
                        <p class="font-rale font-size-16 p-2">
                            Free <strong>Shipping</strong> above
                            <strong>5 purchases</strong>
                        </p>
                        <hr />

                        <!-- -----remaining stock btn--- -->
                        <h5 class="font-baloo font-size-16">Remaining in Stock</h5>
                        <div class="dropdown py-2">
                            <button id="rem-stock" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Check Stock
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" disabled><?php echo $row['in_stock'] ?? 0; ?> items remaining</a>
                            </div>
                        </div>
                        <!-- --x---remaining stock btn---x -->
                        <hr />

                        <!-- -------social media--------- -->
                        <p class="font-baloo font-size-16">
                            Promotion : &nbsp;
                            <span class="font-rale">Share Product On SocialMedia and Stand a chance to win</span>
                        </p>
                        <div class="d-flex">
                            <span><a href="#"><i class="fab fa-facebook font-size-20 px-3 color-black"></i></a></span>
                            <span><a href="#"><i class="fab fa-instagram-square font-size-20 px-3 color-black"></i></a></span>
                        </div>
                        <!-- ----x---social media-----x---- -->
                    </div>

                    <!--   --------other details --------- -->
                    <div class="col-sm-12 py-5">
                        <h6 class="font-baloo font-size-20">Product Description</h6>
                        <hr />
                        <div class="py-2 font-rale font-size-14">
                            <h5>Features</h5>
                            <p>
                                <?php echo $row['product_details'] ?? 'No product Details Avaliable'; ?>
                            </p>
                            <h5>Specifications</h5>
                            <p>
                                <?php echo $row['product_specification'] ?? 'No product Specifications Avaliable'; ?>
                            </p>
                        </div>
                    </div>
                    <!------x----other details --------x- -->
                </div>
            </div>
        </section>

<?php
    endif;
endforeach; //end of foreach 
?>