<?php
include_once 'model/clsServidor.php';
include_once 'model/clsComputador.php';
include_once 'dao/clsServidorDAO.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsConexao.php';

$ip = "";
$nome = "";
$local = "";
$cpu = "";
$memoria = "";
$disco = "";
$sistema = "";
$servicos = "";
$login = "";
$senha = "";
$descricao = "";
$cod = "";

$idServidor = 0;
$action = "inserir";

if( isset($_REQUEST['editar'])){
    $idServidor = $_REQUEST['idServidor'];
    $servidorEditar = ServidorDAO::getServidorById( $idServidor );
	$ip = $servidorEditar->getSERVIP();
    $nome = $servidorEditar->getSERVNOME();
    $local = $servidorEditar->getSERVLOCALIZACAO();
	$cpu = $servidorEditar->getSERVCPU();
	$memoria = $servidorEditar->getSERVMEMORIA();
	$disco = $servidorEditar->getSERVDISCO();
	$sistema = $servidorEditar->getSERVSISTEMA();
	$servicos = $servidorEditar->getSERVSERVICOS();
	$login = $servidorEditar->getSERVUSER();
	$senha = $servidorEditar->getSERVSENHA();
	$descricao = $servidorEditar->getSERVDESCRICAO();
	$cod = $servidorEditar->getCODPC();
    $action = "editar&idServidor=".$idServidor;
    
}

?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Servidores </title>
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
 <li  class="menu" >   <a href="Servidores.php">        Servidores</a></li>
 <li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>
	

	<form action="controller/salvarServidor.php?<?php echo $action; ?>" method="POST" >
	
		<div class="form_item">		
        <label>IP: </label>
        <input type="text" autocomplete="off" name="txtIP" value="<?php echo $ip; ?>" />
		<label>Nome do Servidor: </label>
		<input type="text" autocomplete="off" name="txtNome" value="<?php echo $nome; ?>" />
		<label>Localizacao: </label>
        <input type="text" autocomplete="off" name="txtLocal" value="<?php echo $local; ?>" />
		<label>Numero de CPUs: </label>
        <input type="number" autocomplete="off" name="txtCPU" value="<?php echo $cpu; ?>"  />
		<label>Memoria: </label>
        <input type="text" autocomplete="off" name="txtMemoria" value="<?php echo $memoria; ?>" />
		<label>Tamanho do HD: </label>
        <input type="text" autocomplete="off" name="txtDisco" value="<?php echo $disco; ?>" />
		<label>Sistema: </label>
        <input type="text" autocomplete="off" name="txtSistema" value="<?php echo $sistema; ?>" />
		<label>Servicos: </label>
        <input type="text" autocomplete="off" name="txtServ" value="<?php echo $servicos; ?>" />		
		</div>
		
		
		<div class="form_item">
		
		<label>ID do Computador (Host): </label>
        <input type="number" autocomplete="off" name="txtCODPC" />
		
		<label>Login da Maquina: </label>
        <input type="text" autocomplete="off" name="txtUser" value="<?php echo $login; ?>"/>
		<label>Senha da Maquina: </label>
        <input type="text" autocomplete="off" name="txtPass" value="<?php echo $senha; ?>"/>
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc"><?php echo $descricao;?></textarea>
		</div>		
        <input class="button" type="submit" value="Salvar" />
		</form>
		
		<?php
            
            $lista = ServidorDAO::getServidores();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum servidor cadastrado</b></h2>';
            }else {
        ?>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>IP</th>
				 <th>Localizacao</th>
				  <th>Sistema</th>
				    <th>Nome</th>
				     <th>CPU</th>				 
				      <th>Memoria</th>	
						<th>Disco</th>
					   <th>Usuario</th>
						<th>Senha</th>
						 <th>Servicos</th>
						  <th>Descricao</th>
						   <th>Host/Maquina</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $servidor) {
					
					$id = $servidor->getCODPC();
					if( $id != NULL ) {
					$computador = ComputadorDAO::getComputadorById( $id );
					$pcnome = $computador->getPCNOME();
					}else {
						$pcnome = 'N/A';
					}
					
                    echo '<tr>
                        <td>'.$servidor->getID().'</td>
                        <td>'.$servidor->getSERVIP().'</td>
						<td>'.$servidor->getSERVLOCALIZACAO().'</td>
						<td>'.$servidor->getSERVSISTEMA().'</td>
                        <td>'.$servidor->getSERVNOME().'</td>
						<td>'.$servidor->getSERVCPU().'</td>
                        <td>'.$servidor->getSERVMEMORIA().'</td>
						<td>'.$servidor->getSERVDISCO().'</td>
						<td>'.$servidor->getSERVUSER().'</td>
                        <td>'.$servidor->getSERVSENHA().'</td>
						<td>'.$servidor->getSERVSERVICOS().'</td>
						<td>'.$servidor->getSERVDESCRICAO().'</td>
						<td>'.$pcnome.'</td>
              
                        <td> 
                            <a href="?editar&idServidor='.$servidor->getId().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarServidor.php?excluir&idServidor='.$servidor->getID().'">
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