<?php

class Monitor{
    private $ID;
    private $MTNOME;
    private $MTPATRIMONIO;
    private $MTDESCRICAO;
	private $IDPC;
	private $IDRP;
	private $IDMD;
    
    public function __construct( $ID = NULL ,
            $MTNOME = NULL, $MTPATRIMONIO = NULL, $MTDESCRICAO = NULL , $IDPC = NULL , $IDRP = NULL , $IDMD = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getIDPC() {
        return $this->IDPC;
    }

    function getIDRP() {
        return $this->IDRP;
    }
	
	 function getIDMD() {
        return $this->IDMD;
    }

    function getMTCARGO() {
        return $this->IDMD;
    }

    function getMTNOME() {
        return $this->MTNOME;
    }

    function getMTPATRIMONIO() {
        return $this->MTPATRIMONIO;
    }

    function getMTDESCRICAO() {
        return $this->MTDESCRICAO;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setIDPC($IDPC) {
        $this->IDPC = $IDPC;
    }

    function setIDRP($IDRP) {
        $this->IDRP = $IDRP;
    }
	
	 function setIDMD($IDMD) {
        $this->IDMD = $IDMD;
    }

    function setMTNOME($MTNOME) {
        $this->MTNOME = $MTNOME;
    }

    function setMTPATRIMONIO($MTPATRIMONIO) {
        $this->MTPATRIMONIO = $MTPATRIMONIO;
    }

    function setMTDESCRICAO($MTDESCRICAO) {
        $this->MTDESCRICAO = $MTDESCRICAO;
    }


}