<?php

class Modelo{
    private $ID;
    private $MDNOME;
	private $MDCATEGORIA;
    
    
    public function __construct( $ID = NULL, $MDNOME = NULL , $MDCATEGORIA = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getMDNOME() {
        return $this->MDNOME;
    }
	
	function getMDCATEGORIA() {
        return $this->MDCATEGORIA;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setMDNOME($MDNOME) {
        $this->MDNOME = $MDNOME;
    }
	
	function setMDCATEGORIA($MDCATEGORIA) {
        $this->MDCATEGORIA = $MDCATEGORIA;
    }

    
}
