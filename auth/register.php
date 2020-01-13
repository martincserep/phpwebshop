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
include_once "../header.php";

// code when form was submitted will be here
?>
    <div class="list-border-background">
        <form action='register.php' method='post' id='register'>

            <table class='table table-responsive'>

                <tr>
                    <td class='width-30-percent'>Firstname</td>
                    <td><input type='text' name='firstname' class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
                </tr>

                <tr>
                    <td>Lastname</td>
                    <td><input type='text' name='lastname' class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td><input type='text' name='contact_number' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" /></td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td><textarea name='address' class='form-control' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> Register
                        </button>
                    </td>
                </tr>

            </table>
        </form>

    </div>
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
            echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
            echo "</div>";

            // empty posted values
            $_POST=array();

        }else{
            echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
        }
    }
}
// include page footer HTML
include_once "../footer.php";
?>