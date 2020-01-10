<?php
include_once "services/simpleServices/SimpleProductServices.php";

$product_srv = new SimpleProductServices();

$categories = $product_srv->ReadAllCategories();
// if cart not empty
if (isset($_SESSION['cart']) && $_SESSION['cart'] != 0){
    $href = "#";
    $id_name = "logout";
} else {
    $href = "auth/logout.php";
    $id_name = "";
}

?>

<!-- navbar -->
<div class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation"
     style="background-color: -moz-mac-accentdarkshadow; margin-bottom: 0">
    <div class="container-fluid">

        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $home_url; ?>">Boski</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo $home_url; ?>" role="button"><i class="fa fa-home"></i> Home</a>
                </li>
<!--                <li>
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-list"></i> Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">-->
                        <!-- create categories drop down menu-->
                        <?php foreach ($categories as $category) { ?>
                            <li>
                                <a href='<?php echo $home_url; ?>index.php?category=<?= $category['category'] ?>'><?= $category['category'] ?></a>
                            </li>
                        <?php } ?>
<!--                        <li><a href='<?php /*echo $home_url; */?>index.php?category='>All</a></li>
                    </ul>
                </li>
            </ul>-->

            <?php

            // check if users / customer was logged in
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['access_level'] == 'Customer') {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $home_url; ?>cart/cart.php">
                            <i class="fa fa-shopping-cart"></i> Cart
                        </a>
                    </li>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                            &nbsp;&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo $home_url; ?>profile.php"><i class="fa fa-cog"></i> Profile</a></li>
                            <li><a href="<?php echo $href ?>" id="<?php echo $id_name ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#logout").click(function () {

                                        swal({
                                            title: 'Warning!',
                                            text: "If you log out, your cart will be lost!",
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, log out!'
                                        })
                                            .then((result) => {
                                                if (result.value) {
                                                    window.location.href = '<?php echo $home_url; ?>auth/logout.php', {
                                                        icon: 'success',
                                                    }
                                                }
                                            });

                                    });
                                });
                            </script>
                        </ul>
                    </li>
                </ul>
                <?php
            } elseif (false) {

            } // if user was not logged in, show the "login" and "register" options
            else {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $home_url; ?>cart/cart.php">
                            <i class="fa fa-shopping-cart"></i> Cart
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $home_url; ?>auth/login.php">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo $home_url; ?>auth/register.php">
                            <i class="fa fa-user-plus"></i> Register
                        </a>
                    </li>
                </ul>
                <?php
            }
            ?>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- /navbar -->
