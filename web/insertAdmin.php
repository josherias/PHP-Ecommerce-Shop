<?php
session_start();
/* require all the class instances in one file */
require_once('./classInstances.php');

/* require all the functions in one file */
require_once('./functions.php');

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username)) {
        if (!empty($password)) {
            if (preg_match("/[a-zA-Z0-9 ]+/", $username)) {
                if (preg_match("/[a-zA-Z)0-9 ]+/", $password)) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $data = ['username' => $username, 'password' => $password];
                    $user->AddAdmin($data);
                } else {
                    echo  "<p class=\"alert alert-danger p-1\">Password Should contain only Alphanumerals</p>";
                }
            } else {
                echo  "<p class=\"alert alert-danger p-1\"> Username Should contain only Alphanumerals</p>";
            }
        } else {
            echo  "<p class=\"alert alert-danger p-1\"> Password is required</p>";
        }
    } else {
        echo  "<p class=\"alert alert-danger p-1\"> Username Should not be empty</p>";
    }


    $output = "<p class=\"alert alert-success p-1\"> Admin Added successfuly</p>";

    echo $output;
} else {
    echo  $output = "<p class=\"alert alert-danger p-1\"> Not Inserted </p>";
}
