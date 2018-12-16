<?php

class Computador {
    private $ID;
	private $PCNOME;
	private $PCMODELO;
	private $PCPATRIMONIO;
	private $PCDESCRICAO;
	private $PCSISOP;
	private $PCCPU;
    private $PCLOCALIZACAO;
	private $PCVIRTUAL;
	private $PCSERVIDOR;
	private $PCIP;	
    private $PCSERVICOS;
	private $IDPC;
	private $IDRP;
    
    
    
    public function __construct( $ID = NULL, $PCLOCALIZACAO = NULL, $PCMEMORIA = NULL, $IDRP = NULL ,
            $PCNOME = NULL, $PCCPU = NULL, $PCMODELO = NULL, $PCSISOP = NULL,
            $PCPATRIMONIO = NULL, $PCDESCRICAO = NULL , $PCVIRTUAL = NULL , $PCSERVICOS = NULL , $IDPC = NULL , $PCIP = NULL , $PCSERVIDOR = NULL){
        
    }
	
    function getID() {
        return $this->ID;
    }
	
	function getPCLOCALIZACAO() {
        return $this->PCLOCALIZACAO;
    }
	
	function getPCSERVIDOR() {
        return $this->PCSERVIDOR;
    }

    function getPCVIRTUAL() {
        return $this->PCVIRTUAL;
    }
	
	  function getPCSERVICOS() {
        return $this->PCSERVICOS;
    }
	
	  function getIDPC() {
        return $this->IDPC;
    }
	
	  function getPCIP() {
        return $this->PCIP;
    }

    function getPCMEMORIA() {
        return $this->PCMEMORIA;
    }
	
	function getIDRP() {
        return $this->IDRP;
    }

    function getPCNOME() {
        return $this->PCNOME;
    }

    function getPCCPU() {
        return $this->PCCPU;
    }

    function getPCMODELO() {
        return $this->PCMODELO;
    }

    function getPCSISOP() {
        return $this->PCSISOP;
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
	
	function setPCVIRTUAL($PCVIRTUAL) {
        return $this->$PCVIRTUAL;
    }
	
	  function setPCSERVICOS($PCSERVICOS) {
        return $this->$PCSERVICOS;
    }
	
	  function setIDPC($IDPC) {
        return $this->$IDPC;
    }
	
	  function setPCIP($PCIP) {
        return $this->$PCIP;
    }

    function setPCLOCALIZACAO($PCLOCALIZACAO) {
        $this->PCLOCALIZACAO = $PCLOCALIZACAO;
    }

    function setPCMEMORIA($PCMEMORIA) {
        $this->PCMEMORIA = $PCMEMORIA;
    }
	
	function setIDRP($IDRP) {
        $this->IDRP = $IDRP;
    }

    function setPCNOME($PCNOME) {
        $this->PCNOME = $PCNOME;
    }

    function setPCCPU($PCCPU) {
        $this->PCCPU = $PCCPU;
    }
	
	function setPCSERVIDOR($PCSERVIDOR) {
        $this->PCCPU = $PCSERVIDOR;
    }

    function setPCMODELO($PCMODELO) {
        $this->PCMODELO = $PCMODELO;
    }

    function setPCSISOP($PCSISOP) {
        $this->PCSISOP = $PCSISOP;
    }

    function setPCPATRIMONIO($PCPATRIMONIO) {
        $this->PCPATRIMONIO = $PCPATRIMONIO;
    }

    function setPCDESCRICAO($PCDESCRICAO) {
        $this->PCDESCRICAO = $PCDESCRICAO;
    }

    
    }