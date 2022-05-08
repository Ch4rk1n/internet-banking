<?php 
    require_once('../model/processaSaque.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = isset($_POST['senhaSaque']) ? $_POST['senhaSaque'] : '';
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(isset($opcao) AND $opcao == 'sacar'){
        $valor = isset($_POST['valorSaque']) ? $_POST['valorSaque'] : '';

        $sacar  = new Sacar($idUser,$senha,$valor);
        $valida = $sacar->sacar();
        
        echo $valida;
        
    }

?>