<?php
if (isset($_POST['edit_user_btn'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $$email = $_POST['email'];

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
                                                    $password = password_hash($password, PASSWORD_BCRYPT);
                                                    $data = ['firstname' => $firstName, 'lastname' => $lastName, 'username' => $userName, 'password' => $password, 'email' => $email, 'datetime' => $dateTime];
                                                    $user->editUserInfo($data, $id);
                                                    $_SESSION['SuccessMessage'] = "Account Created successfully";
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



?>

<div class="col-lg-8 border">
    <div class="row">

        <div class="col">
            <h5 class="font-rale">Edit Account Details</h5>
            <br>
            <!-- form -->
            <?php
            $user_id = $_SESSION['user_id'];
            $user_array = $user->getSingleUserInformation('users', $user_id);

            foreach ($user_array as $row) :
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?? 0; ?>">
                        <!-- first Name -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="First name" name="firstname" value="<?php echo $row['firstname'] ?? 'First Name'; ?>">
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Last name" name="lastname" value="<?php echo $row['lastname'] ?? 'Last Name'; ?>">
                        </div>
                        <!-- UserName -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $row['username'] ?? 'UserName'; ?>">
                        </div>
                        <!-- Password -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $row['password'] ?? 'Password'; ?>">
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 my-3">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email'] ?? 'Email'; ?>">
                        </div>

                    </div>
                    <!-- button -->
                    <button type="button" class="btn color-black-bg text-light btn-lg btn-block p-2 my-2" name="edit_user_btn">Save Changes</button>
                </form>
            <?php endforeach; ?>
            <!-- form -->
        </div>
    </div>
</div>