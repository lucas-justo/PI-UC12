<?php

class Servidor {
    private $ID;
    private $SERVIP;
    private $SERVLOCALIZACAO;
    private $SERVNOME;
    private $SERVCPU;
    private $SERVMEMORIA;
    private $SERVDISCO;
    private $SERVSISTEMA;
    private $SERVUSER;
    private $SERVSENHA;
    private $SERVDESCRICAO;
    private $SERVSERVICOS;
	private $CODPC;
    
    public function __construct($ID = NULL, $SERVIP = NULL, $SERVLOCALIZACAO = NULL, $SERVNOME = NULL,
            $SERVCPU = NULL, $SERVMEMORIA = NULL, $SERVDISCO = NULL, $SERVSISTEMA = NULL,
            $SERVUSER = NULL, $SERVSENHA = NULL, $SERVDESCRICAO = NULL , $CODPC = NULL) {
        $this->ID = $ID;
        $this->SERVIP = $SERVIP;
        $this->SERVLOCALIZACAO = $SERVLOCALIZACAO;
        $this->SERVNOME = $SERVNOME;
        $this->SERVCPU = $SERVCPU;
        $this->SERVMEMORIA = $SERVMEMORIA;
        $this->SERVDISCO = $SERVDISCO;
        $this->SERVSISTEMA = $SERVSISTEMA;
        $this->SERVUSER = $SERVUSER;
        $this->SERVSENHA = $SERVSENHA;
        $this->SERVDESCRICAO = $SERVDESCRICAO;
		$this->CODPC = $CODPC;
        
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getSERVIP() {
        return $this->SERVIP;
    }

    function getSERVLOCALIZACAO() {
        return $this->SERVLOCALIZACAO;
    }

    function getSERVNOME() {
        return $this->SERVNOME;
    }

    function getSERVCPU() {
        return $this->SERVCPU;
    }

    function getSERVMEMORIA() {
        return $this->SERVMEMORIA;
    }

    function getSERVDISCO() {
        return $this->SERVDISCO;
    }

    function getSERVSISTEMA() {
        return $this->SERVSISTEMA;
    }

    function getSERVUSER() {
        return $this->SERVUSER;
    }

    function getSERVSENHA() {
        return $this->SERVSENHA;
    }

    function getSERVDESCRICAO() {
        return $this->SERVDESCRICAO;
    }

    function getSERVSERVICOS() {
        return $this->SERVSERVICOS;
    }
	
	 function getCODPC() {
        return $this->CODPC;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setSERVIP($SERVIP) {
        $this->SERVIP = $SERVIP;
    }

    function setSERVLOCALIZACAO($SERVLOCALIZACAO) {
        $this->SERVLOCALIZACAO = $SERVLOCALIZACAO;
    }

    function setSERVNOME($SERVNOME) {
        $this->SERVNOME = $SERVNOME;
    }

    function setSERVCPU($SERVCPU) {
        $this->SERVCPU = $SERVCPU;
    }

    function setSERVMEMORIA($SERVMEMORIA) {
        $this->SERVMEMORIA = $SERVMEMORIA;
    }

    function setSERVDISCO($SERVDISCO) {
        $this->SERVDISCO = $SERVDISCO;
    }

    function setSERVSISTEMA($SERVSISTEMA) {
        $this->SERVSISTEMA = $SERVSISTEMA;
    }

    function setSERVUSER($SERVUSER) {
        $this->SERVUSER = $SERVUSER;
    }

    function setSERVSENHA($SERVSENHA) {
        $this->SERVSENHA = $SERVSENHA;
    }

    function setSERVDESCRICAO($SERVDESCRICAO) {
        $this->SERVDESCRICAO = $SERVDESCRICAO;
    }

    function setSERVSERVICOS($SERVSERVICOS) {
        $this->SERVSERVICOS = $SERVSERVICOS;
    }

	function setCODPC($CODPC) {
        $this->CODPC = $CODPC;
    }

    
}