<?php
include_once __DIR__ . "/../../Database/Dao/DatabaseOrderDao.php";
include_once __DIR__ . "/../../services/OrderServices.php";

class SimpleOrderServices implements OrderServices{

    private $orderDao;

    public function __construct()
    {
        $this->orderDao = new DatabaseOrderDao();
    }

    public function ReadAllOrders()
    {
        return $this->orderDao->GetAll();
    }

    function AddOrder($user_id, $cart_items)
    {
        $this->orderDao->CreateOrder($user_id, $cart_items);
    }

    public function ReadOneById($order_id)
    {
        return $this->orderDao->GetOneById($order_id);
    }

    public function DeleteOrderById($order_id)
    {
        $this->orderDao->DeleteById($order_id);
    }


    public function UpdateOrderStatus($order_id, $status)
    {
        $this->orderDao->UpdateById($order_id, $status);
    }

}