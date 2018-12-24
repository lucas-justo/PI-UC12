<?php

class _Switch{
    private $ID;
    private $STCODIGO;
    private $STIP;
    private $STUSER;
    private $STSENHA;
    private $STPATRIMONIO;
	private $IDMD;
	private $IDSETOR;
	private $STDESCRICAO;
    
    public function __construct( $ID = NULL, $STCODIGO = NULL, $STIP = NULL, $IDMD = NULL, 
            $STUSER = NULL, $STSENHA = NULL, $STPATRIMONIO = NULL , $IDSETOR = NULL , $STDESCRICAO = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }
	
	 function getIDSETOR() {
        return $this->IDSETOR;
    }
	
	 function getSTDESCRICAO() {
        return $this->STDESCRICAO;
    }

    function getSTCODIGO() {
        return $this->STCODIGO;
    }

    function getSTIP() {
        return $this->STIP;
    }

    function getIDMD() {
        return $this->IDMD;
    }

    function getSTUSER() {
        return $this->STUSER;
    }

    function getSTSENHA() {
        return $this->STSENHA;
    }

    function getSTPATRIMONIO() {
        return $this->STPATRIMONIO;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setSTCODIGO($STCODIGO) {
        $this->STCODIGO = $STCODIGO;
    }

    function setSTIP($STIP) {
        $this->STIP = $STIP;
    }

    function setIDMD($IDMD) {
        $this->IDMD = $IDMD;
    }
	
	function setIDSETOR($IDSETOR) {
        $this->IDSETOR = $IDSETOR;
    }

    function setSTUSER($STUSER) {
        $this->STUSER = $STUSER;
    }

    function setSTSENHA($STSENHA) {
        $this->STSENHA = $STSENHA;
    }

    function setSTPATRIMONIO($STPATRIMONIO) {
        $this->STPATRIMONIO = $STPATRIMONIO;
    }

    function setSTDESCRICAO($STDESCRICAO) {
        $this->STDESCRICAO = $STDESCRICAO;
    }

    
}
