<?php

class MessageContact {

    private $sEmail;
    private $sObject;
    private $sMessage;

    function __construct($email, $object, $message) {
        $this->sEmail = $email;
        $this->sObject = $object;
        $this->sMessage = $message;
    }

    public function send() {
        echo 'Merci' . $this->sMessage;
    }

    public function setEmail($sNewEmail) {
        $this->sEmail = $sNewEmail;
    }

    public function getEmail() {
        return $this->sEmail;
    }

    public function setObject($sNewObject) {
        $this->sObject = $sNewObject;
    }

    public function getObject() {
        return $this->sObject;
    }

    public function setMessage($sNewMessage) {
        $this->sMessage = $sNewMessage;
    }

    public function getMessage() {
        return $this->sMessage;
    }

}
