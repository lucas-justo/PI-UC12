<?php
include_once '../model/clsModelo.php';
include_once '../dao/clsModeloDAO.php';
include_once '../dao/clsConexao.php';


if( isset( $_REQUEST['inserir'] ) ){
    $modelo = new modelo();
    $modelo->setMDNOME( $_POST['txtNome']  );	
    
    ModeloDAO::inserir($modelo);
    
    header("Location: ../computadores.php");
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idModelo'];
    $modelo = ModeloDAO::getModeloById($id);

    $modelo = new Modelo();
    $modelo->setMDNOME( $_POST['txtMDNome']  );	
    
    ModeloDAO::editar($modelo);
    
    header("Location: ../computadores.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idModelo'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do modelo </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idModelo='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../computadores.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idModelo'];
    modeloDAO::excluir($id);
    header("Location: ../computadores.php");
}

