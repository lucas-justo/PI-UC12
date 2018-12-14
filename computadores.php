<?php
include_once 'model/clsComputador.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsConexao.php';

$nome = "";
$responsavel= "";
$setor = "";
$modelo = "";
$patrimonio = "";
$cargo = "";
$nomeantigo = "";
$modeloantigo = "";
$descricao = "";

$idComputador = 0;
$action = "inserir";

if( isset($_REQUEST['editar'])){
    $idComputador = $_REQUEST['idComputador'];
    $computadorEditar = ComputadorDAO::getComputadorById( $idComputador );
    $nome = $computadorEditar->getPCNOME();
    $responsavel = $computadorEditar->getPCRESPONSAVEL();
	$setor = $computadorEditar->getPCSETOR();
	$modelo = $computadorEditar->getPCMODELO();
	$patrimonio = $computadorEditar->getPCPATRIMONIO();
	$cargo = $computadorEditar->getPCCARGO();
	$nomeantigo = $computadorEditar->getPCNOMEANTIGO();
	$modeloantigo = $computadorEditar->getPCMODELOANTIGO();
	$descricao = $computadorEditar->getPCDESCRICAO();
    $action = "editar&idComputador=".$idComputador;
}


?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Computadores </title>
</header>
<body>

<div id="container">

<?php
if(session_status() != PHP_SESSION_ACTIVE ){
        session_start();
    }
if( isset($_SESSION['logado']) && 
                  $_SESSION['logado'] == TRUE ) {
?>

	<div id="header">
 <li  class="menu" >   <a href="index.php">        		Inicio</a></li>	
 <li  class="menu" >   <a href="equipamentos.php">      Equipamentos</a></li> 
 <li  class="menu" >   <a href="servidores.php">        Servidores</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>

<div id="menu2">
<li  class="menu3" style="background-color:#dce8ce;">   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" >   <a href="monitores.php">Monitores</a></li> 
</div>

	<form action="controller/salvarComputador.php?<?php echo $action; ?>" method="POST" >
	
		<div class="form_item">		
		<label>Nome: </label>
        <input type="text" autocomplete="off" name="txtNome" value="<?php echo $nome; ?>"  />
		<label>Setor: </label>
        <input type="text" autocomplete="off" name="txtSetor" value="<?php echo $setor; ?>"  />
		<label>Modelo: </label>
        <input type="text" autocomplete="off" name="txtModelo" value="<?php echo $modelo; ?>"  />
		<label>Patrimonio: </label>
        <input type="text" autocomplete="off" name="txtPatrimonio" value="<?php echo $patrimonio; ?>"  />
		<label>Nome do Responsavel: </label>
        <input type="text" autocomplete="off" name="txtCargo" value="<?php echo $responsavel; ?>"  />	
		</div>
		
		<div class="form_item">
		<label>Nome Antigo: </label>
        <input autocomplete="off" name="txtNomeAntigo" value="<?php echo $nomeantigo; ?>"  />
		<label>Modelo Antigo: </label>
        <input  autocomplete="off" name="txtModeloAntigo" value="<?php echo $modeloantigo; ?>"  />
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc" value="<?php echo $descricao; ?>"  > </textarea>
		</div>		
        <input class="button" type="submit" value="Salvar" />
		</form>
		
		<?php
            
            $lista = ComputadorDAO::getComputadores();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
            }else {
        ?>
        
        <table border="1">
            <tr>
                <th>ID</th>
				 <th>Setor</th>
				  <th>Nome</th>
				    <th>Modelo</th>
				     <th>Nome Antigo</th>				 
						<th>Modelo Antigo</th>
						 <th>Patrimonio</th>
						 <th>Nome do Responsavel</th>
						  <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $computador) {
                    echo '<tr>
                        <td>'.$computador->getID().'</td>
						<td>'.$computador->getPCSETOR().'</td>
                        <td>'.$computador->getPCNOME().'</td>
						<td>'.$computador->getPCMODELO().'</td>
                        <td>'.$computador->getPCNOMEANTIGO().'</td>
						<td>'.$computador->getPCMODELOANTIGO().'</td>
						<td>'.$computador->getPCPATRIMONIO().'</td>
						<td>'.$computador->getPCCARGO().'</td>
						<td>'.$computador->getPCDESCRICAO().'</td>
                
                        <td> 
                            <a href="?editar&idComputador='.$computador->getID().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarComputador.php?excluir&idComputador='.$computador->getID().'">
                            <button class="button3">!</button></a>
                            </td>
                          </tr> ';            
                }								
				
			}
			
            ?>			
	
<?php
        }else{
		 header("Location: index.php");
?>
	
</div>

<?php
        }
?>

</body>
</html>