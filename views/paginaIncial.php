<?php require_once('../includes/includes.php'); require_once('../conexao.php'); var_dump($_SESSION); ?>
<button class="btn btn-danger" onclick="deslogar();">Sair</button>
<script>
    function deslogar(user){
        $.ajax({
            method: 'POST',
            url: '../controller/login.php',
            data: 'opcao=deslogar',
            success: function(r){
                if(r == 'ok'){
                    $(location).attr('href', '../index.php');
                }
            }
        });
    }
    
</script>