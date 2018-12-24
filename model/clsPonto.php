<?php

class Ponto{
    private $ID;
    private $PTCODIGO;
    private $PTIP;
    private $PTPORTA;
    private $PTDESCRICAO;
    private $PTPATRIMONIO;
    private $PTMAC;
    private $IDMD;
    private $IDSETOR;
    private $IDSWITCH;
	
    public function __construct( $ID = NULL, $PTCODIGO = NULL, $PTIP = NULL, $PTPORTA = NULL, 
            $IDSWITCH = NULL, $PTDESCRICAO = NULL, $PTPATRIMONIO = NULL, $PTMAC = NULL, 
            $IDSETOR = NULL ,    $IDMD = NULL ){
        
    }
    function getID() {
        return $this->ID;
    }

    function getPTCODIGO() {
        return $this->PTCODIGO;
    }

    function getPTIP() {
        return $this->PTIP;
    }

    function getPTPORTA() {
        return $this->PTPORTA;
    }

    function getIDSWITCH() {
        return $this->IDSWITCH;
    }

    function getPTDESCRICAO() {
        return $this->PTDESCRICAO;
    }

    function getPTPATRIMONIO() {
        return $this->PTPATRIMONIO;
    }

    function getPTMAC() {
        return $this->PTMAC;
    }


    function getIDMD() {
        return $this->IDMD;
    }

    function getIDSETOR() {
        return $this->IDSETOR;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setPTCODIGO($PTCODIGO) {
        $this->PTCODIGO = $PTCODIGO;
    }

    function setPTIP($PTIP) {
        $this->PTIP = $PTIP;
    }

    function setPTPORTA($PTPORTA) {
        $this->PTPORTA = $PTPORTA;
    }

    function setIDSWITCH($IDSWITCH) {
        $this->IDSWITCH = $IDSWITCH;
    }

    function setPTDESCRICAO($PTDESCRICAO) {
        $this->PTDESCRICAO = $PTDESCRICAO;
    }

    function setPTPATRIMONIO($PTPATRIMONIO) {
        $this->PTPATRIMONIO = $PTPATRIMONIO;
    }

    function setPTMAC($PTMAC) {
        $this->PTMAC = $PTMAC;
    }


    function setIDMD($IDMD) {
        $this->IDMD = $IDMD;
    }

    function setIDSETOR($IDSETOR) {
        $this->IDSETOR = $IDSETOR;
    }


}
