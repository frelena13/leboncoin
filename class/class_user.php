<?php

class User {

    protected $id;
    protected $email;
    protected $password;

    public function __construct($aData = array()) {
        if ($aData) {
            $this->hydrate($aData);
        }
    }

    public function hydrate($aData) {
        $this->setId($aData['id']);
        $this->setEmail($aData['email']);
        $this->setPassword($aData['password']);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($inewId_user) {
        $this->id = $inewId_user;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($newEmail) {
        $this->email = $newEmail;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function setPassword($newPassword) {
        $this->password = $newPassword;
    }

}
