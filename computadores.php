<?php
include_once 'model/clsComputador.php';
include_once 'model/clsCategoria.php';
include_once 'model/clsModelo.php';
include_once 'model/clsSetor.php';
include_once 'model/clsResponsavel.php';
include_once 'model/clsLocalizacao.php';
include_once 'dao/clsComputadorDAO.php';
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
			<input type="text" autocomplete="off" value="teste01" name="txtNome" />

			<label>Numero de CPUs : </label>
			<input type="text" autocomplete="off" value="4" name="txtCPU" />
			
			<label>Tamanho da Memoria : </label>
			<input type="text" autocomplete="off" value="2gb" name="txtMemoria" />
			
			<label>Tamanho do Disco : </label>
			<input type="text" autocomplete="off" value="500gb" name="txtDisco" />
			
			<label>Patrimonio : </label>
			<input type="text" autocomplete="off" value="1035b" name="txtPatrimonio" />
			
			<label>Sistema Operacional : </label>
			<input type="text" autocomplete="off" value="Windows" name="txtSistema" />
			
			<label>IP Fixo (Se possuir) : </label>
			<input type="text" autocomplete="off" value="10.10.0.1" name="txtIP" />
			
			<label>Servicos : </label>
			<input type="text" autocomplete="off" value="DNS" name="txtServicos" />		
		</div>
		
		<div class="form_item">		
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
			
			<label>Localizacao : </label>
			<select name="stLocal" >			
				<?php 
				$select = LocalizacaoDAO::getLocalizacao();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhuma Localizacao foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $localizacao) {
					echo '<option value='.$localizacao->getID().'>'.$localizacao->getLZNOME().'</option>';
					}
				}
				?>			
			</select>

			<label>Responsavel : </label>
			<select name="stResp" >			
			<option value="" selected disabled hidden> Nenhum modelo foi encontrado </option>
				<?php	
				$select = ResponsavelDAO::getResponsavel();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Responsavel foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $responsavel) {
					echo '<option value='.$responsavel->getID().'>'.$responsavel->getRPNOME().'</option>';
					}
				}
				?>			
			</select>
			
			<input name="cbVT" value="Nao" type="hidden">
			<div class="checkbox" > <label>Maquina Virtual : </label>
			<input type="checkbox" value="Sim" name="cbVT" /> </div>
			
			<input name="cbSV" value="Nao" type="hidden">
			<div class="checkbox" > <label>Servidor : </label>
			<input type="checkbox" value="Sim" name="cbSV" /> </div>
			
			<label>Host : </label>
			<select name="stPC" >	
				<?php			
				$select = ComputadorDAO::getComputadores();					
				if ( $select->count()==0){
					echo '<option value="0" selected hidden> Nenhum host foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected hidden> Selecione... </option>';
					
					foreach ( $select as $computador) {
					echo '<option value='.$computador->getID().'>'.$computador->getPCNOME().'</option>';
					}
				}
				?>			
			</select>
			
			<label>Descricao: </label>
			<textarea id="descricao" name="txtDesc" >sem descricao</textarea>
					
		</div>		
			<input class="btnSalvar" type="submit" value="Salvar" />
	</form>
	
	
	<div id="formulariossecundarios">
					<!-- Form de Responsaveis 	 -->
	<div class="modelos">
	<form action="controller/salvarResponsavel.php?inserir" method="POST" >	
		<div class="form_item">		
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
		</div>
	</form>	
	</div>
					<!-- Form de Modelos -->
	<div class="modelos">
	<form action="controller/salvarModelo.php?inserir" method="POST" >	
		<div class="form_item">		
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
			
		</div>
	</div>
	</form>	
	</div>
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
				 <th>Nome</th>
				  <th>Patrimonio</th>
				    <th>Sistema</th>
				     <th>CPU</th>				 
						<th>Memoria</th>
						 <th>Disco</th>
						 <th>Localizacao</th>
						 <th>IP Fixo</th>
						 <th>Servicos</th>
						  <th>Responsavel</th>
						   <th>Setor</th>
						    <th>Modelo</th>
							<th>Maquina Virtual?</th>
							<th>Servidor?</th>
							<th>Host</th>
						    <th>Descricao</th>
							<th>Monitor</th>
							
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php 
                foreach ($lista as $computador) {
					$idComputador = $computador->getIDPC();
					$idResponsavel = $computador->getIDRP();
					$idModelo = $computador->getIDMD();
					$idLocalizacao = $computador->getPCLOCALIZACAO();
					$host = @ComputadorDAO::getComputadorById( $idComputador );
					$responsavel = @ResponsavelDAO::getResponsavelById( $idResponsavel );
					$modelo = @ModeloDAO::getModeloById( $idModelo );
					$localizacao = @LocalizacaoDAO::getLocalizacaoById( $idLocalizacao );
					$setor = "";
					if(isset($responsavel)){
						$idSetor = $responsavel->getIDSETOR();
						$setor = @SetorDAO::getSetorById( $idSetor );
					}
					
                    echo '<tr>
                        <td>'.$computador->getID().'</td>
                        <td>'.$computador->getPCNOME().'</td>
						<td>'.$computador->getPCPATRIMONIO().'</td>
                        <td>'.$computador->getPCSISOP().'</td>
						<td>'.$computador->getPCCPU().'</td>
						<td>'.$computador->getPCMEMORIA().'</td>
						<td>'.$computador->getPCDISCO().'</td>
						
						<td>'.$localizacao->getLZNOME().'</td>
						
						<td>'.$computador->getPCIP().'</td>
						<td>'.$computador->getPCSERVICOS().'</td>
						
						<td>'.$responsavel->getRPNOME().'</td>						
						<td>'.$setor->getSTNOME().'</td>		
						
						<td>'.$modelo->getMDNOME().'</td>
						
						<td>'.$computador->getPCVIRTUAL().'</td>
						<td>'.$computador->getPCSERVIDOR().'</td>
						<td>'.$host->getPCNOME().'</td>
						<td>'.$computador->getPCDESCRICAO().'</td>
						<td>'.'monitor'.'</td>
                
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