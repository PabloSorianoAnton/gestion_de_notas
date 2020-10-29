<?php

abstract class Persona {
    protected $email;
    protected $passwd;
    protected $id;

    function __construct($email, $passwd) {
        $this->email=$email;
        $this->passwd=$passwd;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPasswd() {
        return $this->passwd;
    }
 
    public function setPasswd($passwd) {
        $this->passwd = $passwd;
        return $this;
    }
 
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
}

?>