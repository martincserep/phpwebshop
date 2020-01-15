<?php
include_once "../../services/simpleServices/SimpleOrderServices.php";

$services = new SimpleOrderServices();

$ordersList = $services->ReadAllOrders();
?>
<div class="list">
    <ul>
        <li class="list-header">
        <span class="li-row-count">#</span>
        <span class="li-id">Order Id</span>
        <span class="li-id">User Id</span>
        <span class="li-price">Status</span>
        <span class="li-name">Date</span>
        <span class="li-name">Actions</span>

        </li>
    </ul>
        <ul>
        <?php
        $row_count = 0;
        foreach ($ordersList as $order) {
            ++$row_count;
            $status = $order->getStatus();
            $block_button = ($status == "processed") ? "disabled" : "";
            ?>

            <li class="list-item">
                <span class="li-row-count"><?= $row_count ?></span>
                <span class="li-id"><?= $order->getId() ?></span>
                <span class="li-id"><?= $order->getUserId() ?></span>
                <span class="li-price"><?= $status ?></span>
                <span class="li-name"><?= $order->getCreatedAt() ?></span>
                <div class="li-name">
                    <span class="li-id"><a href="one_order.php?id=<?= $order->getId() ?>" type="button"><i class="fas fa-info"></i></a></span>
                    <span class="li-id"><a href="accept_order.php?id=<?= $order->getId() ?>&action=processed" type="button"
                                           class=" <?= $block_button ?> btn btn-success btn-sm m-0"><i class="fas fa-check"></i></a></span>
                    <span class="li-id"><a href='delete_order.php?id=<?= $order->getId() ?>&action=deleted'
                                           ><i class="fas fa-trash"></i></a></span>
                </div>


            </li>
            <?php
        }
        ?>
        </ul>
</div>