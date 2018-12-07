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
 <li  class="menu" > <a href="Rede.php">			    Rede</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

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