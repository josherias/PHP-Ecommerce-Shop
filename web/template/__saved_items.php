<?php
$user_id = $_SESSION['user_id'] ?? 0;
$cartData = $cart->getCartData('wishlist', $user_id); //get items from wishlist
?>
<div class="col-lg-8 border">
    <div class="row">
        <div class="col">
            <h5 class="font-rale mb-2">WishList</h5>
            <table class="table m-2 font-rale">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>

                    </tr>
                </thead>
                <?php
                $srNo = 0;
                foreach ($cartData as $row) :
                    //select data from products where id equals to the product ids stored in the cart
                    $cartProduct = $product->displaySingleProduct($table = 'products', $row['product_id']);
                    $srNo += 1;
                    array_map(function ($item) use ($srNo) {


                ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $srNo ?? 1; ?></th>
                                <td><?php echo $item['product_name'] ?? 'product Name'; ?></td>
                                <td><img src="./uploads/<?php echo $item['product_image'] ?? 'product image'; ?>" alt="" style="width: 50px; height:50px;"></td>

                            </tr>
                        </tbody>
                <?php }, $cartProduct); //end array map function
                endforeach;  //ens for each loop 
                ?>
            </table>
        </div>

    </div>
</div>