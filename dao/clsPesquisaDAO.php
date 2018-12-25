<?php

class PesquisaDAO {
	
	/* Pesquisar Computadores*/
	
		public static function getComputadorByNome( $nome ){
        $sql = " SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD " 
             . " FROM COMPUTADORES "
             . " WHERE PCNOME = '".$nome."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCPATRIMONIO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				$lista->append($computador);
			}	
		}
        return $lista;
	
}


		public static function getComputadorByPatrimonio( $patrimonio ){
        $sql = " SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD " 
             . " FROM COMPUTADORES "
             . " WHERE PCPATRIMONIO = '".$patrimonio."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCPATRIMONIO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				$lista->append($computador);
			}	
		}
        return $lista;
	
}

		public static function getComputadorByModelo( $modelo ){
        $sql = " SELECT ID , PCNOME , PCPATRIMONIO , PCDESCRICAO , PCSISOP , PCCPU , PCMEMORIA, PCDISCO, PCLOCALIZACAO , PCVIRTUAL , PCSERVIDOR, PCIP, PCSERVICOS , IDPC , IDRP , IDMD " 
             . " FROM COMPUTADORES "
             . " WHERE IDMD = '".$modelo."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_PCNOME , $_PCPATRIMONIO ,  $_PCDESCRICAO , $_PCSISOP , $_PCCPU , $_PCMEMORIA ,  $_PCDISCO , $_PCLOCALIZACAO , $_PCVIRTUAL , $_PCSERVIDOR , $_PCIP , $_PCSERVICOS , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $computador = new Computador();
                $computador->setID($_ID);
				$computador->setPCNOME($_PCNOME);
				$computador->setPCPATRIMONIO($_PCPATRIMONIO);
				$computador->setPCDESCRICAO($_PCPATRIMONIO);
                $computador->setPCSISOP($_PCSISOP);
				$computador->setPCCPU($_PCCPU);
				$computador->setPCMEMORIA($_PCMEMORIA);
				$computador->setPCDISCO($_PCDISCO);
				$computador->setPCLOCALIZACAO($_PCLOCALIZACAO);
				$computador->setPCVIRTUAL($_PCVIRTUAL);
				$computador->setPCSERVIDOR($_PCSERVIDOR);
				$computador->setPCIP($_PCIP);
				$computador->setPCSERVICOS($_PCSERVICOS);
				$computador->setIDPC($_IDPC);
				$computador->setIDRP($_IDRP);
				$computador->setIDMD($_IDMD);
				$lista->append($computador);
			}	
		}
        return $lista;
	
}

		/* Pesquisar Monitores */
		
		public static function getMonitorByPatrimonio( $patrimonio ){
        $sql = " SELECT ID , MTNOME , MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD " 
             . " FROM MONITORES "
             . " WHERE MTPATRIMONIO = '".$patrimonio."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_MTNOME , $_MTPATRIMONIO , $_MTDESCRICAO , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $monitor = new Monitor();
                $monitor->setID($_ID);
				$monitor->setMTNOME($_MTNOME);
				$monitor->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitor->setMTDESCRICAO($_MTDESCRICAO);
				$monitor->setIDPC($_IDPC);
				$monitor->setIDRP($_IDRP);
				$monitor->setIDMD($_IDMD);
				$lista->append($monitor);
			}	
		}
        return $lista;
	
}

public static function getMonitorByModelo( $modelo ){
        $sql = " SELECT ID , MTNOME , MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD " 
             . " FROM MONITORES "
             . " WHERE IDMD = '".$modelo."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_MTNOME , $_MTPATRIMONIO , $_MTDESCRICAO , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $monitor = new Monitor();
                $monitor->setID($_ID);
				$monitor->setMTNOME($_MTNOME);
				$monitor->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitor->setMTDESCRICAO($_MTDESCRICAO);
				$monitor->setIDPC($_IDPC);
				$monitor->setIDRP($_IDRP);
				$monitor->setIDMD($_IDMD);
				$lista->append($monitor);
			}	
		}
        return $lista;
	
}

public static function getMonitorByNome( $nome ){
        $sql = " SELECT ID , MTNOME , MTPATRIMONIO , MTDESCRICAO , IDPC , IDRP , IDMD " 
             . " FROM MONITORES "
             . " WHERE MTNOME = '".$nome."' ";        
        $result = Conexao::consultar($sql);
		 $lista = new ArrayObject();
        if( $result != NULL ){      
         while( list( $_ID, $_MTNOME , $_MTPATRIMONIO , $_MTDESCRICAO , $_IDPC , $_IDRP , $_IDMD  ) = mysqli_fetch_row($result)){
                $monitor = new Monitor();
                $monitor->setID($_ID);
				$monitor->setMTNOME($_MTNOME);
				$monitor->setMTPATRIMONIO($_MTPATRIMONIO);
				$monitor->setMTDESCRICAO($_MTDESCRICAO);
				$monitor->setIDPC($_IDPC);
				$monitor->setIDRP($_IDRP);
				$monitor->setIDMD($_IDMD);
				$lista->append($monitor);
			}	
		}
        return $lista;
	
}

		
		/* Pesquisar Pontos */
		
		
		/* Pesquisar Switches */

}