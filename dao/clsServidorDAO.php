<?php

class ServidorDAO {
	
	public static function inserir($servidor) {
		  $sql = "INSERT INTO SERVIDORES "
                . " ( SERVIP , SERVLOCALIZACAO , SERVNOME , SERVCPU , SERVMEMORIA , SERVDISCO , SERVSISTEMA , SERVUSER , SERVSENHA , SERVDESCRICAO , SERVSERVICOS ) VALUES "
                . " ( '" . $servidor->getSERVIP()."' , "
				. "  '" . $servidor->getSERVLOCALIZACAO()."' , "
				. "  '" . $servidor->getSERVNOME()."' , "
				. "  " . $servidor->getSERVCPU()." , "
				. "  '" . $servidor->getSERVMEMORIA()."' , "
				. "  '" . $servidor->getSERVDISCO()."' , "
				. "  '" . $servidor->getSERVSISTEMA()."' , "
				. "  '" . $servidor->getSERVUSER()."' , "
				. "  '" . $servidor->getSERVSENHA()."' , "
				. "  '" . $servidor->getSERVDESCRICAO()."' , "
				. "  '" . $servidor->getSERVSERVICOS()."' ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $servidor ){
        $sql =    "UPDATE SERVIDORES SET "
                . " SERVNOME = '".$servidor->getSERVNOME()."' "
				. " SERVIP = '".$servidor->getSERVIP()."' "
				. " SERVLOCALIZACAO = '".$servidor->getSERVLOCALIZACAO()."' "
				. " SERVCPU = ".$servidor->getSERVCPU()." "
				. " SERVMEMORIA = '".$servidor->getSERVMEMORIA()."' "
				. " SERVDISCO = '".$servidor->getSERVDISCO()."' "
				. " SERVSISTEMA = '".$servidor->getSERVSISTEMA()."' "
				. " SERVSERVICOS = '".$servidor->getSERVSERVICOS()."' "
				. " SERVUSER = '".$servidor->getSERVUSER()."' "
				. " SERVSENHA = '".$servidor->getSERVSENHA()."' "
				. " SERVDESCRICAO = '".$servidor->getSERVDESCRICAO()."' "
                . " WHERE ID = ".$servidor->getID();
        Conexao::executar($sql);
    }
	
	public static function excluir( $idServidor ){
        $sql =    "DELETE FROM SERVIDORES "
                . " WHERE ID = ".$idServidor;
        Conexao::executar($sql);
        
    }
	
	public static function getServidores(){
        $sql = "SELECT ID, SERVIP , SERVLOCALIZACAO , SERVNOME , SERVCPU , SERVMEMORIA , SERVDISCO , SERVSISTEMA , SERVUSER , SERVSENHA , SERVDESCRICAO , SERVSERVICOS  FROM SERVIDORES ORDER BY SERVNOME";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_SERVIP , $_SERVLOCALIZACAO , $_SERVNOME , $_SERVCPU , $_SERVMEMORIA , $_SERVDISCO , $_SERVSISTEMA , $_SERVUSER , $_SERVSENHA , $_SERVDESCRICAO , $_SERVSERVICOS ) = mysqli_fetch_row($result) ){
                $servidores = new Servidor();
                $servidores->setID($_ID);
                $servidores->setSERVIP($_SERVIP);
				$servidores->setSERVLOCALIZACAO($_SERVLOCALIZACAO);
				$servidores->setSERVNOME($_SERVNOME);
				$servidores->setSERVCPU($_SERVCPU);
				$servidores->setSERVMEMORIA($_SERVMEMORIA);
				$servidores->setSERVDISCO($_SERVDISCO);
				$servidores->setSERVSISTEMA($_SERVSISTEMA);
				$servidores->setSERVUSER($_SERVUSER);
				$servidores->setSERVSENHA($_SERVSENHA);
				$servidores->setSERVDESCRICAO($_SERVDESCRICAO);
				$servidores->setSERVSERVICOS($_SERVSERVICOS);
                $lista->append($servidores);
            }
        }
        return $lista;
    }
	
	 public static function getServidorById( $id ){
        $sql = " SELECT ID , SERVIP , SERVLOCALIZACAO , SERVNOME , SERVCPU , SERVMEMORIA , SERVDISCO , SERVSISTEMA , SERVUSER , SERVSENHA , SERVDESCRICAO , SERVSERVICOS "
             . " FROM SERVIDORES "
             . " WHERE ID = ".$id
             . " ORDER BY SERVNOME ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_SERVIP , $_SERVLOCALIZACAO , $_SERVNOME , $_SERVCPU , $_SERVMEMORIA , $_SERVDISCO , $_SERVSISTEMA , $_SERVUSER , $_SERVSENHA , $_SERVDESCRICAO , $_SERVSERVICOS ) = mysqli_fetch_row($result);
                $servidor = new Servidor();
                $servidor->setID($_ID);
                $servidor->setSERVIP($_SERVIP);
				$servidor->setSERVLOCALIZACAO($_SERVLOCALIZACAO);
				$servidor->setSERVNOME($_SERVNOME);
				$servidor->setSERVCPU($_SERVCPU);
				$servidor->setSERVMEMORIA($_SERVMEMORIA);
				$servidor->setSERVDISCO($_SERVDISCO);
				$servidor->setSERVSISTEMA($_SERVSISTEMA);
				$servidor->setSERVUSER($_SERVUSER);
				$servidor->setSERVSENHA($_SERVSENHA);
				$servidor->setSERVDESCRICAO($_SERVDESCRICAO);
				$servidor->setSERVSERVICOS($_SERVSERVICOS);
            
        return $servidor;
    }
	
}