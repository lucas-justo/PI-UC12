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
    $computadorEditar = ServidorDAO::getServidorById( $idServidor );
	$ip = $computadorEditar->getSERVIP();
    $nome = $computadorEditar->getSERVNOME();
    $local = $computadorEditar->getSERVLOCALIZACAO();
	$cpu = $computadorEditar->getSERVCPU();
	$memoria = $computadorEditar->getSERVMEMORIA();
	$disco = $computadorEditar->getSERVDISCO();
	$sistema = $computadorEditar->getSERVSISTEMA();
	$servicos = $computadorEditar->getSERVSERVICOS();
	$login = $computadorEditar->getSERVUSER();
	$senha = $computadorEditar->getSERVSENHA();
	$descricao = $computadorEditar->getSERVDESCRICAO();
	$cod = $computadorEditar->getCODPC();
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
        
		<label>Nome do Computador/Servidor : </label>
		<input type="text" autocomplete="off" name="txtNome" value="<?php echo $nome; ?>" />
		<label>Numero de CPUs : </label>
        <input type="number" autocomplete="off" name="txtCPU" value="<?php echo $cpu; ?>"  />
		<label>Memoria : </label>
        <input type="text" autocomplete="off" name="txtMemoria" value="<?php echo $memoria; ?>" />
		<label>Tamanho do HD : </label>
        <input type="text" autocomplete="off" name="txtDisco" value="<?php echo $disco; ?>" />
		<label>Sistema Operacional : </label>
        <input type="text" autocomplete="off" name="txtSistema" value="<?php echo $sistema; ?>" />
		</div>
		
		
		<div class="form_item">
		
		<label>Maquina Fisica : </label>
        <input type="checkbox" value="0" name="txtIDPC" />
		
		<label>Maquina Virtual : </label>
        <input type="checkbox" value="1" name="txtIDPCVT" />
		
					
			
			<label>Host : </label>
			<select name="stHost" >			
			<?php			
			$select = ComputadorDAO::getComputadores();			
			if ( $select->count()==0){
				echo '<option value="" selected disabled hidden> Nenhum host foi encontrado </option>'
				)else {
				
				echo '<option value="" selected disabled hidden> Selecione... </option>';
				
				foreach ( $select as $computador) {
				echo '<option value='.$computador->getID().'>'.$computador->getNome().'</option>';
				}
			?>			
			</select>
			
			
			<label>Localizacao : </label>
			<select name="stLocal" >			
			<?php			
			$select = LocalizacaoDAO::getLocalizacoes();			
			if ( $select->count()==0){
				echo '<option value="" selected disabled hidden> Nenhuma localizacao foi encontrada </option>'
				)else {
				
				echo '<option value="" selected disabled hidden> Selecione... </option>';
				
				foreach ( $select as $localizacao) {
				echo '<option value='.$localizacao->getID().'>'.$localizacao->getNome().'</option>';
				}
			?>			
			</select>
			
		<label>Servicos ( DNS , Proxy , Etc ) : </label>
        <input type="text" autocomplete="off" name="txtServ" value="<?php echo $servicos; ?>" />	
		<label>IP (Se possuir IP fixo) : </label>
        <input type="text" autocomplete="off" name="txtIP" value="<?php echo $ip; ?>" />
		
		<label>Responsavel : </label>
			<select name="stLocal" >			
			<?php			
			$select = ResponsavelDAO::getResponsaveis();			
			if ( $select->count()==0){
				echo '<option value="" selected disabled hidden> Nenhum Responsavel foi encontrado </option>'
				)else {
				
				echo '<option value="" selected disabled hidden> Selecione... </option>';
				
				foreach ( $select as $responsavel) {
				echo '<option value='.$responsavel->getID().'>'.$responsavel->getNome().'</option>';
				}
			?>			
			</select>
		

		
		<label>Descricao : </label>
        <textarea id="descricao" name="txtDesc"><?php echo $descricao;?></textarea>
		</div>		
        <input class="button" type="submit" value="Salvar" />
		</form>
		
		<?php
            
            $lista = ComputadorDAO::getComputadores();
            
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
					   <th>Responsavel</th>
						<th>Virtual</th>
						 <th>Servicos</th>
						  <th>Descricao</th>
						   <th>Host/Maquina</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $computador) {
					
					$id = $computador->getCODPC();
					if( $id != NULL ) {
					$computador = ComputadorDAO::getComputadorById( $id );
					$pcnome = $computador->getPCNOME();
					}else {
						$pcnome = 'N/A';
					}
					
                    echo '<tr>
                        <td>'.$computador->getID().'</td>
                        <td>'.$computador->getSERVIP().'</td>
						<td>'.$computador->getSERVLOCALIZACAO().'</td>
						<td>'.$computador->getSERVSISTEMA().'</td>
                        <td>'.$computador->getSERVNOME().'</td>
						<td>'.$computador->getSERVCPU().'</td>
                        <td>'.$computador->getSERVMEMORIA().'</td>
						<td>'.$computador->getSERVDISCO().'</td>
						<td>'.$computador->getSERVUSER().'</td>
                        <td>'.$computador->getSERVSENHA().'</td>
						<td>'.$computador->getSERVSERVICOS().'</td>
						<td>'.$computador->getSERVDESCRICAO().'</td>
						<td>'.$pcnome.'</td>
              
                        <td> 
                            <a href="?editar&idServidor='.$computador->getId().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarServidor.php?excluir&idServidor='.$computador->getID().'">
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