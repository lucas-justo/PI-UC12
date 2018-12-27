<?php
include_once '../model/clsMonitor.php';
include_once '../dao/clsMonitorDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $monitor = new Monitor();
    $monitor->setMTNOME( $_POST['txtNome']  );
	$monitor->setMTPATRIMONIO( $_POST['txtPatrimonio']  );
	$monitor->setMTDESCRICAO( $_POST['txtDesc']  );
    	$monitor->setIDPC( $_POST['stPC']  );
			$monitor->setIDRP( $_POST['stResp']  );
				$monitor->setIDMD( $_POST['stModelo']  );
    MonitorDAO::inserir($monitor);
    
    header("Location: ../monitores.php");
}

if( isset($_REQUEST['editar'])){    
    $monitor = new Monitor();
    $monitor->setID( $_REQUEST['idMonitor'] );
    $monitor->setMTNOME( $_POST['txtNome']  );
	$monitor->setMTPATRIMONIO( $_POST['txtPatrimonio']  );
	$monitor->setMTDESCRICAO( $_POST['txtDesc']  );
	$monitor->setIDPC( $_POST['stPC']  );
	$monitor->setIDRP( $_POST['stResp']  );
	$monitor->setIDMD( $_POST['stModelo']  );
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

