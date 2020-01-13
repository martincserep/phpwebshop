<?php
include_once __DIR__ . "/../../database/Dao/DatabaseUserDao.php";
include_once __DIR__ . "/../../services/UserServices.php";

class SimpleUserServices implements UserServices
{
    private $userdao;

    public function __construct()
    {
        $this->userdao = new DatabaseUserDao();
    }

    public function AddUser($firstName, $lastName, $email, $contact_number, $address,
                            $password, $access_level, $access_code, $status, $created)
    {
        $this->userdao->CreateUser($firstName, $lastName, $email, $contact_number, $address,
            $password, $access_level, $access_code, $status, $created);
    }

    public function UpdateUserDetails($user_id, $firstName, $lastName, $email, $contact_number, $address)
    {
        $this->userdao->UpdateUserDetails($user_id, $firstName, $lastName, $email, $contact_number, $address);
    }

    public function UpdateUserPassword($user_id, $new_pw)
    {
        $this->userdao->UpdateUserPassword($user_id, $new_pw);
    }


    public function ReadUserById($user_id)
    {
        return $this->userdao->GetUserById($user_id);
    }

    public function ReadAllUser()
    {
        return $this->userdao->GetAllUser();
    }

    public function CheckEmailExists($email)
    {
        return $this->userdao->EmailExists($email);
    }

    public function ReadUserByEmail($email)
    {
        return $this->userdao->GetUserByEmail($email);
    }

    public function ReadUsersBetween($from_record_num, $records_per_page)
    {
        return $this->userdao->GetUsersBetween($from_record_num, $records_per_page);
    }
}