<?php
    include_once 'dao/clsConexaoDAO.php';

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $senha = md5($senha);
	
	
	function logar($login, $senha){
		
		
        $sql = " SELECT login "
             . " FROM admin "
             . " WHERE ( login = '".$login."' ) "
			 . " AND ( senha = '".$senha."' )";
			 echo $sql;

        $result = Conexao::consultar($sql);
        
        if( mysqli_num_rows( $result ) > 0 ){
            $dados = mysqli_fetch_assoc( $result );
            return $dados;
        } else {
            return NULL;
        }
        
    }
	
	$dados = logar($login , $senha);
    
	
    
    if( $dados == NULL ){
        echo '<body onload="window.history.back()" >';
    } else {
        session_start();
        $_SESSION['logado'] = TRUE;
		
        
       header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    