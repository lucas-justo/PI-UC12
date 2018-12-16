<?php

class ResponsavelDAO {
	
	public static function inserir($modelo) {
		  $sql = "INSERT INTO RESPONSAVEL "
                . " ( RPNOME , RPCARGO , IDSETOR ) VALUES "
                . " ( '". $modelo->getRPNOME()."' ,"
				. "  '". $modelo->getRPCARGO()."' ,"
				. "  ". $modelo->getIDSETOR()." ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $modelo ){
        $sql =    "UPDATE RESPONSAVEL SET "
                . " RPNOME = '".$modelo->getRPNOME()."' , "	
				. " RPCARGO = '".$modelo->getRPNOME()."' , "
				. " IDSETOR = ".$modelo->getRPNOME()." "				
                . " WHERE ID = ".$modelo->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idResponsavel ){
        $sql =    "DELETE FROM RESPONSAVEL "
                . " WHERE ID = ".$idResponsavel;
        Conexao::executar($sql);
        
    }
	
	public static function getResponsavel(){
        $sql = "SELECT ID , RPNOME , RPCARGO , IDSETOR FROM RESPONSAVEL ORDER BY RPNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_RPNOME , $_RPCARGO , $_IDSETOR ) = mysqli_fetch_row($result) ){
                $modeloes = new Responsavel();
                $modeloes->setID($_ID);               
				$modeloes->setRPNOME($_RPNOME);	
				$modeloes->setRPCARGO($_RPCARGO);	
				$modeloes->setIDSETOR($_IDSETOR);					
                $lista->append($modelos);
            }
        }
        return $lista;
    }
	
	 public static function getResponsavelById( $id ){
        $sql = " SELECT ID , RPNOME , RPCARGO , IDSETOR"
             . " FROM RESPONSAVEL "
             . " WHERE ID = ".$id
             . " ORDER BY RPNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_RPNOME , $_RPCARGO , $_IDSETOR ) = mysqli_fetch_row($result);
                $modelo = new Responsavel();
                $modelo->setID($_ID);                
				$modelo->setRPNOME($_RPNOME);
				$modeloes->setRPCARGO($_RPCARGO);	
				$modeloes->setIDSETOR($_IDSETOR);				
            
        return $modelo;
    }
	
}