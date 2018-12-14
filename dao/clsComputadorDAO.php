<?php

class ComputadorDAO {
	
	public static function inserir($computador) {
		  $sql = "INSERT INTO COMPUTADORES "
                . " ( PCCARGO , PCRESPONSAVEL , PCSETOR , PCNOME , PCNOMEANTIGO , PCMODELO , PCMODELOANTIGO , PCPATRIMONIO , PCDESCRICAO) VALUES "
                . " ( '" . $computador->getPCCARGO()."' , "
				. "  '" . $computador->getPCRESPONSAVEL()."' , "
				. "  '" . $computador->getPCSETOR()."' , "
				. "  '" . $computador->getPCNOME()."' , "
				. "  '" . $computador->getPCNOMEANTIGO()."' , "
				. "  '" . $computador->getPCMODELO()."' , "
				. "  '" . $computador->getPCMODELOANTIGO()."' , "
				. "  '" . $computador->getPCPATRIMONIO()."' , "
				. "  '" . $computador->getPCDESCRICAO()."'  ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $computador ){
        $sql =    "UPDATE COMPUTADORES SET "
                . " PCNOME = '".$computador->getPCNOME()."' , "
				. " PCCARGO = '".$computador->getPCCARGO()."' , "
				. " PCRESPONSAVEL = '".$computador->getPCRESPONSAVEL()."' , "
				. " PCSETOR = '".$computador->getPCSETOR()."' , "
				. " PCNOMEANTIGO = '".$computador->getPCNOMEANTIGO()."' , "
				. " PCMODELO = '".$computador->getPCMODELO()."' , "
				. " PCMODELOANTIGO = '".$computador->getPCMODELOANTIGO()."' , "
				. " PCPATRIMONIO = '".$computador->getPCPATRIMONIO()."' , "
				. " PCDESCRICAO = '".$computador->getPCDESCRICAO()."' "
                . " WHERE ID = ".$computador->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idComputador ){
        $sql =    "DELETE FROM COMPUTADORES "
                . " WHERE ID = ".$idComputador;
        Conexao::executar($sql);
        
    }
	
	public static function getComputadores(){
        $sql = "SELECT ID, PCCARGO , PCSETOR , PCRESPONSAVEL , PCNOME , PCNOMEANTIGO , PCMODELO , PCMODELOANTIGO , PCPATRIMONIO , PCDESCRICAO  FROM COMPUTADORES ORDER BY PCNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PCCARGO , $_PCSETOR , $_PCRESPONSAVEL , $_PCNOME , $_PCNOMEANTIGO , $_PCMODELO , $_PCMODELOANTIGO , $_PCPATRIMONIO , $_PCDESCRICAO ) = mysqli_fetch_row($result) ){
                $computadores = new Computador();
                $computadores->setID($_ID);
                $computadores->setPCCARGO($_PCCARGO);
				$computadores->setPCRESPONSAVEL($_PCRESPONSAVEL);
				$computadores->setPCSETOR($_PCSETOR);
				$computadores->setPCNOME($_PCNOME);
				$computadores->setPCNOMEANTIGO($_PCNOMEANTIGO);
				$computadores->setPCMODELO($_PCMODELO);
				$computadores->setPCMODELOANTIGO($_PCMODELOANTIGO);
				$computadores->setPCPATRIMONIO($_PCPATRIMONIO);
				$computadores->setPCDESCRICAO($_PCDESCRICAO);
                $lista->append($computadores);
            }
        }
        return $lista;
    }
	
	 public static function getComputadorById( $idComputador ){
        $sql = " SELECT ID , PCCARGO , PCRESPONSAVEL , PCSETOR , PCNOME , PCNOMEANTIGO , PCMODELO , PCMODELOANTIGO , PCPATRIMONIO , PCDESCRICAO  "
             . " FROM COMPUTADORES "
             . " WHERE ID = ".$idComputador;
        
        $result = Conexao::consultar($sql);
      
	    $computador = NULL;
        if( $result != NULL ){
	  
        list( $_ID, $_PCCARGO , $_PCRESPONSAVEL , $_PCSETOR , $_PCNOME , $_PCNOMEANTIGO , $_PCMODELO , $_PCMODELOANTIGO , $_PCPATRIMONIO , $_PCDESCRICAO ) = mysqli_fetch_row($result);
                $computador = new Computador();
                $computador->setID($_ID);
                $computador->setPCCARGO($_PCCARGO);
				$computador->setPCRESPONSAVEL($_PCRESPONSAVEL);
				$computador->setPCSETOR($_PCSETOR);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCNOMEANTIGO($_PCNOMEANTIGO);
				$computador->setPCMODELO($_PCMODELO);
				$computador->setPCMODELOANTIGO($_PCMODELOANTIGO);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCDESCRICAO);
		}
        return $computador;
    }
	
	public static function getComputadorByPatrimonio( $pesq ){
        $sql = " SELECT ID , PCCARGO , PCRESPONSAVEL , PCSETOR , PCNOME , PCNOMEANTIGO , PCMODELO , PCMODELOANTIGO , PCPATRIMONIO , PCDESCRICAO  "
             . " FROM COMPUTADORES "
             . " WHERE PCPATRIMONIO = ".$pesq;
        
        $result = Conexao::consultar($sql);
     
		$lista = new ArrayObject(); 
	   
	   if( $result != NULL ){
	   
         while( list( $_ID, $_PCCARGO , $_PCRESPONSAVEL , $_PCSETOR , $_PCNOME , $_PCNOMEANTIGO , $_PCMODELO , $_PCMODELOANTIGO , $_PCPATRIMONIO , $_PCDESCRICAO ) = mysqli_fetch_row($result) ){
                $computador = new Computador();
                $computador->setID($_ID);
                $computador->setPCCARGO($_PCCARGO);
				$computador->setPCRESPONSAVEL($_PCRESPONSAVEL);
				$computador->setPCSETOR($_PCSETOR);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCNOMEANTIGO($_PCNOMEANTIGO);
				$computador->setPCMODELO($_PCMODELO);
				$computador->setPCMODELOANTIGO($_PCMODELOANTIGO);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCDESCRICAO);
				$lista->append($computador);
		 }
		}
        return $lista;
    }
}