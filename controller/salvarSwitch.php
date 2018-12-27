<?php
include_once '../model/clsSwitch.php';
include_once '../dao/clsSwitchDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $switch = new _Switch();
    $switch->setSTCODIGO( $_POST['txtNome']  );
	$switch->setSTPATRIMONIO( $_POST['txtPatrimonio']  );
	$switch->setSTIP( $_POST['txtIP']  );
	$switch->setSTUSER( $_POST['txtUser']  );
	$switch->setSTSENHA( $_POST['txtSenha']  );
	$switch->setSTDESCRICAO( $_POST['txtDesc']  );
    $switch->setIDSETOR( $_POST['stSetor']  );
	$switch->setIDMD( $_POST['stModelo']  );
    SwitchDAO::inserir($switch);
    
    header("Location: ../switches.php");
}

if( isset($_REQUEST['editar'])){
    
    $switch = new _Switch();
	$switch->setID( $_REQUEST['idSwitch'] );
    $switch->setSTCODIGO( $_POST['txtNome']  );
	$switch->setSTPATRIMONIO( $_POST['txtPatrimonio']  );
	$switch->setSTIP( $_POST['txtIP']  );
	$switch->setSTUSER( $_POST['txtUser']  );
	$switch->setSTSENHA( $_POST['txtSenha']  );
	$switch->setSTDESCRICAO( $_POST['txtDesc']  );
    $switch->setIDSETOR( $_POST['stSetor']  );
	$switch->setIDMD( $_POST['stModelo']  );
    SwitchDAO::editar($switch);
    
    header("Location: ../switches.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idSwitch'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Switch </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idSwitch='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../switches.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idSwitch'];
    SwitchDAO::excluir($id);
    header("Location: ../switches.php");
}

