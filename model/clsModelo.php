<?php

class Modelo{
    private $ID;
    private $MDNOME;
    
    public function __construct( $ID = NULL, $MDNOME = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getMDNOME() {
        return $this->MDNOME;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setMDNOME($MDNOME) {
        $this->MDNOME = $MDNOME;
    }

    
}
