<?php

class SetorDAO {
	
	public static function inserir($setor) {
		  $sql = "INSERT INTO SETOR "
                . " ( STNOME ) VALUES "
                . " ( '". $setor->getSTNOME()."' ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $setor ){
        $sql =    "UPDATE SETOR SET "
                . " STNOME = '".$setor->getSTNOME()."' "				
                . " WHERE ID = ".$setor->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idSetor ){
        $sql =    "DELETE FROM SETOR "
                . " WHERE ID = ".$idSetor;
        Conexao::executar($sql);
        
    }
	
	public static function getSetor(){
        $sql = "SELECT ID, STNOME FROM SETOR ORDER BY STNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_STNOME ) = mysqli_fetch_row($result) ){
                $setores = new Setor();
                $setores->setID($_ID);               
				$setores->setSTNOME($_STNOME);				
                $lista->append($setores);
            }
        }
        return $lista;
    }
	
	 public static function getSetorById( $id ){
        $sql = " SELECT ID , STNOME "
             . " FROM SETOR "
             . " WHERE ID = ".$id
             . " ORDER BY STNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_STNOME ) = mysqli_fetch_row($result);
                $setor = new Setor();
                $setor->setID($_ID);                
				$setor->setSTNOME($_STNOME);				
            
        return $setor;
    }
	
}