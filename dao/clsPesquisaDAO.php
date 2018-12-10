<?php

class PesquisaDAO {

public static function pesquisarNome( $nome ){
        $sql = " SELECT * FROM `servidores` WHERE `SERVNOME` LIKE '".$nome."' "
             . " ORDER BY SERVNOME ";
        
        $result = Conexao::consultar($sql);
		
		if( $result!=NULL ){

        $lista = new ArrayObject();
        if( $result != NULL ){
            list($_ID, $_SERVIP , $_SERVLOCALIZACAO , $_SERVNOME , $_SERVCPU , $_SERVMEMORIA , $_SERVDISCO , $_SERVSISTEMA , $_SERVUSER , $_SERVSENHA , $_SERVDESCRICAO , $_SERVSERVICOS ) = mysqli_fetch_row($result) )
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
		
		}else{			
		$sql = " SELECT * FROM `computadores` WHERE `PCNOME` LIKE '".$nome."' "
             . " ORDER BY PCNOME ";
        
        $result = Conexao::consultar($sql);	
		
			if( $result!=NULL ){
				
			list($_ID, $_PCCARGO , $_PCSETOR , $_PCNOME , $_PCNOMEANTIGO , $_PCMODELO , $_PCMODELOANTIGO , $_PCPATRIMONIO , $_PCDESCRICAO ) = mysqli_fetch_row($result) )
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
            }
        }
        return $lista;
			
			}else{
			$sql = " SELECT * FROM `monitores` WHERE `MTNOME` LIKE '".$nome."' "
             . " ORDER BY MTNOME ";
        
			$result = Conexao::consultar($sql);
			if( $result!=NULL ){
				
				$lista = new ArrayObject();
				list($_ID, $_MTCARGO , $_MTRESPONSAVEL , $_MTSETOR , $_MTNOME , $_MTNOMEANTIGO , $_MTMODELO , $_MTMODELOANTIGO , $_MTPATRIMONIO , $_MTDESCRICAO ) = mysqli_fetch_row($result) )
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
            }
        }
        return $lista;
				
				}else{
				echo '<p>a pesquisa nao encontrou nenhum resultado</p>'	
				}
			
			
			}

		
		}
		
    }
	
}

?>