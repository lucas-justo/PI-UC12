<?php
include_once 'model/clsMonitor.php';
include_once 'model/clsComputador.php';
include_once 'model/clsServidor.php';
include_once 'dao/clsMonitorDAO.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsServidorDAO.php';
include_once 'dao/clsConexao.php';
include_once 'dao/clsPesquisaDAO.php';

            $lista = '';

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
 <li  class="menu" > <a href="Rede.php">			    Rede</a></li>
 <li  class="menu" > <a href="pesquisa.php">			Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>
	
	<div class="form_item">		
		
	<!--	<form action="dao/PesquisaDAO.php?pesquisarNome" method="POST" > -->
	<form action="controller/teste.php" method="POST" >
		<div class="form_item">		
		<label>Pesquisar por Nome: </label>
        <input type="text" autocomplete="off" name="txtNome" />
		<label>Pesquisar por Setor: </label>
        <input type="text" autocomplete="off" name="txtSetor" />
		<label>Pesquisar por Modelo: </label>
		<input type="text" autocomplete="off" name="txtModelo" />
		
		<input class="button" type="submit" value="Pesquisar" />
		
		</form>
		
	</div>
		
		<?php
           
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum resultado encontrado</b></h2>';
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
						    <th>Cargo do Responsavel</th>
						  <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
               	
			 foreach ($lista as $servidor) {
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
              
                        <td> 
                            <a href="controller/salvarServidor.php?editar&idServidor='.$servidor->getID().'">
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