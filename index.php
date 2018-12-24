<?php
    if(session_status() != PHP_SESSION_ACTIVE ){
        session_start();
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<meta charset="UTF-8">
    <title>Portal Web</title>
</head>

<body>

<div id="container">

<?php
        if( isset($_SESSION['logado']) && 
                  $_SESSION['logado'] == TRUE ) {
    ?>
	
	<div id="header">
<li class="menu">   <a href="index.php">       			 Inicio</a></li>	
<li class="menu">   <a href="equipamentos.php">          Equipamentos</a></li> 
<li class="menu">   <a href="servidores.php">       	 Servidores</a></li>
<li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>

<h3>Todos os cadastros (Equipamentos) estao funcionais e livres para teste</h3>
<h3>Tela de Pesquisa parcialmente funcional com funcoes basicas</h3>
<h3>Edicao de tabelas em Construcao</h3>
<h3>Tela de gerenciacao de Servidores em construcao</h3>

   <?php
        }else{
   ?>
	<h1>Você não tem permissão para acessar o Portal, faça login para continuar!</h1>

 <form  id="login" action="entrar.php" method="POST" >
		
        <input type="text" name="txtLogin" required
               placeholder="Login" />
        
        <input type="password" name="txtSenha"
               placeholder="Senha" required />
        
        <input id="centro" class="button" type="submit" value="Entrar" /> 
	
	</form>

    <?php
        }
    ?>

</div>
</body>
</html>
