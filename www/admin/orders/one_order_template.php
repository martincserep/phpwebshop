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
        <div class="personal-info" role="form">
            <h1>Customer info</h1>
            <div class="customer-detail-row">
                <label class="customer-label">First name:</label>
                    <p class="customer-info"><?= $user->getFirstName() ?></p>
            </div>
            <div class="customer-detail-row">
                <label class="customer-label">Last name:</label>
                    <p class="customer-info"><?= $user->getLastName() ?></p>
            </div>
            <div class="customer-detail-row">
                <label class="customer-label">Contact number:</label>
                    <p class="customer-info"><?= $user->getContactNumber() ?></p>
            </div>
            <div class="customer-detail-row">
                <label class="customer-label">Email:</label>
                    <p class="customer-info"><?= $user->getEmail() ?></p>
            </div>
            <div class="customer-detail-row">
                <label class="customer-label">Address:</label>
                    <p class="customer-info"><?= $user->getAddress() ?></p>
            </div>
        </div>
        <h1 class="ordered-h1">Ordered items</h1>
        <?php
        $total = 0;
        $item_count = 0;
        $row_count = 0;
        ?>
        <div class="list">
            <ul>
                <li class="list-header">
                    <span class="li-row-count">#</span>
                    <span class="li-name">Name</span>
                    <span class="li-quantity">Piece</span>
                    <span class="li-price">Price</span>

                </li>
            </ul>
            <ul>
            <?php foreach ($cart_items as $id => $value) {

                $quantity = $cart_items[$id]['quantity'];
                $row_count += 1;
                $cart_product = $product_srv->ReadOne($id);
                $name = $cart_product->getName();
                $price = $cart_product->getPrice();
                $sub_total = $price * $quantity; ?>

                <li class="list-item">
                    <span class="li-row-count"><?= $row_count ?></span>
                    <span class="li-name"><?= $name ?></span>
                    <span class="li-quantity"><?= $quantity ?></span>
                    <span class="li-price"><?php echo "&#36;" . number_format($price, 2, '.', ','); ?></span>
                </li>
                <?php
                $item_count += $quantity;
                $total += $sub_total;
            } ?>

        <div class='total-count-box'>
            <div>
                <p class='col-md-8 pull-right'>Total (<?= $item_count ?> items)</p>
                <br>
                <?php echo "<p class='col-md-8 pull-right'>&#36;" . number_format($total, 2, '.', ',') . "</p>" ?>
            </div>
            <div>
                <a href="accept_order.php?action=order_processed&id=<?= $order_id ?>"
                   class="<?= $block_button ?> btn btn-success"><i class="fas fa-check"></i></a>
                <a href="orders.php" class="btn btn-default"><i class="fas fa-undo-alt"></i></a>
            </div>
        </div>

