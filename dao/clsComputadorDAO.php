<?php

class ComputadorDAO {
	
	public static function inserir($computador) {
		  $sql = "INSERT INTO COMPUTADORES "
                . " ( PCNOME , PCMODELO , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR , PCIP, PCSERVICOS , IDPC , IDRP ) VALUES "
                . " ( '" .$computador->getPCNOME()."' , "
				. "  '" . $computador->getPCMODELO()."' , "
				. "  '" . $computador->getPCPATRIMONIO()."' , "
				. "  '" . $computador->getPCDESCRICAO()."' , "
				. "  '" . $computador->getPCSISOP()."' , "
				. "  " . $computador->getPCCPU()." , "
				. "  '" . $computador->getPCMEMORIA()."' , "
				. "  '" . $computador->getPCDISCO()."' , "
				. "  '" . $computador->getPCLOCALIZACAO()."' , "
				. "  '" . $computador->getPCVIRTUAL()."' , "
				. "  '" . $computador->getPCSERVIDOR()."' , "
				. "  '" . $computador->getPCIP()."' , "
				. "  '" . $computador->getPCSERVICOS()."' , "
				. "  '" . $computador->getIDPC()."' , "
				. "  '" . $computador->getIDRP()."'  ); ";
				
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
        $sql = "SELECT PCNOME , PCMODELO , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP  FROM COMPUTADORES ORDER BY PCNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PCNOME , $_PCMODELO , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP) = mysqli_fetch_row($result) ){
                $computadores = new Computador();
                $computadores->setID($_ID);
				$computadores->setPCNOME($_PCNOME);
				$computadores->setPCMODELO($_PCMODELO);
				$computadores->setPCPATRIMONIO($_PCPATRIMONIO);
				$computadores->setPCDESCRICAO($_PCPATRIMONIO);
                $computadores->setPCSISOP($_PCSISOP);
				$computadores->setPCCPU($_PCCPU);
				$computadores->setPCMEMORIA($_PCMEMORIA);
				$computadores->setPCDISCO($_PCDISCO);
				$computadores->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computadores->setPCVIRTUAL($_PCMEMORIA);
				$computadores->setPCSERVIDOR($_PCDISCO);
				$computadores->setPCIP($_PCDISCO);
				$computadores->setPCSERVICOS($_PCDISCO);
				$computadores->setIDPC($_PCDISCO);
				$computadores->setIDRP($_PCDISCO);
				
                $lista->append($computadores);
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
                  $computadores->setID($_ID);
				$computadores->setPCNOME($_PCNOME);
				$computadores->setPCMODELO($_PCMODELO);
				$computadores->setPCPATRIMONIO($_PCPATRIMONIO);
				$computadores->setPCDESCRICAO($_PCPATRIMONIO);
                $computadores->setPCSISOP($_PCSISOP);
				$computadores->setPCCPU($_PCCPU);
				$computadores->setPCMEMORIA($_PCMEMORIA);
				$computadores->setPCDISCO($_PCDISCO);
				$computadores->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computadores->setPCVIRTUAL($_PCMEMORIA);
				$computadores->setPCSERVIDOR($_PCDISCO);
				$computadores->setPCIP($_PCDISCO);
				$computadores->setPCSERVICOS($_PCDISCO);
				$computadores->setIDPC($_PCDISCO);
				$computadores->setIDRP($_PCDISCO);
				
            
        return $computador;
    }
	
}