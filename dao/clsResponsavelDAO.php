<?php

class ResponsavelDAO {
	
	public static function inserir($responsavel) {
		  $sql = "INSERT INTO RESPONSAVEL "
                . " ( RPNOME , RPCARGO , IDSETOR ) VALUES "
                . " ( '". $responsavel->getRPNOME()."' ,"
				. "  '". $responsavel->getRPCARGO()."' ,"
				. "  ". $responsavel->getIDSETOR()." ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $responsavel ){
        $sql =    "UPDATE RESPONSAVEL SET "
                . " RPNOME = '".$responsavel->getRPNOME()."' , "	
				. " RPCARGO = '".$responsavel->getRPNOME()."' , "
				. " IDSETOR = ".$responsavel->getRPNOME()." "				
                . " WHERE ID = ".$responsavel->getID();
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
                $responsavel = new Responsavel();
                $responsavel->setID($_ID);               
				$responsavel->setRPNOME($_RPNOME);	
				$responsavel->setRPCARGO($_RPCARGO);	
				$responsavel->setIDSETOR($_IDSETOR);					
                $lista->append($responsavel);
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
                $responsavel = new Responsavel();
                $responsavel->setID($_ID);                
				$responsavel->setRPNOME($_RPNOME);
				$responsavel->setRPCARGO($_RPCARGO);	
				$responsavel->setIDSETOR($_IDSETOR);				
            
        return $responsavel;
    }
	
}