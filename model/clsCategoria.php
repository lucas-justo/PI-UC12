<?php

class Categoria{
    private $ID;
    private $CATNOME;

    
    
    public function __construct( $ID = NULL, $CATNOME = NULL  ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getCATNOME() {
        return $this->CATNOME;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setCATNOME($CATNOME) {
        $this->CATNOME = $CATNOME;
    }
    
}
