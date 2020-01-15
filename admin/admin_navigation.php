<nav>
    <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Boski</a>
    <ul class="menu">
        <li><a href="<?php echo $home_url; ?>admin/index.php">Boski</a>

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
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user"></i>
                &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                &nbsp;&nbsp;<span class="caret"></span>
            </a><ul class="sub-menu">
                <li><a href="<?php echo $home_url; ?>auth/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>