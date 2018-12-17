<?php

class CategoriaDAO {
	
	public static function inserir($categoria) {
		  $sql = "INSERT INTO CATEGORIAS "
                . " ( CATNOME ) VALUES "
                . " ( '". $categoria->getCATNOME()."' ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $categoria ){
        $sql =    "UPDATE CATEGORIAS SET "
                . " CATNOME = '".$categoria->getCATNOME()."' "				
                . " WHERE ID = ".$categoria->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idModelo ){
        $sql =    "DELETE FROM CATEGORIAS "
                . " WHERE ID = ".$idModelo;
        Conexao::executar($sql);
        
    }
	
	public static function getCategoria(){
        $sql = "SELECT ID, CATNOME FROM CATEGORIAS ORDER BY CATNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID , $_CATNOME ) = mysqli_fetch_row($result) ){
                $categoria = new Categoria();
                $categoria->setID($_ID);               
				$categoria->setCATNOME($_CATNOME);				
                $lista->append($categoria);
            }
        }
        return $lista;
    }
	
	 public static function getCategoriaById( $id ){
        $sql = " SELECT ID , CATNOME "
             . " FROM CATEGORIAS "
             . " WHERE ID = ".$id
             . " ORDER BY CATNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_CATNOME ) = mysqli_fetch_row($result);
                $categoria = new Categoria();
                $categoria->setID($_ID);                
				$categoria->setCATNOME($_CATNOME);				
            
        return $categoria;
    }
	
}