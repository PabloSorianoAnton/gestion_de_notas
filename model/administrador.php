<?php

require_once 'persona.php';

class Administrador extends Persona {
    
    function __construct($email,$passwd){
        parent:: __construct($email,$passwd);
    }
}

?>