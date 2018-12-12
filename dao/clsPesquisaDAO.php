<?php
include_once 'model/clsComputador.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsConexao.php';

class PesquisaDAO {

public static function pesquisarNome(){
	
	//	if( isset( $_REQUEST['consultar'] ) ){
		 $servidor = new Servidor();
		 $servidor->setSERVNOME( $_POST['txtNome']  );		 
		
		echo  $_POST['txtNome'];
		
		/*
		
		if  ( $servidor != "" ){
		$nome = $servidor.getSERVNOME();
		
			$sql = " SELECT * FROM `SERVIDORES` WHERE `SERVNOME` LIKE '".$nome."' "
             . " ORDER BY SERVNOME ";
        
        $result = Conexao::consultar($sql);
		
		if( $result!=NULL ){

        $lista = new ArrayObject();
            list($_ID, $_SERVIP , $_SERVLOCALIZACAO , $_SERVNOME , $_SERVCPU , $_SERVMEMORIA , $_SERVDISCO , $_SERVSISTEMA , $_SERVUSER , $_SERVSENHA , $_SERVDESCRICAO , $_SERVSERVICOS ) = mysqli_fetch_row($result);
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
                $lista->append($servidor);
				return $lista;
            
        }else{			
		$sql = " SELECT * FROM `COMPUTADORES` WHERE `PCNOME` LIKE '".$nome."' "
             . " ORDER BY PCNOME ";
        
        $result = Conexao::consultar($sql);	
		
			if( $result!=NULL ){
				
			list($_ID, $_PCCARGO , $_PCSETOR , $_PCNOME , $_PCNOMEANTIGO , $_PCMODELO , $_PCMODELOANTIGO , $_PCPATRIMONIO , $_PCDESCRICAO ) = mysqli_fetch_row($result); 
                $computadores = new Computador();
                $computadores->setID($_ID);
                $computadores->setPCCARGO($_PCCARGO);
				$computadores->setPCSETOR($_PCSETOR);
				$computadores->setPCNOME($_PCNOME);
				$computadores->setPCNOMEANTIGO($_PCNOMEANTIGO);
				$computadores->setPCMODELO($_PCMODELO);
				$computadores->setPCMODELOANTIGO($_PCMODELOANTIGO);
				$computadores->setPCPATRIMONIO($_PCPATRIMONIO);
				$computadores->setPCDESCRICAO($_PCDESCRICAO);
                $lista->append($computadores);
				return $lista;
				
            }else{
				
			$sql = " SELECT * FROM `MONITORES` WHERE `MTNOME` LIKE '".$nome."' "
             . " ORDER BY MTNOME ";
        
			$result = Conexao::consultar($sql);
			if( $result!=NULL ){
				
				$lista = new ArrayObject();
				list($_ID, $_MTCARGO , $_MTRESPONSAVEL , $_MTSETOR , $_MTNOME , $_MTNOMEANTIGO , $_MTMODELO , $_MTMODELOANTIGO , $_MTPATRIMONIO , $_MTDESCRICAO ) = mysqli_fetch_row($result);
                $monitores = new Monitor();
                $monitores->setID($_ID);
                $monitores->setMTCARGO($_MTCARGO);
				$monitores->setMTCARGO($_MTRESPONSAVEL);
				$monitores->setMTSETOR($_MTSETOR);
				$monitores->setMTNOME($_MTNOME);
				$monitores->setMTNOMEANTIGO($_MTNOMEANTIGO);
				$monitores->setMTMODELO($_MTMODELO);
				$monitores->setMTMODELOANTIGO($_MTMODELOANTIGO);
				$monitores->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitores->setMTDESCRICAO($_MTDESCRICAO);
                $lista->append($monitores);
				return $lista;
            }else{
				echo '<p>A pesquisa nao encontrou nenhum resultado</p>'	;
				}
			
			
			}

		
		}
		
	//}else{ 

	//echo '<p>A pesquisa nao encontrou nenhum resultado</p>'	;
	
//	}
		
	
	
        
		
   }*/
 }
}

?>