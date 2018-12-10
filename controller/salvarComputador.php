<?php
include_once '../model/clsComputador.php';
include_once '../dao/clsComputadorDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $computador = new Computador();
    $computador->setPCNOME( $_POST['txtNome']  );
	$computador->setPCNOMEANTIGO( $_POST['txtNomeAntigo']  );
	$computador->setPCSETOR( $_POST['txtSetor']  );
	$computador->setPCMODELO( $_POST['txtModelo']  );
	$computador->setPCMODELOANTIGO( $_POST['txtModeloAntigo']  );
	$computador->setPCPATRIMONIO( $_POST['txtPatrimonio']  );
	$computador->setPCCARGO( $_POST['txtCargo']  );
	$computador->setPCRESPONSAVEL( $_POST['txtResponsavel']  );
	$computador->setPCDESCRICAO( $_POST['txtDesc']  );
    
    ComputadorDAO::inserir($computador);
    
    header("Location: ../computadores.php");
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idServidor'];
    $computador = ComputadorDAO::getComputadorById($id);

    $computador->setPCNOME( $_POST['txtNome']  );
	$computador->setPCNOMEANTIGO( $_POST['txtNomeAntigo']  );
	$computador->setPCSETOR( $_POST['txtSetor']  );
	$computador->setPCMODELO( $_POST['txtModelo']  );
	$computador->setPCMODELOANTIGO( $_POST['txtModeloAntigo']  );
	$computador->setPCPATRIMONIO( $_POST['txtPatrimonio']  );
	$computador->setPCCARGO( $_POST['txtCargo']  );
	$computador->setPCRESPONSAVEL( $_POST['txtResponsavel']  );
	$computador->setPCDESCRICAO( $_POST['txtDesc']  );
    
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

