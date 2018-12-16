<?php
include_once 'model/clsComputador.php';
include_once 'dao/clsComputadorDAO.php';
include_once 'dao/clsConexao.php';
?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Computadores </title>
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

					<!-- Menus -->

	<div id="header">
 <li  class="menu" >   <a href="index.php">        		Inicio</a></li>	
 <li  class="menu" >   <a href="equipamentos.php">      Equipamentos</a></li> 
 <li  class="menu" >   <a href="servidores.php">        Servidores</a></li>
 <li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

<a href="sair.php"><button class="button">Sair</button></a>

	</div>

<div id="menu2">
<li  class="menu3" style="background-color:#dce8ce;">   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" >   <a href="monitores.php">Monitores</a></li> 
<li  class="menu3" >   <a href="pontos.php">Pontos</a></li> 
<li  class="menu3" >   <a href="switches.php">Switches</a></li>
</div>

					<!-- Formularios -->

	<form action="controller/salvarComputador.php?inserir" method="POST" >
	
		<div class="form_item">		
			<label>Nome da Maquina : </label>
			<input type="text" autocomplete="off" name="txtNome" />

			<label>Numero de CPUs : </label>
			<input type="text" autocomplete="off" name="txtCPU" />
			
			<label>Tamanho da Memoria : </label>
			<input type="text" autocomplete="off" name="txtMemoria" />
			
			<label>Tamanho do Disco : </label>
			<input type="text" autocomplete="off" name="txtDisco" />
			
			<label>Patrimonio : </label>
			<input type="text" autocomplete="off" name="txtPatrimonio" />
			
			<label>Sistema Operacional : </label>
			<input type="text" autocomplete="off" name="txtSistema" />
			
			<label>IP Fixo (Se possuir) : </label>
			<input type="text" autocomplete="off" name="txtIP" />
			
			<label>Servicos : </label>
			<input type="text" autocomplete="off" name="txtServicos" />
		
		</div>
		
		<div class="form_item">
		
			<label>Modelo : </label>
			<select name="stModelo" >			
				<?php /*
				$select = ModeloDAO::getModelos();			
				if ( $select->count()==0){
					echo '<option value="" selected disabled hidden> Nenhum modelo foi encontrado </option>';
				}else {
					
					echo '<option value="" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $modelo) {
					echo '<option value='.$modelo->getID().'>'.$modelo->getNome().'</option>';
					}
				}*/
				?>			
			</select>
			
			<label>Responsavel : </label>
			<select name="stResp" >			
			<option value="" selected disabled hidden> Nenhum modelo foi encontrado </option>
				<?php	/*
				$select = ModeloDAO::getModelos();			
				if ( $select->count()==0){
					echo '<option value="" selected disabled hidden> Nenhum modelo foi encontrado </option>';
				}else {
					
					echo '<option value="" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $modelo) {
					echo '<option value='.$modelo->getID().'>'.$modelo->getNome().'</option>';
					}
				}*/
				?>			
			</select>

			<label>Maquina Virtual : </label>
			<input type="checkbox" value="Sim" name="txtPC" />
			
			<label>Servidor : </label>
			<input type="checkbox" value="Sim" name="txtSV" />
			
			<label>Host : </label>
			<select name="stPC" >	
			<option value="" selected disabled hidden> Nenhum modelo foi encontrado </option>			
				<?php	/*		
				$select = ComputadorDAO::getComputadores();					
				if ( $select->count()==0){
					echo '<option value="" selected disabled hidden> Nenhum host foi encontrado </option>';
				}else {
					
					echo '<option value="" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $computador) {
					echo '<option value='.$computador->getID().'>'.$computador->getNome().'</option>';
					}
				}*/
				?>			
			</select>
			
			<label>Descricao: </label>
			<textarea id="descricao" name="txtDesc" > </textarea>
			</div>		
			<input class="button" type="submit" value="Salvar" />
	</form>
	
	<!-- Form de Responsaveis -->
	<form action="controller/salvarResponsavel.php?inserir" method="POST" >	
		<div class="form_item">		
		<label>Nome : </label>
		<input type="checkbox" value="Sim" name="txtRPNOME" />		
		<label>Setor : </label>
			<select name="stSetor" >	
			<option value="" selected disabled hidden> Nenhum Setor foi encontrado </option>			
				<?php	/*		
				$select = ComputadorDAO::getComputadores();					
				if ( $select->count()==0){
					echo '<option value="" selected disabled hidden> Nenhum host foi encontrado </option>';
				}else {
					
					echo '<option value="" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $computador) {
					echo '<option value='.$computador->getID().'>'.$computador->getNome().'</option>';
					}
				}*/
				?>			
		</select>
		<input class="button" type="submit" value="Salvar" />		
		</div>
	</form>	
	
		<!-- Form de Modelos -->
	<form action="controller/salvarModelos.php?inserir" method="POST" >	
		<div class="form_item">		
		<label>Nome do Modelo : </label>
		<input type="checkbox" value="Sim" name="txtMDNOME" />		
		<input class="button" type="submit" value="Salvar" />		
		</div>
	</form>	
	
					<!-- Tabelas -->
		
		<?php
            
            $lista = ComputadorDAO::getComputadores();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
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
						  <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $computador) {
                    echo '<tr>
                        <td>'.$computador->getID().'</td>
						<td>'.$computador->getPCSETOR().'</td>
                        <td>'.$computador->getPCNOME().'</td>
						<td>'.$computador->getPCMODELO().'</td>
                        <td>'.$computador->getPCNOMEANTIGO().'</td>
						<td>'.$computador->getPCMODELOANTIGO().'</td>
						<td>'.$computador->getPCPATRIMONIO().'</td>
						<td>'.$computador->getPCCARGO().'</td>
						<td>'.$computador->getPCDESCRICAO().'</td>
                
                        <td> 
                            <a href="controller/salvarComputador.php?editar&idComputador='.$computador->getID().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarComputador.php?excluir&idComputador='.$computador->getID().'">
                            <button class="button3">!</button></a>
                            </td>
                          </tr> ';            
                }								
				
			}
			
            ?>			
	
<?php
        }else{			
		//Caso o usuario caso nao esteja logado
		
		 header("Location: index.php");
?>
	
</div>

<?php
        }
?>

</body>
</html>