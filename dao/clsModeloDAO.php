<?php

class ModeloDAO {
	
	public static function inserir($modelo) {
		  $sql = "INSERT INTO MODELOS "
                . " ( MDNOME ) VALUES "
                . " ( '". $modelo->getMDNOME()."' ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $modelo ){
        $sql =    "UPDATE MODELOS SET "
                . " MDNOME = '".$modelo->getMDNOME()."' "				
                . " WHERE ID = ".$modelo->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idModelo ){
        $sql =    "DELETE FROM MODELOS "
                . " WHERE ID = ".$idModelo;
        Conexao::executar($sql);
        
    }
	
	public static function getModelo(){
        $sql = "SELECT ID, MDNOME FROM MODELOS ORDER BY MDNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_MDNOME ) = mysqli_fetch_row($result) ){
                $modeloes = new Modelo();
                $modeloes->setID($_ID);               
				$modeloes->setMDNOME($_MDNOME);				
                $lista->append($modeloes);
            }
        }
        return $lista;
    }
	
	 public static function getModeloById( $id ){
        $sql = " SELECT ID , MDNOME "
             . " FROM MODELOS "
             . " WHERE ID = ".$id
             . " ORDER BY MDNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_MDNOME ) = mysqli_fetch_row($result);
                $modelo = new Modelo();
                $modelo->setID($_ID);                
				$modelo->setMDNOME($_MDNOME);				
            
        return $modelo;
    }
	
}