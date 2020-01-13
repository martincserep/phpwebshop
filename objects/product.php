<?php


class product {

    private $id;
    private $name;
    private $specification;
    private $description;
    private $price;
    private $quantity;
    private $image;
    private $category;

    public function __construct($id, $name, $specification, $description,
                                $price, $quantity, $image, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->specification = $specification;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->category = $category;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getSpecification()
    {
        return $this->specification;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCategory()
    {
        return $this->category;
    }
}