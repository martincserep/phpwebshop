<?php
include_once "../../services/simpleServices/SimpleOrderServices.php";

$services = new SimpleOrderServices();

$ordersList = $services->ReadAllOrders();
?>
<div class="list-border-background width-80-percent">
    <table class="table table-striped table-responsive-md btn-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Order Id</th>
            <th>User Id</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $row_count = 0;
        foreach ($ordersList as $order) {
            ++$row_count;
            $status = $order->getStatus();
            $block_button = ($status == "processed") ? "disabled" : "";
            ?>

            <tr>
                <td><span><?= $row_count ?></span></td>
                <td><span><?= $order->getId() ?></span></td>
                <td><span><?= $order->getUserId() ?></span></td>
                <td><span><?= $status ?></span></td>
                <td><span><?= $order->getCreatedAt() ?></span></td>
                <td>
                    <a href="one_order.php?id=<?= $order->getId() ?>" type="button" class="btn btn-info btn-sm m-0">Details</a>
                    <a href="accept_order.php?id=<?= $order->getId() ?>&action=processed" type="button"
                       class=" <?= $block_button ?> btn btn-success btn-sm m-0">Accept</a>
                    <a href='delete_order.php?id=<?= $order->getId() ?>&action=deleted'
                       class='btn btn-danger btn-sm m-0'>Delete</a>
                </td>

            </tr>
            <?php
        }
        ?>
        </tbody>

    </table>
</div>