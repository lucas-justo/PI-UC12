<?php

class LocalizacaoDAO {
	
	public static function inserir($localizacao) {
		  $sql = "INSERT INTO LOCALIZACAO "
                . " ( LZNOME ) VALUES "
                . " ( '". $localizacao->getLZNOME()."' ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $localizacao ){
        $sql =    "UPDATE LOCALIZACAO SET "
                . " LZNOME = '".$localizacao->getLZNOME()."' "				
                . " WHERE ID = ".$localizacao->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idLocalizacao ){
        $sql =    "DELETE FROM LOCALIZACAO "
                . " WHERE ID = ".$idLocalizacao;
        Conexao::executar($sql);
        
    }
	
	public static function getLocalizacao(){
        $sql = "SELECT ID, LZNOME FROM LOCALIZACAO ORDER BY LZNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_LZNOME ) = mysqli_fetch_row($result) ){
                $localizacao = new Localizacao();
                $localizacao->setID($_ID);               
				$localizacao->setLZNOME($_LZNOME);				
                $lista->append($localizacao);
            }
        }
        return $lista;
    }
	
	 public static function getLocalizacaoById( $idLocalizacao ){
        $sql = " SELECT ID , LZNOME "
             . " FROM LOCALIZACAO "
             . " WHERE ID = ".$idLocalizacao
             . " ORDER BY LZNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_LZNOME ) = mysqli_fetch_row($result);
                $localizacao = new Localizacao();
                $localizacao->setID($_ID);                
				$localizacao->setLZNOME($_LZNOME);				
            
        return $localizacao;
    }
	
}