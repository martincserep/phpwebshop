<?php

interface OrderServices{

    public function AddOrder($user_id, $cart_items);
    public function ReadAllOrders();
    public function ReadOneById($order_id);
    public function UpdateOrderStatus($order_id, $status);
    public function DeleteOrderById($order_id);
}