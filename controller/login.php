<?php 
    require_once('../model/processaLogin.class.php');

    $userLogin = isset($_POST['login']) ? $_POST['login'] : '';
    $senha     = isset($_POST['senha']) ? $_POST['senha'] : '';
    $opcao     = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(isset($opcao) AND $opcao == 'logar'){
        $login = new Login($userLogin,$senha);
        $valida = $login->logarClass();
        
        if(isset($valida) && $valida == 'ok'){
            echo $valida;
        }else{
            echo 'erro';
        }
    }else if(isset($opcao) AND $opcao == 'deslogar'){
        unset($_SESSION);
        echo 'ok';
    }
    

?>