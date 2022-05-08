<?php require_once('../includes/includes.php'); require_once('../conexao.php'); ?>
<?php include('paginaPix.php'); ?>
<button class="btn btn-warning" onclick="modal('#enviarPix');return false;">PIX</button>
<button class="btn btn-info"    onclick="extrato();">Extrato</button>
<button class="btn btn-primary" onclick="saque();">Saque</button>
<button class="btn btn-danger"  onclick="deposito();">Deposito</button>
<button class="btn btn-danger"  onclick="deslogar();">Sair</button>

<script>
    function modal(modal){
        $(modal).show();
        $(modal).fancybox().trigger('click'); 
        
    }
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