<?php
include_once 'model/clsMonitor.php';
include_once 'model/clsModelo.php';
include_once 'model/clsComputador.php';
include_once 'dao/clsMonitorDAO.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsModeloDAO.php';
include_once 'dao/clsConexao.php';
include_once 'dao/clsPesquisaDAO.php';
?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Pesquisar </title>
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
 <li  class="menu" > <a href="pesquisa.php">			Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>
	
<div class="container_cadastros">

<div class="modelos">
<h2> Pesquisar Computadores </h2>
	<form class="container_formularios" action="controller/teste.php?pesquisarPCNome" method="POST" >	
		<label>Pesquisar por Nome: </label>
		<input type="text" autocomplete="off" name="txtPCNome" />		
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
	</form>
	
	<form class="container_formularios" action="controller/teste.php?pesquisarPCPatrimonio" method="POST" >	
		<label>Pesquisar por Patrimonio: </label>
		<input type="text" autocomplete="off" name="txtPCPatrimonio" />		
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
	</form>		
	<form class="container_formularios" action="controller/teste.php?pesquisarPCModelo" method="POST" >
		<label>Pesquisar por Modelo : </label>		
		<select name="stPCModelo" >			
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
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
	</form>
</div>

<div class="modelos">
<h2> Pesquisar Monitores </h2>
<form class="container_formularios" action="controller/teste.php?pesquisarMTModelo" method="POST" >
		<label>Pesquisar por Modelo : </label>		
		<select name="stMTModelo" >			
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
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
</form>
	
<form class="container_formularios" action="controller/teste.php?pesquisarMTPatrimonio" method="POST" >		
		<label>Pesquisar por Patrimonio: </label>
		<input type="text" autocomplete="off" name="txtMTPatrimonio" />
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
</form>	

<form class="container_formularios" action="controller/teste.php?pesquisarMTNome" method="POST" >		
		<label>Pesquisar por Nome: </label>
		<input type="text" autocomplete="off" name="txtMTNome" />
		<input class="btnSalvar" type="submit" value="Pesquisar" />		
</form>	
	
</div>
</div>

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