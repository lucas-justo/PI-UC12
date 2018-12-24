<?php
include_once '../model/clsPonto.php';
include_once '../dao/clsPontoDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $ponto = new Ponto();
    $ponto->setPTCODIGO( $_POST['txtNome']  );
	$ponto->setPTPATRIMONIO( $_POST['txtPatrimonio']  );
	$ponto->setPTIP( $_POST['txtIP']  );
	$ponto->setPTPORTA( $_POST['txtPorta']  );
	$ponto->setPTMAC( $_POST['txtMAC']  );
	$ponto->setPTDESCRICAO( $_POST['txtDesc']  );
    $ponto->setIDSETOR( $_POST['stSetor']  );
	$ponto->setIDSWITCH( $_POST['stSwitch']  );
	$ponto->setIDMD( $_POST['stModelo']  );
    PontoDAO::inserir($ponto);
    
    header("Location: ../pontos.php");
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idServidor'];
    $ponto = PontoDAO::getPontoById($id);

    $ponto->setPTCODIGO( $_POST['txtNome']  );
	$ponto->setPTNOMEANTIGO( $_POST['txtNomeAntigo']  );
	$ponto->setPTSETOR( $_POST['txtSetor']  );
	$ponto->setPTMODELO( $_POST['txtModelo']  );
	$ponto->setPTMODELOANTIGO( $_POST['txtModeloAntigo']  );
	$ponto->setPTPATRIMONIO( $_POST['txtPatrimonio']  );
	$ponto->setPTCARGO( $_POST['txtCargo']  );
	$ponto->setPTRESPONSAVEL( $_POST['txtResponsavel']  );
	$ponto->setPTDESCRICAO( $_POST['txtDesc']  );
    
    PontoDAO::editar($ponto);
    
    header("Location: ../pontos.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idPonto'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Ponto </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idPonto='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../pontos.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idPonto'];
    PontoDAO::excluir($id);
    header("Location: ../pontos.php");
}

