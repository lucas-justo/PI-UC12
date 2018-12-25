<?php

class MonitorDAO {
	
	public static function inserir($monitor) {
		if($monitor->getIDPC() == 0){
		$monitor->setIDPC('NULL');
		}
		if($monitor->getIDRP() == 0){
		$monitor->setIDRP('NULL');
		}
		if($monitor->getIDMD() == 0){
		$monitor->setIDMD('NULL');
		}
		
		  $sql = "INSERT INTO MONITORES "
                . " ( MTNOME ,  MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD ) VALUES "
                . " ( '" . $monitor->getMTNOME()."' , "
				. "  '" . $monitor->getMTPATRIMONIO()."' , "
				. "  '" . $monitor->getMTDESCRICAO()."' , "
				. "  " . $monitor->getIDPC()." , "
				. "  " . $monitor->getIDRP()." , "
				. "  " . $monitor->getIDMD()."  ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $monitor ){
        $sql =    "UPDATE MONITORES SET "
                . " MTNOME = '".$monitor->getMTNOME()."' , "
				. " MTPATRIMONIO = '".$monitor->getMTPATRIMONIO()."' , "
				. " MTDESCRICAO = '".$monitor->getMTDESCRICAO()."' , "
				. " IDPC = ".$monitor->getIDPC()." , "
				. " IDRP = ".$monitor->getIDRP()." , "
				. " IDMD = ".$monitor->getIDMD()."  "
                . " WHERE ID = ".$monitor->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idMonitor ){
        $sql =    "DELETE FROM MONITORES "
                . " WHERE ID = ".$idMonitor;
        Conexao::executar($sql);
        
    }
	
	public static function getMonitores(){
        $sql = "SELECT ID , MTNOME ,  MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD  FROM MONITORES ORDER BY MTNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_MTNOME , $_MTPATRIMONIO , $_MTDESCRICAO , $_IDPC , $_IDRP , $_IDMD ) = mysqli_fetch_row($result) ){
                $monitores = new Monitor();
                $monitores->setID($_ID);
				$monitores->setMTNOME($_MTNOME);
				$monitores->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitores->setMTDESCRICAO($_MTDESCRICAO);
				$monitores->setIDPC($_IDPC);
				$monitores->setIDRP($_IDRP);
				$monitores->setIDMD($_IDMD);
                $lista->append($monitores);
            }
        }
        return $lista;
    }
	
	 public static function getMonitorById( $idMonitor ){
        $sql = " SELECT  ID , MTNOME ,  MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD "
             . " FROM MONITORES "
             . " WHERE ID = ".$idMonitor
             . " ORDER BY MTNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_MTNOME , $_MTPATRIMONIO , $_MTDESCRICAO , $_IDPC , $_IDRP , $_IDMD ) = mysqli_fetch_row($result);
                $monitor = new Monitor();
                $monitor->setID($_ID);
				$monitor->setMTNOME($_MTNOME);
				$monitor->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitor->setMTDESCRICAO($_MTDESCRICAO);
				$monitor->setIDPC($_IDPC);
				$monitor->setIDRP($_IDRP);
				$monitor->setIDMD($_IDMD);
            
        return $monitor;
    }
	
}