<?php

class Impressora{
    private $ID;
    private $IMPNOME;
    private $IMPMODELO;
    private $IMPIP;
    private $IMPSETOR;
    private $IMPDESCRICAO;
    private $IMPPATRIMONIO;
    private $IMPDESTINO;
    
    public function __construct( $ID = NULL, $IMPNOME = NULL, $IMPMODELO = NULL, $IMPIP = NULL, 
            $IMPSETOR = NULL, $IMPDESCRICAO = NULL, $IMPPATRIMONIO = NULL, $IMPDESTINO = NULL){
        
    }
    function getID() {
        return $this->ID;
    }

    function getIMPNOME() {
        return $this->IMPNOME;
    }

    function getIMPMODELO() {
        return $this->IMPMODELO;
    }

    function getIMPIP() {
        return $this->IMPIP;
    }

    function getIMPSETOR() {
        return $this->IMPSETOR;
    }

    function getIMPDESCRICAO() {
        return $this->IMPDESCRICAO;
    }

    function getIMPPATRIMONIO() {
        return $this->IMPPATRIMONIO;
    }

    function getIMPDESTINO() {
        return $this->IMPDESTINO;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setIMPNOME($IMPNOME) {
        $this->IMPNOME = $IMPNOME;
    }

    function setIMPMODELO($IMPMODELO) {
        $this->IMPMODELO = $IMPMODELO;
    }

    function setIMPIP($IMPIP) {
        $this->IMPIP = $IMPIP;
    }

    function setIMPSETOR($IMPSETOR) {
        $this->IMPSETOR = $IMPSETOR;
    }

    function setIMPDESCRICAO($IMPDESCRICAO) {
        $this->IMPDESCRICAO = $IMPDESCRICAO;
    }

    function setIMPPATRIMONIO($IMPPATRIMONIO) {
        $this->IMPPATRIMONIO = $IMPPATRIMONIO;
    }

    function setIMPDESTINO($IMPDESTINO) {
        $this->IMPDESTINO = $IMPDESTINO;
    }


    
}