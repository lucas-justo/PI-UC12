<?php

class Computador {
    private $ID;
    private $PCSETOR;
    private $PCCARGO;
    private $PCNOME;
    private $PCNOMEANTIGO;
    private $PCMODELO;
    private $PCMODELOANTIGO;
    private $PCPATRIMONIO;
    private $PCDESCRICAO;
    
    public function __construct( $ID = NULL, $PCSETOR = NULL, $PCCARGO = NULL,
            $PCNOME = NULL, $PCNOMEANTIGO = NULL, $PCMODELO = NULL, $PCMODELOANTIGO = NULL,
            $PCPATRIMONIO = NULL, $PCDESCRICAO = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getPCSETOR() {
        return $this->PCSETOR;
    }

    function getPCCARGO() {
        return $this->PCCARGO;
    }

    function getPCNOME() {
        return $this->PCNOME;
    }

    function getPCNOMEANTIGO() {
        return $this->PCNOMEANTIGO;
    }

    function getPCMODELO() {
        return $this->PCMODELO;
    }

    function getPCMODELOANTIGO() {
        return $this->PCMODELOANTIGO;
    }

    function getPCPATRIMONIO() {
        return $this->PCPATRIMONIO;
    }

    function getPCDESCRICAO() {
        return $this->PCDESCRICAO;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setPCSETOR($PCSETOR) {
        $this->PCSETOR = $PCSETOR;
    }

    function setPCCARGO($PCCARGO) {
        $this->PCCARGO = $PCCARGO;
    }

    function setPCNOME($PCNOME) {
        $this->PCNOME = $PCNOME;
    }

    function setPCNOMEANTIGO($PCNOMEANTIGO) {
        $this->PCNOMEANTIGO = $PCNOMEANTIGO;
    }

    function setPCMODELO($PCMODELO) {
        $this->PCMODELO = $PCMODELO;
    }

    function setPCMODELOANTIGO($PCMODELOANTIGO) {
        $this->PCMODELOANTIGO = $PCMODELOANTIGO;
    }

    function setPCPATRIMONIO($PCPATRIMONIO) {
        $this->PCPATRIMONIO = $PCPATRIMONIO;
    }

    function setPCDESCRICAO($PCDESCRICAO) {
        $this->PCDESCRICAO = $PCDESCRICAO;
    }

    
    }