<?php
include_once 'model/clsMonitor.php';
include_once 'model/clsComputador.php';
include_once 'model/clsServidor.php';
include_once 'dao/clsMonitorDAO.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsServidorDAO.php';
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

	<form class="container_formularios" action="controller/teste.php?pesquisarNome" method="POST" >
		<div class="form_item">		
		<label>Pesquisar por Nome: </label>
		<input type="text" autocomplete="off" name="txtNome" />		
		<input class="button" type="submit" value="Pesquisar" />		
	</form>
	
	<form class="container_formularios" action="controller/teste.php?pesquisarPatrimonio" method="POST" >
		<div class="form_item">		
		<label>Pesquisar por Patrimonio: </label>
		<input type="text" autocomplete="off" name="txtPatrimonio" />		
		<input class="button" type="submit" value="Pesquisar" />		
	</form>
		
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