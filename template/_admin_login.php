<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['login_btn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        if (!empty($username) && !empty($password)) {
            if ($user->getAdminName($username)) {
                //get user password that matches username in 0 index and the access the password
                $passFromDb = $user->getAdminPassword($username)[0]['password'];

                trim($passFromDb);
                if (password_verify($password, $passFromDb)) {
                    $_SESSION['admin'] = $username;
                    Redirect('AdminDashboard.php');
                } else {
                    $_SESSION['ErrorMessage'] = 'Enter a valid password';
                    Redirect('AdminLogin.php');
                }
            } else {
                $_SESSION['ErrorMessage'] = 'Username Doesnt Exist';
                Redirect('AdminLogin.php');
            }
        } else {
            $_SESSION['ErrorMessage'] = 'Username and Password Must be filled';
            Redirect('AdminLogin.php');
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
            <div class="col-sm-6 font-rale font-size-14 mb-5">
                <h5 class="font-rubik font-size-20 py-3">Admin Log In</h5>
                <!-- form -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row">
                        <!-- UserName -->
                        <div class="col-sm-12 my-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>

                        <!-- Password -->
                        <div class="col-sm-12 my-3">
                            <input type="text" class="form-control" placeholder="Password" name="password">
                        </div>

                    </div>
                    <!-- button -->
                    <button type="submit" class="btn color-black-bg text-light btn-lg btn-block p-2 my-2" name="login_btn">Login</button>
                </form>
                <!-- form -->



            </div>
        </div>
    </div>
    </div>
</section>