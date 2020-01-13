<?php
include_once __DIR__ . "/../../Database/AbstractDao.php";
include_once __DIR__ . "/../../Database/OrderDao.php";
include_once __DIR__ . "/../../objects/order.php";

class DatabaseOrderDao extends AbstractDao implements OrderDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function CreateOrder($user_id, $cart_items)
    {
        try {
            $sql = "INSERT INTO orders (user_id, cart_items) VALUES (?,?);";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $user_id, PDO::PARAM_INT);
            $row->bindParam(2, $cart_items, PDO::PARAM_STR);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetAll()
    {
        try {
            $ordersList = array();
            $sql = "SELECT order_id, user_id, cart_items, status, created_at FROM orders";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $ordersList[] = $this->FetchOrder($temp);
            }
            return $ordersList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetOneById($order_id)
    {
        try {
            $sql = "SELECT order_id, user_id, cart_items, status, created_at FROM orders WHERE order_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $order_id, PDO::PARAM_INT);
            $row->execute();

            while ($temp = $row->fetch()) {
                return $this->FetchOrder($temp);
            }

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function UpdateById($order_id, $status)
    {
        try {
            $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $status, PDO::PARAM_STR);
            $row->bindParam(2, $order_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function DeleteById($order_id)
    {
        try {
            $sql = "DELETE FROM orders WHERE order_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $order_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetOrdersByDate($from, $to)
    {
        // TODO: Implement GetOrdersByDate() method.
    }

    private function FetchOrder($row)
    {
        return new Order($row["order_id"], $row["user_id"], $row["cart_items"],
            $row["status"], $row["created_at"]);
    }
}