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
    <title>Portal Web AGERGS</title>
</head>

<body>
<div id="container">

<?php
       // if( isset($_SESSION['logado']) && 
       //           $_SESSION['logado'] == TRUE ) {
	   //require_once 'menu.php';
    ?>
	<div id="header"><li>   <a href="index.php">
        Inicio</a></li>	

 <li>   <a href="equipamentos.php">
        Equipamentos</a>	</li> 
 <li>   <a href="servidores.php">
        Servidores</a></li>
<li> <a href="rede.php">
        Rede</a></li>
<?php
 echo '<a href="sair.php"><button class="button">Sair</button></a>'
 ?>

</div>





   <?php
     //   }else{
   ?>
	<h1>Você não tem permissão para acessar o Portal, faça o login para continuar!</h1>


 <form action="entrar.php" method="POST" >
        <input type="text" name="txtLogin" required
               placeholder="Login" />
        
        <input type="password" name="txtSenha"
               placeholder="Senha" required />
        
        <input type="submit" value="Entrar" />
    </form>    

	
    <?php
    //    }
    ?>

</div>
</body>
</html>
