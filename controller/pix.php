<?php 
    require_once('../model/processaPix.class.php');

    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $senha  = isset($_POST['senha']) ? $_POST['senha'] : '';
    $opcao  = isset($_POST['opcao']) ? $_POST['opcao'] : '';
    
    if(isset($opcao) AND $opcao == 'enviarPix'){
        $chave = isset($_POST['chave']) ? $_POST['chave'] : '';
        $valor = isset($_POST['valor']) ? $_POST['valor'] : '';

        $pix  = new Pix($idUser,$senha,$chave,$valor);
        $valida = $pix->enviarPix();
        
        echo $valida;
        
    }

?>