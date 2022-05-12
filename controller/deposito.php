<?php 
    require_once('../model/processaDeposito.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = $_POST['senhaUser'];
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(is_null($senha) OR isset($senha)){
        echo 'Insira sua Senha';
        exit();
    }

    if(isset($opcao) AND $opcao == 'depositar'){
        $valor = isset($_POST['valorDeposito']) ? $_POST['valorDeposito'] : '';

        $deposito  = new Depositar($idUser,$senha,$valor);
        $valida = $deposito->depositar();
        
        echo $valida;
        
    }

?>