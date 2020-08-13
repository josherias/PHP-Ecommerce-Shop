<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['login_btn'])) {
        $userName = $_POST['username'];
        $password = $_POST['password'];


        if ($user->getUserName($userName)) {
            //get user password that matches username in 0 index and the access the password
            $passFromDb = $user->getUserPassword($userName)[0]['password'];
            trim($passFromDb);
            if (password_verify($password, $passFromDb)) {
                //generate tokens using the function open ssl with 64 bytes to be generated
                //number - length of desired string of bytes
                // true - if shud be cryptographically secure
                //bin2hex() converts it to hexa value for storage in db
                $cstrong = true; //cryptographically strong
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

                //hash the token before storing t into database 
                //store  user id and token into database
                $user_id = $user->getUserId($userName)[0]['id'];
                $data = ['token' => sha1($token), 'user_id' => $user_id];
                $user->AddUserToken($data);

                //set cookiee that stores the token that will log the user in
                //(token name,expiryTime,pathtobesetevrywhere,domain,secure,httponly)
                setcookie("USID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);

                //crete a second cookie that will last 3 days and wen it expires, user will be looged out and request server for another login cookie and deleete old one
                //and user will only be able to use the USID if second cookie is valid
                setcookie("USID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                Redirect('Dashboard.php');
            } else {
                $_SESSION['ErrorMessage'] = 'Enter a valid password';
            }
        } else {
            $_SESSION['ErrorMessage'] = 'Username Doesnt Exist';
        }
    }
}



?><section id="login" class="my-5">
    <div class="container my-4">
        <!-- ---------- alert--------------- -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>

        <!-- ---------- alert--------------- -->
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-6 font-rale font-size-14">
                <h5 class="font-rubik font-size-20 py-3">Log In</h5>
                <!-- form -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row">
                        <!-- UserName -->
                        <div class="col-sm-12 my-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>

                        <!-- Password -->
                        <div class="col-sm-12 my-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                    </div>
                    <!-- button -->
                    <button type="submit" class="btn color-black-bg text-light btn-lg btn-block p-2 my-2" name="login_btn">Login</button>
                </form>
                <!-- form -->

                <!-- already -->
                <div class="text-center my-4">
                    <p>Dont Have have An Account ??</p>
                    <p><a href="createAccount.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>