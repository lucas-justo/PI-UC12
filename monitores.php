<?php
include_once 'model/clsMonitor.php';
include_once 'dao/clsMonitorDAO.php';
include_once 'dao/clsConexao.php';
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
 <li  class="menu" > <a href="Rede.php">			    Rede</a></li>
 <li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>

<div id="menu2">
<li  class="menu2" >   <a href="computadores.php">Computadores</a></li> 
<li  class="menu2" style="background-color:#e5b299;" >   <a href="monitores.php">Monitores</a></li> 
</div>

	<form action="controller/salvarMonitor.php?inserir" method="POST" >
	
		<div class="form_item">		
		<label>Nome: </label>
        <input type="text" autocomplete="off" name="txtNome" />
		<label>Setor: </label>
        <input type="text" autocomplete="off" name="txtSetor" />
		<label>Modelo: </label>
        <input type="text" autocomplete="off" name="txtModelo" />
		<label>Patrimonio: </label>
        <input type="text" autocomplete="off" name="txtPatrimonio" />
		<label>Nome do Responsavel: </label>
        <input type="text" autocomplete="off" name="txtResponsavel" />
		<label>Cargo do Responsavel: </label>
        <input type="text" autocomplete="off" name="txtCargo" />	
		</div>
		
		<div class="form_item">
		<label>Nome Antigo: </label>
        <input autocomplete="off" name="txtNomeAntigo" />
		<label>Modelo Antigo: </label>
        <input  autocomplete="off" name="txtModeloAntigo" />
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc" > </textarea>
		</div>		
        <input class="button" type="submit" value="Salvar" />
		</form>
		
		<?php
            
            $lista = MonitorDAO::getMonitores();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Monitor cadastrado</b></h2>';
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
                foreach ($lista as $monitor) {
                    echo '<tr>
                        <td>'.$monitor->getID().'</td>
						<td>'.$monitor->getMTSETOR().'</td>
                        <td>'.$monitor->getMTNOME().'</td>
						<td>'.$monitor->getMTMODELO().'</td>
                        <td>'.$monitor->getMTNOMEANTIGO().'</td>
						<td>'.$monitor->getMTMODELOANTIGO().'</td>
						<td>'.$monitor->getMTPATRIMONIO().'</td>
						<td>'.$monitor->getMTRESPONSAVEL().'</td>
						<td>'.$monitor->getMTCARGO().'</td>
						<td>'.$monitor->getMTDESCRICAO().'</td>
                
                        <td> 
                            <a href="controller/salvarMonitor.php?editar&idMonitor='.$monitor->getID().'">
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