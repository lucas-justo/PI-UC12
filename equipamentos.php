<?php
include_once 'model/clsCategoria.php';
include_once 'model/clsModelo.php';
include_once 'model/clsSetor.php';
include_once 'model/clsResponsavel.php';
include_once 'model/clsLocalizacao.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsModeloDAO.php';
include_once 'dao/clsSetorDAO.php';
include_once 'dao/clsResponsavelDAO.php';
include_once 'dao/clsLocalizacaoDAO.php';
include_once 'dao/clsConexao.php';
?>
<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Equipamentos </title>
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
	
<div id="menu2">
<li  class="menu3" >   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" >   <a href="monitores.php">Monitores</a></li> 	
<li  class="menu3" >   <a href="pontos.php">Pontos</a></li> 
<li  class="menu3" >   <a href="switches.php">Switches</a></li>
</div> 

<h1> Escolha um dos tipos de equipamentos acima.</h1>
	<!-- Formularios -->
		
	<div class="container_formularios">
					<!-- Form de Responsaveis 	 -->
	<form class="modelos" action="controller/salvarResponsavel.php?inserir" method="POST" >	
	<h2>Cadastrar Responsaveis</h2>	
		<label>Setor : </label>
			<select name="stIDSETOR" >			
				<?php 
				$select = SetorDAO::getSetor();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Setor foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $setor) {
					echo '<option value="'.$setor->getID().'">'.$setor->getSTNOME().'</option>';
					}
				}
				?>			
			</select>
			
			<label>Nome do Responsavel : </label>
			<input type="text" autocomplete="off" name="txtRPNOME" />			
			<label>Cargo do Responsavel : </label>
			<input type="text" autocomplete="off" name="txtRPCARGO" />			
			<input class="btnSalvar" type="submit" value="Salvar" />
	</form>	
					<!-- Form de Modelos -->
						<form class="modelos" action="controller/salvarModelo.php?inserir" method="POST" >	

			
		<h2>Cadastrar Modelos</h2>
		<label>Categoria : </label>
			<select name="stCategoria" >			
				<?php 
				$select = CategoriaDAO::getCategoria();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum modelo foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $categoria) {
					echo '<option value="'.$categoria->getID().'">'.$categoria->getCATNOME().'</option>';
					}
				}
				?>			
			</select>
			
			<label>Nome do Modelo : </label>
			<input type="text" autocomplete="off" name="txtMDNOME" />			
			<input class="btnSalvar" type="submit" value="Salvar" />		
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