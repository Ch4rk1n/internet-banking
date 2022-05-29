<?php 
    
    require_once('../model/processaLogin.class.php');

    $userLogin = isset($_POST['login']) ? $_POST['login'] : '';
    $senha     = !empty($_POST['senha']) ? $_POST['senha'] : null;
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
        session_destroy();
        echo 'ok';
    }else if(isset($opcao) AND $opcao == 'cadastrar'){
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $cidade   = isset($_POST['cidade'])   ? $_POST['cidade']   : '';
        $nome     = isset($_POST['nome'])     ? $_POST['nome']       : '';
        $chave    = isset($_POST['chave'])    ? $_POST['chave']       : '';
        $fotoname = $_FILES['foto']['name'];
        if(!is_null($fotoname) or isset($fotoname)){
            $tmp_foto = $_FILES['foto']['tmp_name'];$path = '../assets/fotosUsers/';
            $foto = $path.uniqid().$fotoname; move_uploaded_file($tmp_foto, $foto);
        }else{
            $foto = null;
        }
        $login = new Login($userLogin,$senha);
        $cadastra = $login->cadastraClass($nome,$endereco,$cidade,$chave,$foto);
        
        if(isset($cadastra) && $cadastra == 'ok'){
            echo $cadastra;
        }else if(isset($cadastra) && $cadastra == 'existe'){
            echo 'Email já cadastrado no sistema';
        }else{
            echo 'Dados incorretos';
        }

    }
    

?>