<?php

class Monitor{
    private $ID;
    private $MTRESPONSAVEL;
    private $MTSETOR;
    private $MTCARGO;
    private $MTNOME;
    private $MTNOMEANTIGO;
    private $MTMODELO;
    private $MTMODELOANTIGO;
    private $MTPATRIMONIO;
    private $MTDESCRICAO;
    
    public function __construct( $ID = NULL, $MTRESPONSAVEL = NULL, $MTSETOR = NULL, $MTCARGO = NULL,
            $MTNOME = NULL, $MTNOMEANTIGO = NULL, $MTMODELO = NULL, $MTMODELOANTIGO = NULL, $MTPATRIMONIO = NULL, $MTDESCRICAO = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getMTRESPONSAVEL() {
        return $this->MTRESPONSAVEL;
    }

    function getMTSETOR() {
        return $this->MTSETOR;
    }

    function getMTCARGO() {
        return $this->MTCARGO;
    }

    function getMTNOME() {
        return $this->MTNOME;
    }

    function getMTNOMEANTIGO() {
        return $this->MTNOMEANTIGO;
    }

    function getMTMODELO() {
        return $this->MTMODELO;
    }

    function getMTMODELOANTIGO() {
        return $this->MTMODELOANTIGO;
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

    function setMTRESPONSAVEL($MTRESPONSAVEL) {
        $this->MTRESPONSAVEL = $MTRESPONSAVEL;
    }

    function setMTSETOR($MTSETOR) {
        $this->MTSETOR = $MTSETOR;
    }

    function setMTCARGO($MTCARGO) {
        $this->MTCARGO = $MTCARGO;
    }

    function setMTNOME($MTNOME) {
        $this->MTNOME = $MTNOME;
    }

    function setMTNOMEANTIGO($MTNOMEANTIGO) {
        $this->MTNOMEANTIGO = $MTNOMEANTIGO;
    }

    function setMTMODELO($MTMODELO) {
        $this->MTMODELO = $MTMODELO;
    }

    function setMTMODELOANTIGO($MTMODELOANTIGO) {
        $this->MTMODELOANTIGO = $MTMODELOANTIGO;
    }

    function setMTPATRIMONIO($MTPATRIMONIO) {
        $this->MTPATRIMONIO = $MTPATRIMONIO;
    }

    function setMTDESCRICAO($MTDESCRICAO) {
        $this->MTDESCRICAO = $MTDESCRICAO;
    }


}