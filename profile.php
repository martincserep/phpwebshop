<?php
// core configuration
include_once "config/core.php";

include_once "header.php";

include_once "services/simpleServices/SimpleUserServices.php";

// set page title
$page_title = "Profile";

$action = isset($_GET['action']) ? $_GET['action'] : "";

if($action == 'pw_updated'){?>
    <script type="text/javascript">
        swal({title:'Updated', text:'Passwords has been updated!', type:'info', timer:1700});
    </script> <?php
}

$user_id = $_SESSION['user_id'];

$user_srv = new SimpleUserServices();

$user = $user_srv->ReadUserById($user_id);
?>
    <div class="form-horizontal list-border-background width-60-percent" role="form">
        <form action="update_user_data.php?id=<?= $user_id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                    <input type="text" name="firstName" class="form-control" value="<?= $user->getFirstName() ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                    <input type="text" name="lastName" class="form-control" value="<?= $user->getLastName() ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Contact number:</label>
                <div class="col-lg-8">
                    <input type="text" name="contactNumber" class="form-control"
                           value="<?= $user->getContactNumber() ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input type="email" name="email" class="form-control" value="<?= $user->getEmail() ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Address:</label>
                <div class="col-md-8">
                    <input type="text" name="address" class="form-control" value="<?= $user->getAddress() ?>" required>
                </div>
            </div>
            <br><br>
            <div class="mdi-format-align-middle">
                <button type="submit" class="btn btn-info">
                    Update your details
                </button>
                <a href="change_password.php?user_id=<?= $user_id ?>" class="btn btn-info">
                    Change password
                </a>
                <a href="index.php" class="btn btn-success">
                    Back
                </a>
            </div>
        </form>
    </div>

<?php

include_once "footer.php";