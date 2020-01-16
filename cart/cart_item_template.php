<?php
global $name;
global $price;
global $quantity;
global $row_count;

?>
<li class="list-item">
    <span class="li-row-count"><?= $row_count?></span>
    <span class="li-name"><?= $name ?></span>
        <form class='li-quantity' action="update_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?= $id?>">
            <input type='number' name='quantity' value='<?= $quantity?>' class='' min='1'>
            <button type='submit'>Update</button>
        </form>
    <span class="li-price"><a href='remove_from_cart.php?id=<?= $id?>' class='count-box-link'>Delete</a></span>
    <span class="li-price"><?php echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>"; ?></span>
</li>