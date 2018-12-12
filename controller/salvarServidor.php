<?php
include_once '../model/clsServidor.php';
include_once '../dao/clsServidorDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
	
    $servidor = new Servidor();
    $servidor->setSERVNOME( $_POST['txtNome']  );
	$servidor->setSERVIP( $_POST['txtIP']  );
	$servidor->setSERVLOCALIZACAO( $_POST['txtLocal']  );
	$servidor->setSERVCPU( $_POST['txtCPU']  );
	$servidor->setSERVMEMORIA( $_POST['txtMemoria']  );
	$servidor->setSERVDISCO( $_POST['txtDisco']  );
	$servidor->setSERVSISTEMA( $_POST['txtSistema']  );
	$servidor->setSERVUSER( $_POST['txtUser']  );
	$servidor->setSERVSENHA( $_POST['txtPass']  );
	$servidor->setSERVSERVICOS( $_POST['txtServ']  );
	$servidor->setSERVDESCRICAO( $_POST['txtDesc']  );
	$servidor->setCODPC( $_POST['txtCODPC']  );
    
    ServidorDAO::inserir($servidor);
    
    header("Location: ../servidores.php");
}

if( isset($_REQUEST['editar'])){
    
	$servidor = new Servidor();
	$servidor->setID( $_REQUEST['idServidor'] );
	$servidor->setSERVNOME( $_POST['txtNome'] );
	
    //$id = $_REQUEST['idServidor'];
    //$servidor = ServidorDAO::getServidorById($id);

    //$servidor->setSERVNOME( $_POST['txtNome']  );
	$servidor->setSERVIP( $_POST['txtIP']  );
	$servidor->setSERVLOCALIZACAO( $_POST['txtLocal']  );
	$servidor->setSERVCPU( $_POST['txtCPU']  );
	$servidor->setSERVMEMORIA( $_POST['txtMemoria']  );
	$servidor->setSERVDISCO( $_POST['txtDisco']  );
	$servidor->setSERVSISTEMA( $_POST['txtSistema']  );
	$servidor->setSERVUSER( $_POST['txtUser']  );
	$servidor->setSERVSENHA( $_POST['txtPass']  );
	$servidor->setSERVSERVICOS( $_POST['txtServ']  );
	$servidor->setSERVDESCRICAO( $_POST['txtDesc']  );
	$servidor->setCODPC( $_POST['txtCODPC']  );
    
    ServidorDAO::editar($servidor);
    
    header("Location: ../servidores.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idServidor'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Servidor </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idServidor='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../servidores.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idServidor'];
    ServidorDAO::excluir($id);
    header("Location: ../servidores.php");
}

