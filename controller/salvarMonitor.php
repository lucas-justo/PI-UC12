<?php
include_once '../model/clsMonitor.php';
include_once '../dao/clsMonitorDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $monitor = new Monitor();
    $monitor->setMTNOME( $_POST['txtNome']  );
	$monitor->setMTNOMEANTIGO( $_POST['txtNomeAntigo']  );
	$monitor->setMTSETOR( $_POST['txtSetor']  );
	$monitor->setMTMODELO( $_POST['txtModelo']  );
	$monitor->setMTMODELOANTIGO( $_POST['txtModeloAntigo']  );
	$monitor->setMTPATRIMONIO( $_POST['txtPatrimonio']  );
	$monitor->setMTCARGO( $_POST['txtCargo']  );
	$monitor->setMTRESPONSAVEL( $_POST['txtResponsavel']  );
	$monitor->setMTDESCRICAO( $_POST['txtDesc']  );
    
    MonitorDAO::inserir($monitor);
    
    header("Location: ../monitores.php");
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idServidor'];
    $monitor = MonitorDAO::getMonitorById($id);

    $monitor->setMTNOME( $_POST['txtNome']  );
	$monitor->setMTNOMEANTIGO( $_POST['txtNomeAntigo']  );
	$monitor->setMTSETOR( $_POST['txtSetor']  );
	$monitor->setMTMODELO( $_POST['txtModelo']  );
	$monitor->setMTMODELOANTIGO( $_POST['txtModeloAntigo']  );
	$monitor->setMTPATRIMONIO( $_POST['txtPatrimonio']  );
	$monitor->setMTCARGO( $_POST['txtCargo']  );
	$monitor->setMTRESPONSAVEL( $_POST['txtResponsavel']  );
	$monitor->setMTDESCRICAO( $_POST['txtDesc']  );
    
    MonitorDAO::editar($monitor);
    
    header("Location: ../monitores.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idMonitor'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Monitor </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idMonitor='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../monitores.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idMonitor'];
    MonitorDAO::excluir($id);
    header("Location: ../monitores.php");
}

