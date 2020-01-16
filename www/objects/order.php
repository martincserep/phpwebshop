<?php

class Order{

    private $id;
    private $user_id;
    private $cart_items;
    private $status;
    private $created_at;

    public function __construct($id, $user_id, $cart_items, $status, $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->cart_items = $cart_items;
        $this->status = $status;
        $this->created_at = $created_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getCartItems()
    {
        return $this->cart_items;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
