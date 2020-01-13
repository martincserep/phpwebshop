<?php
include_once __DIR__ . "/../../database/AbstractDao.php";
include_once __DIR__ . "/../../database/ProductDao.php";
include_once __DIR__ . "/../../objects/product.php";

class DatabaseProductDao extends AbstractDao implements ProductDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function Create($name, $specification, $description, $price, $quantity, $image, $category)
    {
        try {
            $sql = "INSERT INTO products (product_name, specification, description, price, 
                                quantity, image, category) VALUES (?,?,?,?,?,?,?)";

            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $name, PDO::PARAM_STR);
            $row->bindParam(2, $specification, PDO::PARAM_STR);
            $row->bindParam(3, $description, PDO::PARAM_STR);
            $row->bindParam(4, $price, PDO::PARAM_INT);
            $row->bindParam(5, $quantity, PDO::PARAM_INT);
            $row->bindParam(6, $image, PDO::PARAM_STR);
            $row->bindParam(7, $category, PDO::PARAM_STR);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function DeleteById($product_id)
    {
        try {
            $sql = "DELETE FROM products WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $product_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }


    public function GetAll()
    {
        try {
            $productsList = array();
            $sql = "SELECT product_id, product_name, specification, description, 
                           quantity, price, image, category FROM products";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $productsList[] = $this->FetchProduct($temp);
            }
            return $productsList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetOneById($product_id)
    {
        try {
            $sql = "SELECT product_id, product_name, specification, description,
                           price, quantity, image, category FROM products WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $product_id, PDO::PARAM_INT);
            $row->execute();

            while ($temp = $row->fetch()) {
                return $this->FetchProduct($temp);
            }
        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetAllByCategory($category)
    {
        try {
            $productsList = array();
            $sql = "SELECT product_id, product_name, specification, description, 
                           quantity, price, image, category FROM products WHERE category = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $category, PDO::PARAM_STR);
            $row->execute();

            while ($temp = $row->fetch()) {
                $productsList[] = $this->FetchProduct($temp);
            }
            return $productsList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetAllByIds($productIdList)
    {
        try {
            $sql = "SELECT product_id, product_name, specification, description,
                           price, quantity, image, category FROM products WHERE product_id IN (?)";
            $row = $this->conn->prepare($sql);
            $param = "{" . implode(', ', $productIdList) . "}";
            $row->execute(array($param));

            while ($temp = $row->fetch()) {
                return $this->FetchProduct($temp);
            }
        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
        return null;
    }

    public function UpdateProduct($product_id, $name, $specification, $description, $price, $quantity, $image, $category)
    {
        try {
            $sql = "UPDATE products SET product_name = ?, specification = ?, 
                    description = ?, price = ?, quantity = ?, image = ?, category = ?
                    WHERE product_id = ?";

            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $name, PDO::PARAM_STR);
            $row->bindParam(2, $specification, PDO::PARAM_STR);
            $row->bindParam(3, $description, PDO::PARAM_STR);
            $row->bindParam(4, $price, PDO::PARAM_INT);
            $row->bindParam(5, $quantity, PDO::PARAM_INT);
            $row->bindParam(6, $image, PDO::PARAM_STR);
            $row->bindParam(7, $category, PDO::PARAM_STR);
            $row->bindParam(8, $product_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }


    public function GetCurrentQuantity($product_id)
    {
        try {
            $sql = "SELECT quantity FROM products WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $product_id, PDO::PARAM_INT);
            $row->execute();

            while ($quantity = $row->fetch()) {
                return $quantity;
            }
        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetAllCategories()
    {
        try {
            $categoryList = array();
            $sql = "SELECT DISTINCT category FROM products";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $categoryList[] = $temp;
            }
            return $categoryList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }


    private function FetchProduct($row)
    {
        return new Product($row["product_id"], $row["product_name"],$row["specification"],
            $row["description"], $row["price"], $row["quantity"], $row["image"], $row["category"]);
    }
}