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
<nav>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Boski</a>
    <ul class="menu">
        <li><a class="homer" href="<?php echo $home_url; ?>">Boski</a>

        </li>
        <?php foreach ($categories as $category) { ?>
            <li>
                <a href='<?php echo $home_url; ?>index.php?category=<?= $category['category'] ?>'><?= $category['category'] ?></a>
            </li>
        <?php } ?>

        <?php

        // check if users / customer was logged in
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['access_level'] == 'Customer') {
        ?>
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
                </a><ul class="sub-menu">
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
            <?php
            } elseif (false) {

            } // if user was not logged in, show the "login" and "register" options
            else {
                ?>
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
                <?php
            }
            ?>

    </ul>
</nav>