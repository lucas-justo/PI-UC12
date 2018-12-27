<?php
include_once 'model/clsMonitor.php';
include_once 'dao/clsMonitorDAO.php';
include_once 'model/clsComputador.php';
include_once 'model/clsCategoria.php';
include_once 'model/clsModelo.php';
include_once 'model/clsSetor.php';
include_once 'model/clsResponsavel.php';
include_once 'model/clsLocalizacao.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsModeloDAO.php';
include_once 'dao/clsSetorDAO.php';
include_once 'dao/clsResponsavelDAO.php';
include_once 'dao/clsLocalizacaoDAO.php';
include_once 'dao/clsConexao.php';

$nome = "";
$patrimonio = "";
$descricao = "";
$idMonitor = 0;
$pc = 0;
$responsavel = 0;
$modelo = 0;
$action = "inserir";

if( isset($_REQUEST['editar'])){
    $idMonitor = $_REQUEST['idMonitor'];
    $monitorEditar = MonitorDAO::getMonitorById( $idMonitor );
    $nome = $monitorEditar->getMTNOME();
	$patrimonio = $monitorEditar->getMTPATRIMONIO();
	$descricao = $monitorEditar->getMTDESCRICAO();
	$idMonitor = $monitorEditar->getID();
	$pc = $monitorEditar->getIDPC();
	$responsavel = $monitorEditar->getIDRP();
	$modelo = $monitorEditar->getIDMD();
    $action = "editar&idMonitor=".$idMonitor;
    
}

?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Monitores </title>
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
 <li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>

<div id="menu2">
<li  class="menu3">   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" style="background-color:#dce8ce;" >   <a href="monitores.php">Monitores</a></li> 
<li  class="menu3" >   <a href="pontos.php">Pontos</a></li> 
<li  class="menu3" >   <a href="switches.php">Switches</a></li>
</div>
<h2>Cadastrar Monitor</h2>	
<div id="container_cadastros">
	<form class="container_formularios" action="controller/salvarMonitor.php?<?php echo $action; ?>" method="POST" >
		<div class="modelos">	
		<label>Nome: </label>
        <input type="text" autocomplete="off" name="txtNome" value="<?php echo $nome; ?>" />
		<label>Patrimonio: </label>
        <input type="text" autocomplete="off" name="txtPatrimonio" value="<?php echo $patrimonio; ?>"/>
			<label>Modelo : </label>
			<select name="stModelo" >			
				<?php 
				$select = ModeloDAO::getModelo();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Modelo foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $modelo) {
					echo '<option value='.$modelo->getID().'>'.$modelo->getMDNOME().'</option>';
					}
				}
				?>			
			</select>
		</div>
		
		<div class="modelos">
		<label>PC associado ao Monitor : </label>
			<select name="stPC" >			
				<?php 
				$select = ComputadorDAO::getComputadores();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Computador foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $computador) {
					echo '<option value='.$computador->getID().'>'.$computador->getPCNOME().'</option>';
					}
				}
				?>			
			</select>
			
		<label>Responsavel : </label>
			<select name="stResp" >			
				<?php 
				$select = ResponsavelDAO::getResponsavel();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Responsavel foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $responsavel) {
					echo '<option value='.$responsavel->getID().'>'.$responsavel->getRPNOME().'</option>';
					}
				}
				?>			
			</select>
			
		
			
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc" ><?php echo $descricao; ?> </textarea>
		
		<input class="btnSalvar" type="submit" value="Salvar" />
		</div>		 
		</form>
</div>	


		<?php
            
            $lista = MonitorDAO::getMonitores();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Monitor cadastrado</b></h2>';
            }else {
        ?>
        
        <table id="tables" border="1">
            <tr>
                <th>ID</th>
				  <th>Nome</th>
				    <th>Modelo</th>
				     <th>PC</th>	
					  <th>Patrimonio</th>
						<th>Responsavel</th>
						 <th>Setor</th>
						  <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $monitor) {
					$idComputador = $monitor->getIDPC();
					$idResponsavel = $monitor->getIDRP();
					$idModelo = $monitor->getIDMD();
					$host = @ComputadorDAO::getComputadorById( $idComputador );
					$responsavel = @ResponsavelDAO::getResponsavelById( $idResponsavel );
					$modelo = @ModeloDAO::getModeloById( $idModelo );
					$localizacao = @LocalizacaoDAO::getLocalizacaoById( $idLocalizacao );
					$setor = "";
					if(isset($responsavel)){
						$idSetor = $responsavel->getIDSETOR();
						$setor = @SetorDAO::getSetorById( $idSetor );
					}
					if($host != NULL){
						$hostname = $host->getPCNOME();
					}else{$hostname = "X";}
					
                    echo '<tr>
                        <td>'.$monitor->getID().'</td>
                        <td>'.$monitor->getMTNOME().'</td>
						<td>'.$modelo->getMDNOME().'</td>
						<td><a href="computadores.php#'.$idComputador.'">'.$hostname.'</td>
						<td>'.$monitor->getMTPATRIMONIO().'</td>
                        <td>'.$responsavel->getRPNOME().'</td>
						<td>'.$setor->getSTNOME().'</td>
						<td>'.$monitor->getMTDESCRICAO().'</td>
                
                        <td> 
                             <a href="?editar&idMonitor='.$monitor->getID().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarMonitor.php?excluir&idMonitor='.$monitor->getID().'">
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