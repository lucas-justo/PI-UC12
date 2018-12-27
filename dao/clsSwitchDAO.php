<?php

class SwitchDAO {
	
	public static function inserir($switch) {
			if($switch->getIDSETOR() == 0){
		$switch->setIDSETOR('NULL');
		}
		
			if($switch->getIDMD() == 0){
		$switch->setIDMD('NULL');
		}
		
		  $sql = "INSERT INTO SWITCHES "
                . " ( STCODIGO , STIP , STUSER , STSENHA , STPATRIMONIO ,  STDESCRICAO , IDSETOR , IDMD ) VALUES "
                . " ( '" . $switch->getSTCODIGO()."' , "
				. "  '" . $switch->getSTIP()."' , "
				. "  '" . $switch->getSTUSER()."' , "
				. "  '" . $switch->getSTSENHA()."' , "
				. "  '" . $switch->getSTPATRIMONIO()."' , "
				. "  '" . $switch->getSTDESCRICAO()."' , "
				. "  " . $switch->getIDSETOR()." , "
				. "  " . $switch->getIDMD()." ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $switch ){		
			if($switch->getIDSETOR() == 0){
			$switch->setIDSETOR('NULL');
		}		
			if($switch->getIDMD() == 0){
			$switch->setIDMD('NULL');
		}
		
        $sql =    "UPDATE SWITCHES SET "
                . " STCODIGO = '".$switch->getSTCODIGO()."' , "
				. " STIP = '".$switch->getSTIP()."' , "
				. " STUSER = '".$switch->getSTUSER()."' , "
				. " STPATRIMONIO = '".$switch->getSTPATRIMONIO()."' , "
				. " STDESCRICAO = '".$switch->getSTDESCRICAO()."' , "
				. " STSENHA = '".$switch->getSTSENHA()."' , "
				. " IDSETOR = ".$switch->getIDSETOR()." , "
				. " IDMD = ".$switch->getIDMD()." "
                . " WHERE ID = ".$switch->getID();
				
        Conexao::executar($sql);
    
    }
	
	public static function excluir( $idSwitch ){
        $sql =    "DELETE FROM SWITCHES "
                . "WHERE ID = ".$idSwitch;
        Conexao::executar($sql);        
    }	
	
	public static function getSwitches(){
        $sql = "SELECT ID, STCODIGO , STIP , STUSER , STSENHA , STPATRIMONIO ,  STDESCRICAO , IDSETOR , IDMD  FROM SWITCHES ORDER BY STCODIGO";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_STCODIGO , $_STIP , $_STUSER , $_STSENHA , $_STPATRIMONIO , $_STDESCRICAO , $_IDSETOR , $_IDMD ) = mysqli_fetch_row($result) ){
                $switch = new _Switch();
                $switch->setID($_ID);
                $switch->setSTCODIGO($_STCODIGO);
				$switch->setSTIP($_STIP);
				$switch->setSTUSER($_STUSER);
				$switch->setSTSENHA($_STSENHA);
				$switch->setSTPATRIMONIO($_STPATRIMONIO);
				$switch->setSTDESCRICAO($_STDESCRICAO);
				$switch->setIDSETOR($_IDSETOR);
				$switch->setIDMD($_IDMD);
                $lista->append($switch);
            }
        }
        return $lista;
    }
	
	 public static function getSwitchById( $idSwitch ){
        $sql = " SELECT ID, STCODIGO , STIP , STUSER , STSENHA , STPATRIMONIO ,  STDESCRICAO , IDSETOR , IDMD "
             . " FROM SWITCHES "
             . " WHERE ID = ".$idSwitch
             . " ORDER BY STCODIGO ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_STCODIGO , $_STIP , $_STUSER , $_STSENHA , $_STPATRIMONIO , $_STDESCRICAO , $_IDSETOR , $_IDMD  ) = mysqli_fetch_row($result);
                $switch = new _Switch();
                $switch->setID($_ID);
                $switch->setSTCODIGO($_STCODIGO);
				$switch->setSTIP($_STIP);
				$switch->setSTUSER($_STUSER);
				$switch->setSTSENHA($_STSENHA);
				$switch->setSTPATRIMONIO($_STPATRIMONIO);
				$switch->setSTDESCRICAO($_STDESCRICAO);
				$switch->setIDSETOR($_IDSETOR);
				$switch->setIDMD($_IDMD);
            
        return $switch;
    }
	
}