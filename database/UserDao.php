<?php


interface UserDao
{
    public function CreateUser($firstName, $lastName, $email, $contact_number, $address, $password,
                               $access_level, $access_code, $status, $created);
    public function UpdateUserDetails($user_id, $firstName, $lastName, $email, $contact_number, $address);
    public function UpdateUserPassword($user_id, $new_pw);
    public function GetUserById($user_id);
    public function GetAllUser();
    public function EmailExists($email);
    public function GetUserByEmail($email);
    public function GetUsersBetween($from_record_num, $records_per_page);

}