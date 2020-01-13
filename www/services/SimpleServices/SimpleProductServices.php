<?php

include_once __DIR__ . "/../../database/Dao/DatabaseProductDao.php";
include_once __DIR__ . "/../../services/ProductServices.php";

class SimpleProductServices implements ProductServices
{

    private $productDao;

    public function __construct()
    {
        $this->productDao = new DatabaseProductDao();
    }

    public function CreateProduct($name, $specification, $description, $price, $quantity, $image, $category)
    {
        $isValid = true;

        // check price and quantity inputs
        if ($price > 0 && $quantity >= 0) {
            $this->productDao->Create($name, $specification, $description, $price, $quantity, $image, $category);
        } else {
            $isValid = false;
        }
        return $isValid;

    }

    public function RemoveById($product_id)
    {
        $this->productDao->DeleteById($product_id);
    }

    public function ReadAll()
    {
        return $this->productDao->GetAll();
    }

    public function ReadOne($product_id)
    {
        return $this->productDao->GetOneById($product_id);
    }

    public function ReadAllByIds($productIdList)
    {
        return $this->ReadAllByIds($productIdList);
    }

    public function ReadAllByCategory($category)
    {
        return $this->productDao->GetAllByCategory($category);
    }

    public function ReadCurrentQty($product_id)
    {
        return $this->productDao->GetCurrentQuantity($product_id);
    }

    public function RefreshQty($new_qty, $product_id)
    {
        $this->RefreshQty($new_qty, $product_id);
    }

    public function ReadAllCategories()
    {
        return $this->productDao->GetAllCategories();
    }

    public function EditProduct($product_id, $name, $specification, $description, $price, $quantity, $image, $category)
    {
        $isValid = true;
        // check price and quantity inputs
        if ($price > 0 && $quantity >= 0) {
            $this->productDao->UpdateProduct($product_id, $name, $specification, $description, $price, $quantity, $image, $category);
        } else {
            $isValid = false;
        }
        return $isValid;
    }
}