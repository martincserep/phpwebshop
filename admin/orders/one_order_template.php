<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
global $order_id;
include_once "../../services/simpleServices/SimpleOrderServices.php";
include_once "../../services/simpleServices/SimpleUserServices.php";
include_once "../../services/simpleServices/SimpleProductServices.php";


$order_srv = new SimpleOrderServices();
$user_srv = new SimpleUserServices();
$product_srv = new SimpleProductServices();

// processing order
$current_order = $order_srv->ReadOneById($order_id);
$order_id = $current_order->getId();
$user_id = $current_order->getUserId();
$cart_items = json_decode($current_order->getCartItems(), true);
$status = $current_order->getStatus();
$order_date = $current_order->getCreatedAt();
$user = $user_srv->ReadUserById($user_id);
$block_button = ($status == "processed") ? "disabled" : "";

?>
<!--user details-->
<div class="container padding-bottom list-border-background width-70-percent">
    <div class="personal-info">
        <div class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                    <p class="form-control"><?= $user->getFirstName() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                    <p class="form-control"><?= $user->getLastName() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Contact number:</label>
                <div class="col-lg-8">
                    <p class="form-control"><?= $user->getContactNumber() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <p class="form-control"><?= $user->getEmail() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Address:</label>
                <div class="col-md-8">
                    <p class="form-control"><?= $user->getAddress() ?></p>
                </div>
            </div>
        </div>
        <h1>Items</h1>
        <?php
        $total = 0;
        $item_count = 0;
        $row_count = 0;
        ?>
        <table class='table table-striped table-responsive-md btn-table table-hover'>
            <!--create headers-->
            <thead>
            <tr>
                <th><strong>#</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Piece</strong></th>
                <th><strong><span class="pull-right">Price</span></strong></h4></th>
            </tr>
            </thead>
            <!--read items from order-->

            <?php foreach ($cart_items as $id => $value) {

                $quantity = $cart_items[$id]['quantity'];
                $row_count += 1;
                $cart_product = $product_srv->ReadOne($id);
                $name = $cart_product->getName();
                $price = $cart_product->getPrice();
                $sub_total = $price * $quantity; ?>

                <tr>
                    <td><?= $row_count ?></td>
                    <td><?= $name ?></td>
                    <td><?= $quantity ?></td>
                    <td class="pull-right"><?php echo "&#36;" . number_format($price, 2, '.', ','); ?></td>
                </tr>
                <?php
                $item_count += $quantity;
                $total += $sub_total;
            } ?>
            <!--end of foreach-->
        </table>
        <hr class='style1'>
        <!--Show total price and save button-->
        <div class=''></div>
        <div class='pull-right'>
            <div>
                <p class='col-md-8 pull-right'>Total (<?= $item_count ?> items)</p>
                <br>
                <?php echo "<p class='col-md-8 pull-right'>&#36;" . number_format($total, 2, '.', ',') . "</p>" ?>
            </div>
            <div>
                <a href="accept_order.php?action=order_processed&id=<?= $order_id ?>"
                   class="<?= $block_button ?> btn btn-success">Accept order</a>
                <a href="orders.php" class="btn btn-default">Cancel</a>
            </div>
        </div>

    </div>
</div>
<div class='margin-top-40'>
    <br><br>
</div>;

