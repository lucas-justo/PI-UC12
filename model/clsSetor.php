<?php

class Setor{
    private $ID;
    private $STNOME;
    
    public function __construct( $ID = NULL, $STNOME = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getSTNOME() {
        return $this->STNOME;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setSTNOME($STNOME) {
        $this->STNOME = $STNOME;
    }

    
}
