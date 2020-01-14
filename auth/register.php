<?php
// core configuration
use MongoDB\BSON\Timestamp;

include_once "../config/core.php";

// set page title
$page_title = "Register";

// include classes
include_once '../services/simpleServices/SimpleUserServices.php';
$sevices = new SimpleUserServices();
include_once "../libs/php/utils.php";

// include page header HTML
include_once "../logreg-header.php";

?>
        <form class="form" action='register.php' method='post' id='register'>
            <img class='logo' src='../images/logo.png'>
            <h1>Login</h1>
            <div class='text'>
                <input type='text' name='firstname' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" />
                <span data-placeholder='First name'></span>
            </div>
            <div class='text'>
                <input type='text' name='lastname' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" />
                <span data-placeholder='Last name'></span>
            </div>
            <div class='text'>
                <input type='text' name='contact_number' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" />
                <span data-placeholder='Contact Number'></span>
            </div>
            <div class='text'>
                <input name='address' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></input>
                <span data-placeholder='Address'></span>
            </div>
            <div class='text'>
                 <input type='email' name='email' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" />
                <span data-placeholder='Email'></span>
            </div>
            <div class='text'>
                    <input type='password' name='password' required id='passwordInput'>
                <span data-placeholder='Password'></span>
            </div>
            <input type='submit' class='button' value='Sign Up' />
            <div class='bottom-text'>
                Already have account? <a href='login.php'>Log in</a> <br />
                <a href='../index.php'>Back to home</a>
            </div>
        </form>

<?php

// if form was posted
if($_POST){

    $utils = new Utils();

    // set user email to detect if it already exists
    $email=$_POST['email'];

    // check if email already exists
    if($sevices->CheckEmailExists($email)){
        echo "<div class='alert alert-danger'>";
        echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
        echo "</div>";
    }

    else{
        // set values to object properties
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $access_level = 'Customer';
        $status = 1;
        $created_at = date('Y-m-d H:i:s');
        $sevices->AddUser($firstname, $lastname, $email, $contact_number, $address,
            $password, $access_level, null, $sevices, $created_at);
        $isItCreated = true;
// create the user
        if($isItCreated){

            echo "<div class='alert alert-info'>";
            echo "Successfully registered. <a href='{$home_url}/auth/login'>Please login</a>.";
            echo "</div>";

            // empty posted values
            $_POST=array();

        }else{
            echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
            echo "</div>";
        }
    }
}
// include page footer HTML
include_once "../footer.php";
?>