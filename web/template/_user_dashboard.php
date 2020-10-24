<?php
Confirm_Login();
if (isset($_COOKIE['USID'])) {
    $Usertoken = $_COOKIE['USID'];
    $user_id = $user->getUserIdWithToken(sha1($Usertoken))[0]['user_id'] ?? 0;
    //session to store the user id
    $_SESSION['user_id'] = $user_id;


    if ($user->isLoggedIn($user_id)) {
        //fetch logged users username

        $username = $user->getUserNameById($user_id)[0]['username'];
        $_SESSION['UserName'] = $username;
    } else {
        Redirect('Login.php');
    }
} else {
    Redirect('Login.php');
    $_SESSION['ErrorMessage'] = 'Login With Correct Information';
}

if (isset($_POST['logout'])) {
    $_SESSION['ErrorMessage'] = 'Account Logged Out SuccessFully';

    $user_id = $user->getUserIdWithToken(sha1($Usertoken))[0]['user_id'];

    $user->deleteOldUserToken($user_id);
    setcookie('USID', '', time() - 3600);
    setcookie('USID_', '', time() - 3600);

    session_destroy();
    unset($_SESSION['user_id']);
    Redirect('Login.php');
}
?>



<section id="dashboard" class="my-5">
    <div class="container">
        <!-- ---------- alert--------------- -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>

        <!-- ---------- alert--------------- -->
        <div class="row align-items-center justify-content-center">

            <div class="col-sm-10">
                <h2 class="font-size-18 font-rale">Logged In as <?php echo UserName(); ?></h2>
                <div class="row my-5">
                    <!-- side bar -->
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                My Account
                            </div>
                            <ul class="list-group list-group-flush navbar-nav mr-auto">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <li class="list-group-item border-0 nav-item">
                                        <button type="submit" name="order" class=" btn btn-link font-rubik nav-link"><i class="far fa-money-bill-alt mx-3"></i> Orders</button>
                                    </li>

                                    <li class="list-group-item border-0 nav-item">
                                        <button type="submit" name="saved" class=" btn btn-link font-rubik nav-link"><i class="far fa-heart mx-3"></i> Saved Items</button>
                                    </li>

                                    <li class="list-group-item border-0 nav-item">
                                        <button type="submit" name="cart" class=" btn btn-link font-rubik nav-link"> <i class="fas fa-cart-plus mx-3"></i> My Cart</button>
                                    </li>


                                    <li class="list-group-item border-0 nav-item">
                                        <button type="submit" name="edit_user" id="edit_user" data-id="<?php echo $_SESSION['user_id']; ?>" class="btn btn-link font-rubik nav-link"><i class="fas fa-user-edit mx-3"></i> Edit User Info</button>
                                    </li>

                                    <li class="list-group-item border-0 nav-item">
                                        <button type="submit" name="logout" class="btn btn-link font-rubik text-danger nav-link"> <i class="fas fa-sign-out-alt mx-3"></i> Log Out</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <!-- side bar -->
                    <!-- right-->

                    <?php

                    if (isset($_POST['order'])) {
                        //__oder_details.php file
                        include('__order_detail.php');
                    } elseif (isset($_POST['saved'])) {
                        //__saved_items.php file
                        include('__saved_items.php');
                    } elseif (isset($_POST['cart'])) {
                        //__cart_items.php file
                        include('__cart_items.php');
                    } elseif (isset($_POST['edit_user'])) {
                        //edit_user_Info.php file
                        include('__edit_user_Info.php');
                    }
                    ?>


                    <!-- right bar -->
                </div>
            </div>
        </div>
    </div>
</section>