<?php
class User{

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $contact_number;
    private $address;
    private $password;
    private $access_level;
    private $access_code;
    private $status;
    private $created;
    private $modified;


    public function __construct($id, $firstname, $lastname, $email, $contact_number, $address, $password, $access_level, $access_code, $status, $created, $modified)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->contact_number = $contact_number;
        $this->address = $address;
        $this->password = $password;
        $this->access_level = $access_level;
        $this->access_code = $access_code;
        $this->status = $status;
        $this->created = $created;
        $this->modified = $modified;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccessLevel()
    {
        return $this->access_level;
    }

    public function getAccessCode()
    {
        return $this->access_code;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getModified()
    {
        return $this->modified;
    }
}