<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['create_user_btn'])) {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $currentTime = time();
        $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

        //form validation
        if (!empty($firstName)) {
            if (!empty($lastName)) {
                if (!empty($userName)) {
                    if (!empty($password)) {
                        if (!empty($email)) {
                            if (strlen($userName) >= 3 && strlen($userName) <= 32) {
                                if (preg_match("/[a-zA-Z0-9 ]+/", $userName)) {
                                    if (preg_match("/[a-zA-Z ]+/", $firstName)) {
                                        if (preg_match("/[a-zA-Z ]+/", $lastName)) {
                                            if (preg_match("/[a-zA-Z)0-9 ]+/", $password)) {
                                                if (strlen($password) >= 8 && strlen($password <= 32)) {
                                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                        if (!$user->getUserName($userName)) {
                                                            //prevent email duplicates
                                                            if (!$user->getUserEmail($email)) {
                                                                $password = password_hash($password, PASSWORD_BCRYPT);
                                                                $data = ['firstname' => $firstName, 'lastname' => $lastName, 'username' => $userName, 'password' => $password, 'email' => $email, 'datetime' => $dateTime];
                                                                $user->AddUser($data);
                                                                $_SESSION['SuccessMessage'] = "Account Created successfully";
                                                            } else {
                                                                $_SESSION['ErrorMessage'] = 'Email already is in Use';
                                                            }
                                                        } else {
                                                            $_SESSION['ErrorMessage'] = 'Username Already Exists, Select Another one';
                                                        }
                                                    } else {
                                                        $_SESSION['ErrorMessage'] = 'Please Enter Valid Email Address';
                                                    }
                                                } else {
                                                    $_SESSION['ErrorMessage'] = 'Password Should Have atleast 8 letters';
                                                }
                                            } else {
                                                $_SESSION['ErrorMessage'] = 'Password Should be contain only alphanumerics';
                                            }
                                        } else {
                                            $_SESSION['ErrorMessage'] = 'Last Name Should Contain only Characters';
                                        }
                                    } else {
                                        $_SESSION['ErrorMessage'] = 'First Name Should Contain only Characters';
                                    }
                                } else {
                                    $_SESSION['ErrorMessage'] = 'Invalid Username';
                                }
                            } else {
                                $_SESSION['ErrorMessage'] = 'Username should be greater than 3 characters';
                            }
                        } else {
                            $_SESSION['ErrorMessage'] = 'Email is required';
                        }
                    } else {
                        $_SESSION['ErrorMessage'] = 'Password is required';
                    }
                } else {
                    $_SESSION['ErrorMessage'] = 'UserName is required';
                }
            } else {
                $_SESSION['ErrorMessage'] = 'Last Name is required';
            }
        } else {
            $_SESSION['ErrorMessage'] = 'First Name is required';
        }
    }
}
?>

<section id="create_account" class="my-5">
    <div class="container my-4">
        <!-- ---------- alert--------------- -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>

        <!-- ---------- alert--------------- -->
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-8 font-rale font-size-14">
                <h5 class="font-rubik font-size-20 py-3">Create Account</h5>
                <!-- form -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row">
                        <!-- first Name -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="First name" name="firstname">
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Last name" name="lastname">
                        </div>
                        <!-- UserName -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <!-- Password -->
                        <div class="col-sm-6 my-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>

                        <!-- <input type="hidden" class="form-control" name="role" value="user"> -->

                    </div>
                    <!-- button -->
                    <button type="submit" class="btn color-black-bg text-light btn-lg btn-block p-2 my-2" name="create_user_btn">Create Account</button>
                </form>
                <!-- form -->
                <!-- already -->
                <div class="text-center my-4">
                    <p>Already have An Account ??</p>
                    <p><a href="Login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>