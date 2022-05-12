<?php 
    require_once('../model/processaSaque.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = $_POST['senhaSaque'];
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(is_null($senha) OR isset($senha)){
        echo 'Insira sua Senha';
        exit();
    }

    if(isset($opcao) AND $opcao == 'sacar'){
        $valor = isset($_POST['valorSaque']) ? $_POST['valorSaque'] : '';

        $sacar  = new Sacar($idUser,$senha,$valor);
        $valida = $sacar->sacar();
        
        echo $valida;
        
    }

?>