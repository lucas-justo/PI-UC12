<?php

class Responsavel{
    private $ID;
    private $RPNOME;
	private $RPCARGO;
	private $IDSETOR;
    
    public function __construct( $ID = NULL, $RPNOME = NULL , $RPCARGO = NULL , $IDSETOR = NULL ){
        
    }
	
    function getID() {
        return $this->ID;
    }

    function getRPNOME() {
        return $this->RPNOME;
    }
	
	function getRPCARGO() {
        return $this->RPCARGO;
    }
	
	function getIDSETOR() {
        return $this->IDSETOR;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setRPNOME($RPNOME) {
        $this->RPNOME = $RPNOME;
    }
	
	function setRPCARGO($RPCARGO) {
        $this->RPCARGO = $RPCARGO;
    }
	
	function setIDSETOR($IDSETOR) {
        $this->IDSETOR = $IDSETOR;
    }

    
}
