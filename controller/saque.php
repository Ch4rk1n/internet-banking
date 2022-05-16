<?php 
    require_once('../model/processaSaque.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = !empty($_POST['senhaSaque']) ? $_POST['senhaSaque'] : null;
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    

    if(isset($opcao) AND $opcao == 'sacar'){
        if(empty($senha)){
            echo 'Insira sua Senha';
            exit();
        }
        $valor = isset($_POST['valorSaque']) ? $_POST['valorSaque'] : '';

        $sacar  = new Sacar($idUser,$senha,$valor);
        $valida = $sacar->sacar();
        
        echo $valida;
        
    }

?>