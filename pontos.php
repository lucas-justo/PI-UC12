<?php
include_once 'model/clsPonto.php';
include_once 'model/clsCategoria.php';
include_once 'model/clsSwitch.php';
include_once 'model/clsModelo.php';
include_once 'model/clsSetor.php';
include_once 'model/clsLocalizacao.php';
include_once 'dao/clsPontoDAO.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsModeloDAO.php';
include_once 'dao/clsSetorDAO.php';
include_once 'dao/clsSwitchDAO.php';
include_once 'dao/clsLocalizacaoDAO.php';
include_once 'dao/clsConexao.php';

$idPonto = 0;
$nome = "";
$patrimonio = "";
$descricao = "";
$ip = "";
$mac = "";
$porta = 0;
$_setor = 0;
$_modelo = 0;
$_switch = 0;
$action = "inserir";

if( isset($_REQUEST['editar'])){
    $idPonto = $_REQUEST['idPonto'];
    $pontoEditar = PontoDAO::getPontoById( $idPonto );
    $nome = $pontoEditar->getPTCODIGO();
	$patrimonio = $pontoEditar->getPTPATRIMONIO();
	$descricao = $pontoEditar->getPTDESCRICAO();
	$idPonto = $pontoEditar->getID();
	$ip = $pontoEditar->getPTIP();
	$mac = $pontoEditar->getPTMAC();
	$porta = $pontoEditar->getPTPORTA();
	$_setor = $pontoEditar->getIDSETOR();
	$_modelo = $pontoEditar->getIDMD();
	$_switch = $pontoEditar->getIDSWITCH();
    $action = "editar&idPonto=".$idPonto;
    
}
?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Pontos </title>
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
<li  class="menu3" >   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" >   <a href="monitores.php">Monitores</a></li> 
<li  class="menu3" style="background-color:#dce8ce;" >   <a href="pontos.php">Pontos</a></li> 
<li  class="menu3" >   <a href="switches.php">Switches</a></li>
</div>	

<h2> Cadastrar Pontos de Acesso WIFI </h2>	

<div id="container_cadastros">
	<form class="container_formularios" action="controller/salvarPonto.php?<?php echo $action; ?>" method="POST" >	
		<div class="modelos">		
		<label>Codigo de Identificacao do Ponto: </label>
        <input type="number" autocomplete="off" name="txtNome" value="<?php echo $nome; ?>" />
		<label>Patrimonio: </label>
        <input type="text" autocomplete="off" name="txtPatrimonio" value="<?php echo $patrimonio; ?>" />
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
			
		<label>IP : </label>
        <input type="text" autocomplete="off" name="txtIP" value="<?php echo $ip; ?>" />
		
		<label>Porta do Switch em que o Ponto esta conectado : </label>
        <input type="number" autocomplete="off" name="txtPorta" value="<?php echo $porta; ?>" />
		
		<label>Endereco MAC : </label>
        <input type="text" autocomplete="off" name="txtMAC" value="<?php echo $mac; ?>" />				


		<label>Switch em que o ponto esta ligado : </label>
			<select name="stSwitch" >			
				<?php 
				$select = SwitchDAO::getSwitches();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Switch foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $switch) {
					echo '<option value='.$switch->getID().'>'.$switch->getSTCODIGO().'</option>';
					}
				}
				?>			
			</select>
			
		<label>Setor : </label>
			<select name="stSetor" >			
				<?php 
				$select = SetorDAO::getSetor();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Setor foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $setor) {
					echo '<option value='.$setor->getID().'>'.$setor->getSTNOME().'</option>';
					}
				}
				?>
			</select>
			
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc" ><?php echo $descricao; ?></textarea>
		        <input class="btnSalvar" type="submit" value="Salvar" />
		</div>
		</form>
</div>
		
		<?php
            $lista = PontoDAO::getPontos();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Ponto cadastrado</b></h2>';
            }else {
        ?>
        
        <table border="1">
            <tr>
                <th>ID</th>
				  <th>Nome/Codigo</th>
				    <th>Modelo</th>
					  <th>Patrimonio</th>
						<th>IP</th>
						 <th>MAC</th>
						  <th>Setor</th>
						  <th>Switch</th>
						   <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php
                foreach ($lista as $ponto) {
					$idSwitch = $ponto->getIDSWITCH();
					$idSetor = $ponto->getIDSETOR();
					$idModelo = $ponto->getIDMD();
					$switch = @SwitchDAO::getSwitchById( $idSwitch );
					$setor = @SetorDAO::getSetorById( $idSetor );
					$modelo = @ModeloDAO::getModeloById( $idModelo );
					
					if($switch != NULL){
						$switchname = $switch->getSTCODIGO();
					}else{$switchname = "X";}
					
					if($setor != NULL){
						$setorname = $setor->getSTNOME();
					}else{$setorname = "X";}
					
                    echo '<tr>
                        <td>'.$ponto->getID().'</td>
                        <td>'.$ponto->getPTCODIGO().'</td>
						<td>'.$modelo->getMDNOME().'</td>
						<td>'.$ponto->getPTPATRIMONIO().'</td>
						<td>'.$ponto->getPTIP().'</td>
						<td>'.$ponto->getPTMAC().'</td>
						<td>'.$setorname.'</td>
						<td><a href="switches.php#'.$idSwitch.'">'.$switchname.'</td>
						<td>'.$ponto->getPTDESCRICAO().'</td>
                
                        <td>
                            <a href="?editar&idPonto='.$ponto->getID().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarPonto.php?excluir&idPonto='.$ponto->getID().'">
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