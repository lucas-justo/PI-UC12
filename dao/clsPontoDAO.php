<?php

class PontoDAO {
	
	public static function inserir($ponto) {
			if($ponto->getIDSWITCH() == 0){
			$ponto->setIDSWITCH('NULL');
		}
		
			if($ponto->getIDSETOR() == 0){
			$ponto->setIDSETOR('NULL');
		}
		
			if($ponto->getIDMD() == 0){
			$ponto->setIDMD('NULL');
		}
		
		  $sql = "INSERT INTO PONTOS "
                . " ( PTCODIGO , PTIP , PTPORTA , PTPATRIMONIO ,  PTDESCRICAO , PTMAC , IDSETOR , IDMD , IDSWITCH) VALUES "
                . " ( " . $ponto->getPTCODIGO()." , "
				. "  '" . $ponto->getPTIP()."' , "
				. "  " . $ponto->getPTPORTA()." , "
				. "  '" . $ponto->getPTPATRIMONIO()."' , "
				. "  '" . $ponto->getPTDESCRICAO()."' , "
				. "  '" . $ponto->getPTMAC()."' , "
				. "  " . $ponto->getIDSETOR()." , "
				. "  " . $ponto->getIDMD()." , "
				. "  " . $ponto->getIDSWITCH()." ); ";
				
        Conexao::executar($sql);
	}
	
	public static function editar( $ponto ){
        $sql = "INSERT INTO PONTOS "
                . " ( PTCODIGO , PTIP , PTPORTA , PTPATRIMONIO ,  PTDESCRICAO , PTMAC , IDSETOR , IDMD , IDSWITCH ) VALUES "
                . " ( " . $ponto->getPTCODIGO()." , "
				. "  '" . $ponto->getPTIP()."' , "
				. "  " . $ponto->getPTPORTA()." , "
				. "  '" . $ponto->getPTPATRIMONIO()."' , "
				. "  '" . $ponto->getPTDESCRICAO()."' , "
				. "  '" . $ponto->getPTMAC()."' , "
				. "  " . $ponto->getIDSETOR()." , "
				. "  " . $ponto->getIDMD()." , "
				. "  " . $ponto->getIDSWITCH()." ); ";
				
        Conexao::executar($sql);
    }
	
	public static function excluir( $idPonto ){
        $sql =    "DELETE FROM PONTOS "
                . "WHERE ID = ".$idPonto;
        Conexao::executar($sql);
        
    }
	
	public static function getPontos(){
        $sql = "SELECT ID, PTCODIGO , PTIP , PTPORTA , PTPATRIMONIO ,  PTDESCRICAO , PTMAC , IDSETOR , IDMD , IDSWITCH  FROM PONTOS ORDER BY PTCODIGO";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_ID, $_PTCODIGO , $_PTIP , $_PTPORTA , $_PTPATRIMONIO , $_PTDESCRICAO , $_PTMAC , $_IDSETOR , $_IDMD , $_IDSWITCH ) = mysqli_fetch_row($result) ){
                $ponto = new Ponto();
                $ponto->setID($_ID);
                $ponto->setPTCODIGO($_PTCODIGO);
				$ponto->setPTIP($_PTIP);
				$ponto->setPTPORTA($_PTPORTA);
				$ponto->setPTPATRIMONIO($_PTPATRIMONIO);
				$ponto->setPTDESCRICAO($_PTDESCRICAO);
				$ponto->setPTMAC($_PTMAC);
				$ponto->setIDSETOR($_IDSETOR);
				$ponto->setIDMD($_IDMD);
				$ponto->setIDSWITCH($_IDSWITCH);
                $lista->append($ponto);
            }
        }
        return $lista;
    }
	
	 public static function getPontoById( $idPonto ){
        $sql = " SELECT ID, PTCODIGO , STIP , PTPORTA , PTPATRIMONIO ,  PTDESCRICAO , PTMAC , IDSETOR , IDMD , IDSWITCH"
             . " FROM PONTOS "
             . " WHERE ID = ".$idPonto
             . " ORDER BY PTCODIGO ";
        
        $result = Conexao::consultar($sql);
      
        list( $_ID, $_PTCODIGO , $_PTIP , $_PTPORTA , $_PTPATRIMONIO , $_PTDESCRICAO , $_PTMAC , $_IDSETOR , $_IDMD , $_IDSWITCH  ) = mysqli_fetch_row($result);
                $ponto = new Ponto();
                $ponto->setID($_ID);
                $ponto->setPTCODIGO($_PTCODIGO);
				$ponto->setPTIP($_PTIP);
				$ponto->setPTPATRIMONIO($_PTPATRIMONIO);
				$ponto->setPTDESCRICAO($_PTDESCRICAO);
				$ponto->setPTMAC($_PTMAC);
				$ponto->setIDSETOR($_IDSETOR);
				$ponto->setIDMD($_IDMD);
				$ponto->setIDSWITCH($_IDSWITCH);
            
        return $ponto;
    }
	
}