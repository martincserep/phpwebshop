<?php
global $name;
global $price;
global $quantity;
global $row_count;

?>
<tr>
    <td><h4><?= $row_count?></h4></td>
    <td><h4><?= $name ?></h4></td>
    <td>
        <form class='update-quantity-form' action="update_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?= $id?>">
            <input type='number' name='quantity' value='<?= $quantity?>' class='btn row width-30-percent' min='1'>
            <button class='btn btn-primary btn-margin-right' type='submit'>Update</button>
        </form>
    </td>
    <td><a href='remove_from_cart.php?id=<?= $id?>' class='btn btn-danger'>Delete</a></td>
    <td class="pull-right"><?php echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>"; ?></td>
</tr>