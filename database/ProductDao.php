<?php


interface ProductDao
{
    public function GetAll();
    public function GetOneById($product_id);
    public function GetAllByIds($productIdList);
    public function GetAllByCategory($category);
    public function GetCurrentQuantity($product_id);
    public function UpdateProduct($product_id, $name, $specification, $description, $price, $quantity, $image, $category);
    public function Create($name, $specification, $description,
                           $price, $quantity, $image, $category);
    public function DeleteById($product_id);
    public function GetAllCategories();
}