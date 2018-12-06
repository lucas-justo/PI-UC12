<?php

class Ponto{
    private $ID;
    private $PTCODIGO;
    private $PTIP;
    private $PTPORTA;
    private $PTSWITCH;
    private $PTDESCRICAO;
    private $PTPATRIMONIO;
    private $PTMAC;
    private $PTQUADRANTE;
    private $PTANDAR;
    private $PTSETOR;
    
    public function __construct( $ID = NULL, $PTCODIGO = NULL, $PTIP = NULL, $PTPORTA = NULL, 
            $PTSWITCH = NULL, $PTDESCRICAO = NULL, $PTPATRIMONIO = NULL, $PTMAC = NULL, $PTQUADRANTE = NULL, $PTANDAR = NULL, 
            $PTSETOR = NULL ){
        
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

    function getPTSWITCH() {
        return $this->PTSWITCH;
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

    function getPTQUADRANTE() {
        return $this->PTQUADRANTE;
    }

    function getPTANDAR() {
        return $this->PTANDAR;
    }

    function getPTSETOR() {
        return $this->PTSETOR;
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

    function setPTSWITCH($PTSWITCH) {
        $this->PTSWITCH = $PTSWITCH;
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

    function setPTQUADRANTE($PTQUADRANTE) {
        $this->PTQUADRANTE = $PTQUADRANTE;
    }

    function setPTANDAR($PTANDAR) {
        $this->PTANDAR = $PTANDAR;
    }

    function setPTSETOR($PTSETOR) {
        $this->PTSETOR = $PTSETOR;
    }


}
