<?php
include_once "../config/core.php";

$page_title = "Login";

if($_POST){
    include_once "../services/simpleServices/SimpleUserServices.php";

    $sevices = new SimpleUserServices();

    // check if email and password are in the Database
    $email=$_POST['email'];

    $email_exists = $sevices->CheckEmailExists($email);

    $password = $_POST['password'];

    $user = $sevices->ReadUserByEmail($email);

    //$user->setStatus(1);
    //if ($email_exists && password_verify($_POST['password'], $user->getPassword()) && $user->getStatus()){

    // validate login
    if ($email_exists && password_verify($_POST['password'], $user->getPassword()) && $user != null && $user->getStatus()) {

        // if it is, set the session value to true
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['access_level'] = $user->getAccessLevel();
        $_SESSION['firstname'] = htmlspecialchars($user->getFirstName(), ENT_QUOTES, 'UTF-8') ;
        $_SESSION['lastname'] = $user->getLastName();

        // if access level is 'Admin', redirect to admin section
        if($user->getAccessLevel()=='Admin'){
            header("Location: {$home_url}admin/index.php?action=login_success");
        }

        // else, redirect only to 'Customer' section
        elseif($user->getAccessLevel() == 'Customer')
        {
            header("Location: {$home_url}index.php?action=login_success");
        }
    }

    // if username does not exist or password is wrong
    else{
        header("Location: {$home_url}auth/login.php?action=incorrect");
    }
}

include_once "../logreg-header.php";
echo "<div class='gradient-body'>";
echo "<div class='middle-container'>";
//echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";

// get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";

// tell the user he is not yet logged in
if($action =='not_yet_logged_in'){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
}

// tell the user to login
else if($action=='please_login'){?>
    <script type="text/javascript">
        swal({title:'Access Denied', text:'Please login to access that page!', type:'warning'});
    </script> <?php

}

// tell the user email is verified
else if($action == 'email_verified'){
    echo "<div class='alert alert-success'>
        <strong>Your email address have been validated.</strong>
    </div>";
}

// tell the user if access denied
if($action == 'incorrect'){?>
    <script type="text/javascript">
        swal({title:'Access Denied', text:'Your username or password maybe incorrect!', type:'warning'});
    </script> <?php

}

echo "<form class='form' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
echo "<img class='logo' src='../images/logo.png'>"; //Login Logo
echo "<h1>Login</h1>";
echo "<div class='text'>";
echo "<input type='text' name='email' required autofocus />";
echo "<span data-placeholder='Email'></span>";
echo "</div>";
echo "<div class='text'>";
echo "<input type='password' name='password'required />";
echo "<span data-placeholder='Password'></span>";
echo "</div>";
echo "<input type='submit' class='button' value='Log In' />";
echo "<div class='bottom-text'>";
echo "Don't have account? <a href='register.php'>Sign up</a> <br />";
echo "<a href='../index.php'>Back to home</a>";
echo "</div>";
echo "</form>";

include_once "../footer.php";
