<?php
include_once '../model/clsComputador.php';
include_once '../dao/clsComputadorDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $computador = new Computador();
    $computador->setPCNOME( $_POST['txtNome']  );
	$computador->setPCCPU( $_POST['txtCPU']  );
	$computador->setPCDISCO( $_POST['txtDisco']  );
	$computador->setPCMEMORIA( $_POST['txtMemoria']  );
	$computador->setIDMD( $_POST['stModelo']  );
	$computador->setPCSISOP( $_POST['txtSistema']  );
	$computador->setPCPATRIMONIO( $_POST['txtPatrimonio']  );
	$computador->setPCIP( $_POST['txtIP']  );
	$computador->setIDRP( $_POST['stResp']  );
	$computador->setIDPC( $_POST['stPC']  );
	$computador->setPCVIRTUAL( $_POST['cbVT']  );
	$computador->setPCSERVIDOR( $_POST['cbSV']  );
	$computador->setPCSERVICOS( $_POST['txtServicos']  );
	$computador->setPCDESCRICAO( $_POST['txtDesc']  );
    $computador->setPCLOCALIZACAO( $_POST['stLocal']  );
    ComputadorDAO::inserir($computador);
    
   header("Location: ../computadores.php");
}

if( isset($_REQUEST['editar'])){
    $computador = new Computador();
	$computador->setID( $_REQUEST['idComputador'] );
	$computador->setPCNOME( $_POST['txtNome']  );
	$computador->setPCCPU( $_POST['txtCPU']  );
	$computador->setPCDISCO( $_POST['txtDisco']  );
	$computador->setPCMEMORIA( $_POST['txtMemoria']  );
	$computador->setIDMD( $_POST['stModelo']  );
	$computador->setPCSISOP( $_POST['txtSistema']  );
	$computador->setPCPATRIMONIO( $_POST['txtPatrimonio']  );
	$computador->setPCIP( $_POST['txtIP']  );
	$computador->setIDRP( $_POST['stResp']  );
	$computador->setIDPC( $_POST['stPC']  );
	$computador->setPCVIRTUAL( $_POST['cbVT']  );
	$computador->setPCSERVIDOR( $_POST['cbSV']  );
	$computador->setPCSERVICOS( $_POST['txtServicos']  );
	$computador->setPCDESCRICAO( $_POST['txtDesc']  );
    $computador->setPCLOCALIZACAO( $_POST['stLocal']  );
    
    ComputadorDAO::editar($computador);
    
    header("Location: ../computadores.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idComputador'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Computador </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idComputador='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../computadores.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idComputador'];
    ComputadorDAO::excluir($id);
    header("Location: ../computadores.php");
}

