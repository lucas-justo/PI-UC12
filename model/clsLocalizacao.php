<?php

class Localizacao{
    private $ID;
    private $LZNOME;
    
    public function __construct( $ID = NULL, $LZNOME = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getLZNOME() {
        return $this->LZNOME;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setLZNOME($LZNOME) {
        $this->LZNOME = $LZNOME;
    }

    
}
