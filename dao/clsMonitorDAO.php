<?php

class MonitorDAO {
	
	public static function inserir($monitor) {
		  $sql = "INSERT INTO MONITORES "
                . " ( MTCARGO , MTSETOR , MTRESPONSAVEL , MTNOME , MTNOMEANTIGO , MTMODELO , MTMODELOANTIGO , MTPATRIMONIO , MTDESCRICAO) VALUES "
                . " ( '" . $monitor->getMTCARGO()."' , "
				. "  '" . $monitor->getMTSETOR()."' , "
				. "  '" . $monitor->getMTRESPONSAVEL()."' , "
				. "  '" . $monitor->getMTNOME()."' , "
				. "  '" . $monitor->getMTNOMEANTIGO()."' , "
				. "  '" . $monitor->getMTMODELO()."' , "
				. "  '" . $monitor->getMTMODELOANTIGO()."' , "
				. "  '" . $monitor->getMTPATRIMONIO()."' , "
				. "  '" . $monitor->getMTDESCRICAO()."'  ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $monitor ){
        $sql =    "UPDATE MONITORES SET "
                . " MTNOME = '".$monitor->getMTNOME()."' "
				. " MTCARGO = '".$monitor->getMTCARGO()."' "
				. " MTRESPONSAVEL = '".$monitor->getMTRESPONSAVEL()."' "
				. " MTSETOR = '".$monitor->getMTSETOR()."' "
				. " MTNOMEANTIGO = '".$monitor->getMTNOMEANTIGO()."' "
				. " MTMODELO = '".$monitor->getMTMODELO()."' "
				. " MTMODELOANTIGO = '".$monitor->getMTMODELOANTIGO()."' "
				. " MTPATRIMONIO = '".$monitor->getMTPATRIMONIO()."' "
				. " MTDESCRICAO = '".$monitor->getMTDESCRICAO()."' "
                . " WHERE ID = ".$monitor->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idMonitor ){
        $sql =    "DELETE FROM MONITORES "
                . " WHERE ID = ".$idmonitor;
        Conexao::executar($sql);
        
    }
	
	public static function getMonitores(){
        $sql = "SELECT ID, MTCARGO , MTRESPONSAVEL , MTSETOR , MTNOME , MTNOMEANTIGO , MTMODELO , MTMODELOANTIGO , MTPATRIMONIO , MTDESCRICAO  FROM MONITORES ORDER BY MTNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_MTCARGO , $_MTRESPONSAVEL , $_MTSETOR , $_MTNOME , $_MTNOMEANTIGO , $_MTMODELO , $_MTMODELOANTIGO , $_MTPATRIMONIO , $_MTDESCRICAO ) = mysqli_fetch_row($result) ){
                $monitores = new Monitor();
                $monitores->setID($_ID);
                $monitores->setMTCARGO($_MTCARGO);
				$monitores->setMTRESPONSAVEL($_MTRESPONSAVEL);
				$monitores->setMTSETOR($_MTSETOR);
				$monitores->setMTNOME($_MTNOME);
				$monitores->setMTNOMEANTIGO($_MTNOMEANTIGO);
				$monitores->setMTMODELO($_MTMODELO);
				$monitores->setMTMODELOANTIGO($_MTMODELOANTIGO);
				$monitores->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitores->setMTDESCRICAO($_MTDESCRICAO);
                $lista->append($monitores);
            }
        }
        return $lista;
    }
	
	 public static function getMonitorById( $id ){
        $sql = " SELECT ID , MTCARGO , MTRESPONSAVEL , MTSETOR , MTNOME , MTNOMEANTIGO , MTMODELO , MTMODELOANTIGO , MTPATRIMONIO , MTDESCRICAO  "
             . " FROM MONITORES "
             . " WHERE ID = ".$id
             . " ORDER BY MTNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_MTCARGO , $_MTSETOR , $_MTRESPONSAVEL , $_MTNOME , $_MTNOMEANTIGO , $_MTMODELO , $_MTMODELOANTIGO , $_MTPATRIMONIO , $_MTDESCRICAO ) = mysqli_fetch_row($result);
                $monitor = new Monitor();
                $monitor->setID($_ID);
                $monitor->setMTCARGO($_MTCARGO);
				$monitor->setMTRESPONSAVEL($_MTRESNPONSAVEL);
				$monitor->setMTSETOR($_MTSETOR);
				$monitor->setMTNOME($_MTNOME);
				$monitor->setMTNOMEANTIGO($_MTNOMEANTIGO);
				$monitor->setMTMODELO($_MTMODELO);
				$monitor->setMTMODELOANTIGO($_MTMODELOANTIGO);
				$monitor->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitor->setMTDESCRICAO($_MTDESCRICAO);
            
        return $monitor;
    }
	
}