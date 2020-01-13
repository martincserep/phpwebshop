<!-- navbar -->
<div class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation">
    <div class="container-fluid">

        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo $home_url; ?>admin/index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="<?php echo $home_url; ?>admin/products/create_product.php"><i class="fa fa-plus-square"></i> Add product</a>
                </li>
                <li>
                    <a href="<?php echo $home_url; ?>admin/users/read_users.php"><i class="fa fa-users"></i> Users</a>
                </li>
                <li>
                    <a href="<?php echo $home_url; ?>admin/orders/orders.php"><i class="fa fa-paste"></i> Orders</a>
                </li>
            </ul>

            <!-- options in the upper right corner of the page -->
            <ul class="nav navbar-nav navbar-right navbar-inverse">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                        &nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- log out user -->
                        <li><a href="<?php echo $home_url; ?>auth/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div><!--/.nav-collapse -->

    </div>
</div>
<!-- /navbar -->