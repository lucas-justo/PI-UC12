<?php

class _Switch{
    private $ID;
    private $STCODIGO;
    private $STIP;
    private $STMODELO;
    private $STUSER;
    private $STSENHA;
    private $STPATRIMONIO;
    
    public function __construct( $ID = NULL, $STCODIGO = NULL, $STIP = NULL, $STMODELO = NULL, 
            $STUSER = NULL, $STSENHA = NULL, $STPATRIMONIO = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getSTCODIGO() {
        return $this->STCODIGO;
    }

    function getSTIP() {
        return $this->STIP;
    }

    function getSTMODELO() {
        return $this->STMODELO;
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

    function setSTMODELO($STMODELO) {
        $this->STMODELO = $STMODELO;
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


    
}
