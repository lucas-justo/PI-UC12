<?php

class ModeloDAO {
	
	public static function inserir($modelo) {
		if($modelo->getMDCATEGORIA() == 0){
		$modelo->setMDCATEGORIA('NULL');
		}
		
		  $sql = "INSERT INTO MODELOS "
                . " ( MDNOME , MDCATEGORIA ) VALUES "
                . " ( '". $modelo->getMDNOME()."' , "
				. " ". $modelo->getMDCATEGORIA()."  ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $modelo ){
        $sql =    "UPDATE MODELOS SET "
                . " MDNOME = '".$modelo->getMDNOME()."' , "		
				. " MDCATEGORIA = ".$modelo->getMDCATEGORIA()." "	
                . " WHERE ID = ".$modelo->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idModelo ){
        $sql =    "DELETE FROM MODELOS "
                . " WHERE ID = ".$idModelo;
        Conexao::executar($sql);
        
    }
	
	public static function getModelo(){
        $sql = "SELECT ID, MDNOME , MDCATEGORIA FROM MODELOS ORDER BY MDNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID , $_MDNOME , $_MDCATEGORIA ) = mysqli_fetch_row($result) ){
                $modelo = new Modelo();
                $modelo->setID($_ID);               
				$modelo->setMDNOME($_MDNOME);	
				$modelo->setMDCATEGORIA($_MDCATEGORIA);
                $lista->append($modelo);
            }
        }
        return $lista;
    }
	
	 public static function getModeloById( $idModelo ){
        $sql = " SELECT ID , MDNOME , MDCATEGORIA "
             . " FROM MODELOS "
             . " WHERE ID = ".$idModelo
             . " ORDER BY MDNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_MDNOME , $_MDCATEGORIA ) = mysqli_fetch_row($result);
                $modelo = new Modelo();
                $modelo->setID($_ID);                
				$modelo->setMDNOME($_MDNOME);	
				$modelo->setMDCATEGORIA($_MDCATEGORIA);
            
        return $modelo;
    }
	
}