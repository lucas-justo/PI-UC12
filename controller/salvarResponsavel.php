<?php
include_once '../model/clsResponsavel.php';
include_once '../dao/clsResponsavelDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $responsavel = new Responsavel();
    $responsavel->setRPNOME( $_POST['txtRPNOME']  );	
	$responsavel->setRPCARGO( $_POST['txtRPCARGO']  );
	$responsavel->setIDSETOR( $_POST['stIDSETOR']  );	
    
    ResponsavelDAO::inserir($responsavel);
    
    header("Location: ../computadores.php");
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idResponsavel'];
    $responsavel = ResponsavelDAO::getResponsavelById($id);

    $responsavel = new Responsavel();
    $responsavel->setRPNOME( $_POST['txtMDNOME']  );
	$responsavel->setRPCARGO( $_POST['txtRPCARGO']  );
	$responsavel->setIDSETOR( $_POST['stIDSETOR']  );	
    
    ResponsavelDAO::editar($responsavel);
    
    header("Location: ../computadores.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idResponsavel'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Responsavel </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idResponsavel='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../computadores.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idResponsavel'];
    ResponsavelDAO::excluir($id);
    header("Location: ../computadores.php");
}

