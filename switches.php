<?php
include_once 'model/clsCategoria.php';
include_once 'model/clsSwitch.php';
include_once 'model/clsModelo.php';
include_once 'model/clsSetor.php';
include_once 'model/clsLocalizacao.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsModeloDAO.php';
include_once 'dao/clsSetorDAO.php';
include_once 'dao/clsSwitchDAO.php';
include_once 'dao/clsLocalizacaoDAO.php';
include_once 'dao/clsConexao.php';
?>

<!DOCTYPE HTML>
<html>
<header>

<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<title> Portal Web - Switches </title>
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
 <li  class="menu" > <a href="pesquisa.php">			    Pesquisar</a></li>

 <a href="sair.php"><button class="button">Sair</button></a>

</div>
<div id="menu2">
<li  class="menu3" >   <a href="computadores.php">Computadores</a></li> 
<li  class="menu3" >   <a href="monitores.php">Monitores</a></li> 
<li  class="menu3" >   <a href="pontos.php">Pontos</a></li> 
<li  class="menu3" style="background-color:#dce8ce;" >   <a href="switches.php">Switches</a></li>
</div>	
<h2> Cadastrar Switches </h2>	
<div id="container_cadastros">
	<form class="container_formularios" action="controller/salvarSwitch.php?inserir" method="POST" >
	
		<div class="modelos">		
		<label>Nome ou Codigo de Identificacao do Switch : </label>
        <input type="number" autocomplete="off" name="txtNome" />
		<label>Patrimonio : </label>
        <input type="text" autocomplete="off" name="txtPatrimonio"  />
		<label>Usuario : </label>
        <input type="text" autocomplete="off" name="txtUser" />
		<label>Senha : </label>
        <input type="text" autocomplete="off" name="txtSenha" />
		<label>IP Fixo : </label>
        <input type="text" autocomplete="off" name="txtIP" />
		
		
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
			
		<label>Setor : </label>
			<select name="stSetor" >			
				<?php 
				$select = SetorDAO::getSetor();			
				if ( $select->count()==0){
					echo '<option value="0" selected disabled hidden> Nenhum Setor foi encontrado </option>';
				}else {
					
					echo '<option value="0" selected disabled hidden> Selecione... </option>';
					
					foreach ( $select as $setor) {
					echo '<option value='.$setor->getID().'>'.$setor->getSTNOME().'</option>';
					}
				}
				?>
			</select>
			
		<label>Descricao: </label>
        <textarea id="descricao" name="txtDesc" > </textarea>
		        <input class="btnSalvar" type="submit" value="Salvar" />
		</div>
		</form>
</div>
		
		<?php
            $lista = SwitchDAO::getSwitches();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Switch cadastrado</b></h2>';
            }else {
        ?>
        
        <table id="tables" border="1">
            <tr>
                <th>ID</th>
				  <th>Nome/Codigo</th>
				    <th>Modelo</th>
					  <th>Patrimonio</th>
						<th>IP</th>
						<th>Setor</th>
						 <th>Usuario</th>
						  <th>Senha</th>
						   <th>Descricao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php
                foreach ($lista as $switch) {
					$idSetor = $switch->getIDSETOR();
					$idModelo = $switch->getIDMD();
					$setor = @SetorDAO::getSetorById( $idSetor );
					$modelo = @ModeloDAO::getModeloById( $idModelo );
					
                    echo '<tr>
                        <td>'.$switch->getID().'</td>
                        <td>'.$switch->getSTCODIGO().'</td>
						<td>'.$modelo->getMDNOME().'</td>
						<td>'.$switch->getSTPATRIMONIO().'</td>
						<td>'.$switch->getSTIP().'</td>
						<td>'.$setor->getSTNOME().'</td>
						<td>'.$switch->getSTUSER().'</td>
						<td>'.$switch->getSTSENHA().'</td>
						<td>'.$switch->getSTDESCRICAO().'</td>
                
                        <td>
                            <a href="controller/salvarSwitch.php?editar&idSwitch='.$switch->getID().'">
                            <button class="button2">!</button></a>
                        </td>
                        <td>
                            <a href="controller/salvarSwitch.php?excluir&idSwitch='.$switch->getID().'">
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