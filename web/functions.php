<?php

/* redirect use to a location */
function Redirect($new_location)
{
    header("Location:" . $new_location);
    exit;
}


/* session messages */

//errors
function ErrorMessage()
{
    if (isset($_SESSION['ErrorMessage'])) {
        $output = "<div class=\"alert alert-danger p-1\">";
        $output .= htmlentities($_SESSION['ErrorMessage']);
        $output .= "</div>";

        $_SESSION['ErrorMessage'] = null;

        return $output;
    }
}


//success
function SuccessMessage()
{
    if (isset($_SESSION['SuccessMessage'])) {
        $output = "<div class=\"alert alert-success p-1\">";
        $output .= htmlentities($_SESSION['SuccessMessage']);
        $output .= "</div>";

        $_SESSION['SuccessMessage'] = null;
        return $output;
    }
}
//sesssion message for username
function UserName()
{
    if (isset($_SESSION['UserName'])) {
        $output = "<span class=\" text-danger p-1\" >";
        $output .= htmlentities($_SESSION['UserName']);
        $output .= "</span>";

        $_SESSION['UserName'] = null;
        return $output;
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function Confirm_Login()
{
    if (isset($_COOKIE['USID'])) {
        return true;
    } else {

        Redirect('Login.php');
    }
}
