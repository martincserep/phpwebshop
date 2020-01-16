<?php
// core configuration
include_once "config/core.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

// set page title
$page_title = "Change Password";
// include page header HTML

include_once "header.php";

// alert if passwords do not match
if($action == 'pw_not_match'){?>
    <script type="text/javascript">
        swal({title:'Warning', text:'Passwords do not match!', type:'warning', timer:1700});
    </script> <?php
}

$user_id = $_SESSION['user_id'];

?>
        <form class="middle-container" action="update_password_in_db.php?id=<?= $user_id ?>" method="post" enctype="multipart/form-data">
            <div class="update-profile">
                <h1>Change password</h1>
                    <div class="col-md-8">
                        <input placeholder="New Password" type="password" name="new_pw" class="profile-input" value="" required>
                    </div>
                <div class="form-group">
                        <input placeholder="Confirm Password" type="password" name="confirm_pw" class="profile-input" value="" required>
                </div>
                <br><br>
                <div class="mdi-format-align-middle">
                    <button type="submit" class="button">
                        Save new password
                    </button>
                    <a href="profile.php?user_id=<?= $user_id ?>" class="cancel">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

<?php
include_once "footer.php";
