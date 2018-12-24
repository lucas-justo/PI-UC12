<?php

class ComputadorDAO {
	
	public static function inserir($computador) {
		if($computador->getIDPC() == 0){
		$computador->setIDPC('NULL');
		}
		
		if($computador->getIDRP() == 0){
		$computador->setIDRP('NULL');
		}
		
		if($computador->getIDMD() == 0){
		$computador->setIDMD('NULL');
		}
		
		if($computador->getPCLOCALIZACAO() == 0){
		$computador->setPCLOCALIZACAO('NULL');
		}
		
		  $sql = "INSERT INTO COMPUTADORES "
                . " ( PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR , PCIP, PCSERVICOS , IDPC , IDRP , IDMD ) VALUES "
                . " ( '" .$computador->getPCNOME()."' , "
				. "  '" . $computador->getPCPATRIMONIO()."' , "
				. "  '" . $computador->getPCDESCRICAO()."' , "
				. "  '" . $computador->getPCSISOP()."' , "
				. "  " . $computador->getPCCPU()." , "
				. "  '" .$computador->getPCMEMORIA()."' , "
				. "  '".$computador->getPCDISCO()."' , "
				. "  ".$computador->getPCLOCALIZACAO()." , "
				. "  '" . $computador->getPCVIRTUAL()."' , "
				. "  '" . $computador->getPCSERVIDOR()."' , "
				. "  '" . $computador->getPCIP()."' , "
				. "  '" . $computador->getPCSERVICOS()."' , "
				. " ".$computador->getIDPC()." , "
				. " ".$computador->getIDRP()." , "
				. " ".$computador->getIDMD()."  ); ";		
        Conexao::executar($sql);
	}
	
	public static function editar( $computador ){
        $sql =    "UPDATE COMPUTADORES SET "
                . " PCNOME = '".$computador->getPCNOME()."' , "
				. " PCMODELO = '".$computador->getPCMODELO()."' , "
				. " PCPATRIMONIO = '".$computador->getPCPATRIMONIO()."' , "
				. " PCDESCRICAO = '".$computador->getPCDESCRICAO()."' , "
				. " PCSISOP = '".$computador->getPCSISOP()."' , "
				. " PCCPU = ".$computador->getPCCPU()." , "
				. " PCMEMORIA = '".$computador->getPCMEMORIA()."' , "
				. " PCDISCO = '".$computador->getPCDISCO()."' , "
				. " PCLOCALIZACAO = ".$computador->getPCLOCALIZACAO()." , "
				. " PCVIRTUAL = '".$computador->getPCVIRTUAL()."' , "
				. " PCSERVIDOR = '".$computador->getPCSERVIDOR()."' , "
				. " PCIP = '".$computador->getPCIP()."' , "
				. " PCSERVICOS = '".$computador->getPCSERVICOS()."' , "
				. " IDPC = ".$computador->getIDPC()." , "
				. " IDMD = ".$computador->getIDMD()." , "
				. " IDRP = ".$computador->getIDRP()." "
                . " WHERE ID = ".$computador->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idComputador ){
        $sql =    "DELETE FROM COMPUTADORES "
                . " WHERE ID = ".$idComputador;
        Conexao::executar($sql);
        
    }
	
	public static function getComputadores(){
        $sql = "SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD  FROM COMPUTADORES ORDER BY PCNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD ) = mysqli_fetch_row($result) ){
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCDESCRICAO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				
                $lista->append($computador);
            }
        }
        return $lista;
    }
	
		public static function getServidores(){
        $sql = "SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD  FROM COMPUTADORES WHERE PCSERVIDOR = 'Sim' ORDER BY PCNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD ) = mysqli_fetch_row($result) ){
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCDESCRICAO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				
                $lista->append($computador);
            }
        }
        return $lista;
    }	
	
	 public static function getComputadorById( $idComputador ){
        $sql = " SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD " 
             . " FROM COMPUTADORES "
             . " WHERE ID = ".$idComputador
             . " ORDER BY PCNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result);
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCPATRIMONIO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				
            
        return $computador;
    }
	
}