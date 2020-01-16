<?php


interface OrderDao
{
    public function CreateOrder($user_id, $cart_items);
    public function GetAll();
    public function GetOneById($order_id);
    public function UpdateById($order_id, $status);
    public function DeleteById($order_id);
    public function GetOrdersByDate($from, $to);
}