<?php

class ComputadorDAO {
	
	public static function inserir($computador) {
		  $sql = "INSERT INTO COMPUTADORES "
                . " ( PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR , PCIP, PCSERVICOS , IDPC , IDRP , IDMD ) VALUES "
                . " ( '" .$computador->getPCNOME()."' , "
				. "  '" . $computador->getPCPATRIMONIO()."' , "
				. "  '" . $computador->getPCDESCRICAO()."' , "
				. "  '" . $computador->getPCSISOP()."' , "
				. "  " . $computador->getPCCPU()." , "
				. "  '" . $computador->getPCMEMORIA()."' , "
				. "  '" . $computador->getPCDISCO()."' , "
				. "  " . $computador->getPCLOCALIZACAO()." , "
				. "  '" . $computador->getPCVIRTUAL()."' , "
				. "  '" . $computador->getPCSERVIDOR()."' , "
				. "  '" . $computador->getPCIP()."' , "
				. "  '" . $computador->getPCSERVICOS()."' , "
				. "  " . $computador->getIDPC()." , "
				. "  " . $computador->getIDRP()."  ); ";
				
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
				. " PCLOCALIZACAO = '".$computador->getPCLOCALIZACAO()."' , "
				. " PCVIRTUAL = '".$computador->getPCDISCO()."' , "
				. " PCSERVIDOR = '".$computador->getPCDISCO()."' , "
				. " PCIP = '".$computador->getPCDISCO()."' , "
				. " PCSERVICOS = '".$computador->getPCDISCO()."' , "
				. " IDPC = '".$computador->getPCDISCO()."' , "
				. " IDRP = '".$computador->getPCDISCO()."' "
                . " WHERE ID = ".$computador->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idComputador ){
        $sql =    "DELETE FROM COMPUTADORES "
                . " WHERE ID = ".$idComputador;
        Conexao::executar($sql);
        
    }
	
	public static function getComputadores(){
        $sql = "SELECT PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD  FROM COMPUTADORES ORDER BY PCNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD ) = mysqli_fetch_row($result) ){
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
				
                $lista->append($computador);
            }
        }
        return $lista;
    }
	
	 public static function getComputadorById( $idComputador ){
        $sql = " SELECT PCNOME , PCMODELO , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP  "
             . " FROM COMPUTADORES "
             . " WHERE ID = ".$idComputador
             . " ORDER BY PCNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_PCNOME , $_PCMODELO , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP ) = mysqli_fetch_row($result);
                $computador = new Computador();
                  $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCMODELO($_PCMODELO);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCPATRIMONIO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCMEMORIA);
				$computador->setPCSERVIDOR($_PCDISCO);
				$computador->setPCIP($_PCDISCO);
				$computador->setPCSERVICOS($_PCDISCO);
				$computador->setIDPC($_PCDISCO);
				$computador->setIDRP($_PCDISCO);
				
            
        return $computador;
    }
	
}