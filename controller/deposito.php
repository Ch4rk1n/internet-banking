<?php 
    require_once('../model/processaDeposito.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = isset($_POST['senhaUser']) ? $_POST['senhaUser'] : '';
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(isset($opcao) AND $opcao == 'depositar'){
        $valor = isset($_POST['valorDeposito']) ? $_POST['valorDeposito'] : '';

        $deposito  = new Depositar($idUser,$senha,$valor);
        $valida = $deposito->depositar();
        
        echo $valida;
        
    }

?>