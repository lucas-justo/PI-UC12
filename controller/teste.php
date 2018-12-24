<?php
include_once '../model/clsComputador.php';
include_once '../model/clsSetor.php';
include_once '../model/clsLocalizacao.php';
include_once '../model/clsResponsavel.php';
include_once '../model/clsSetor.php';
include_once '../model/clsModelo.php';
include_once '../dao/clsComputadorDAO.php';
include_once '../dao/clsPesquisaDAO.php';
include_once '../dao/clsLocalizacaoDAO.php';
include_once '../dao/clsResponsavelDAO.php';
include_once '../dao/clsModeloDAO.php';
include_once '../dao/clsSetorDAO.php';
include_once '../dao/clsConexao.php';
//$servidor = new Servidor();
//		 $servidor->setSERVNOME( $_POST['txtNome']  );		 
if( isset( $_REQUEST['pesquisarNome'] ) ){	
	$nome = ( $_POST['txtNome']  );	
	$lista = PesquisaDAO::getComputadorByNome($nome);
	if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
            }else {  
			echo "<header>
<meta charset='UTF-8'>
<link rel='stylesheet' href='../styles.css'>
<title> Portal Web - Pesquisar </title>
</header>
<body>
<div id='container'>
<div id='header'>
 <li  class='menu' >   <a href='../index.php'>        		Inicio</a></li>	
 <li  class='menu' >   <a href='../equipamentos.php'>      Equipamentos</a></li> 
 <li  class='menu' >   <a href='../servidores.php'>        Servidores</a></li>
 <li  class='menu' > <a href='../pesquisa.php'>			    Pesquisar</a></li>

<a href='sair.php'><button class='button'>Sair</button></a>

	</div>
	<h2> Resultados da Pesquisa </h2>
 <table border='1'>
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
            </tr>";
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
echo "</div></body>";				
			}			
}

if( isset( $_REQUEST['pesquisarModelo'] ) ){	
	$modelo = ( $_POST['stModelo']  );	
	$lista = PesquisaDAO::getComputadorByModelo($modelo);
	if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
            }else {  
			echo "<header>
<meta charset='UTF-8'>
<link rel='stylesheet' href='../styles.css'>
<title> Portal Web - Pesquisar </title>
</header>
<body>
<div id='container'>
<div id='header'>
 <li  class='menu' >   <a href='../index.php'>        		Inicio</a></li>	
 <li  class='menu' >   <a href='../equipamentos.php'>      Equipamentos</a></li> 
 <li  class='menu' >   <a href='../servidores.php'>        Servidores</a></li>
 <li  class='menu' > <a href='../pesquisa.php'>			    Pesquisar</a></li>

<a href='sair.php'><button class='button'>Sair</button></a>

	</div>
	<h2> Resultados da Pesquisa </h2>	 <table border='1'>
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
            </tr>";
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
}

if( isset( $_REQUEST['pesquisarPatrimonio'] ) ){	
	$patrimonio = ( $_POST['txtPatrimonio']  );	
	$lista = PesquisaDAO::getComputadorByPatrimonio($patrimonio);
	if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
            }else {  
			echo "<header>
<meta charset='UTF-8'>
<link rel='stylesheet' href='../styles.css'>
<title> Portal Web - Pesquisar </title>
</header>
<body>
<div id='container'>
<div id='header'>
 <li  class='menu' >   <a href='../index.php'>        		Inicio</a></li>	
 <li  class='menu' >   <a href='../equipamentos.php'>      Equipamentos</a></li> 
 <li  class='menu' >   <a href='../servidores.php'>        Servidores</a></li>
 <li  class='menu' > <a href='../pesquisa.php'>			    Pesquisar</a></li>

<a href='sair.php'><button class='button'>Sair</button></a>

	</div>
	<h2> Resultados da Pesquisa </h2>	 <table border='1'>
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
            </tr>";
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
}

if( isset( $_REQUEST['pesquisarSetor'] ) ){	
	$setor = ( $_POST['stSetor']  );	
	$lista = PesquisaDAO::getComputadorBySetor($setor);
	if ( $lista->count()==0){
                echo '<h2><b>Nenhum Computador cadastrado</b></h2>';
            }else {  
			echo "	 <table border='1'>
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
            </tr>";
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
}