<?php
include_once __DIR__ . "/../../database/AbstractDao.php";
include_once __DIR__ . "/../../database/UserDao.php";
include_once __DIR__ . "/../../objects/user.php";

class DatabaseUserDao extends AbstractDao implements UserDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function CreateUser($firstname, $lastname, $email, $contact_number, $address, $password,
                               $access_level, $access_code, $status, $created)
    {
        try {
            $sql = "INSERT INTO users (`firstname`, `lastname`, `email`, `contact_number`, `address`,
                                        `password`, `access_level`, `access_code`, `status`, `created`) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?)";

            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $firstname, PDO::PARAM_STR);
            $row->bindParam(2, $lastname, PDO::PARAM_STR);
            $row->bindParam(3, $email, PDO::PARAM_STR);
            $row->bindParam(4, $contact_number, PDO::PARAM_INT);
            $row->bindParam(5, $address, PDO::PARAM_STR);
            // hash password
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $row->bindParam(6, $password_hash, PDO::PARAM_STR);
            $row->bindParam(7, $access_level, PDO::PARAM_STR);
            $row->bindParam(8, $access_code, PDO::PARAM_STR);
            $row->bindParam(9, $status, PDO::PARAM_INT);
            $row->bindParam(10, $created, PDO::PARAM_STR);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function UpdateUserPassword($user_id, $new_pw)
    {
        try {
            $sql = "UPDATE users SET `password` = ? WHERE id = ?";

            $row = $this->conn->prepare($sql);
            // hash password
            $password_hash = password_hash($new_pw, PASSWORD_BCRYPT);
            $row->bindParam(1, $password_hash, PDO::PARAM_STR);
            $row->bindParam(2, $user_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }


    public function UpdateUserDetails($user_id, $firstName, $lastName, $email, $contact_number, $address)
    {
        try {
            $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, 
                    contact_number = ?, address = ? WHERE id = ?";

            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $firstName, PDO::PARAM_STR);
            $row->bindParam(2, $lastName, PDO::PARAM_STR);
            $row->bindParam(3, $email, PDO::PARAM_STR);
            $row->bindParam(4, $contact_number, PDO::PARAM_INT);
            $row->bindParam(5, $address, PDO::PARAM_STR);
            $row->bindParam(6, $user_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetUserById($user_id)
    {
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, 
                            access_level, access_code, status, created, modified FROM users WHERE id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $user_id, PDO::PARAM_INT);
            $row->execute();

            while ($temp = $row->fetch()) {
                return $this->FetchUser($temp);
            }

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetAllUser()
    {
        $userList = array();
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, 
                            access_level, access_code, status, created, modified FROM users";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $userList[] = $this->FetchUser($temp);
            }
            return $userList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function EmailExists($email)
    {
        $email=htmlspecialchars(strip_tags($email));
        try {
            $sql = "SELECT id FROM users WHERE email = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $email, PDO::PARAM_STR);
            $row->execute();

            if ($row->rowCount() == 0){
                return false;
            } else {
                return true;
            }

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }

    public function GetUserByEmail($email)
    {
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, 
                            access_level, access_code, status, created, modified FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
            while ($row = $stmt->fetch()){
                return $this->FetchUser($row);
            }
        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetUsersBetween($from_record_num, $records_per_page)
    {
        $userList = array();
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, access_level, 
                        access_code, status, created, modified FROM users ORDER BY id DESC LIMIT ?, ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
            $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

            $stmt->execute();

            while ($temp = $stmt->fetch()) {
                $userList[] = $this->FetchUser($temp);
            }
            return $userList;

        } catch (PDOException $pe) {
            die("Could not connect to the Database! " . $pe->getMessage());
        }
    }


    private function FetchUser($row){

        return new User($row['id'], $row['firstname'], $row['lastname'], $row['email'],
            $row['contact_number'], $row['address'], $row['password'], $row['access_level'],
            $row['access_code'], $row['status'],$row['created'],$row['modified'] );
    }
}