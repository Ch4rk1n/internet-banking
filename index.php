<?php include('includes/includes.php'); ?>
<?php require_once('conexao.php');?>
<form id="logar">
  <div class="mb-3">
    <label for="login" class="form-label">Email</label>
    <input type="email" class="form-control" name="login" id="login" aria-describedby="login" required>
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" id="senha" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="views/cadastraUser.php">Cadastre-se</a>
</form>
<script>
    $('.btn').on('click',function(){
        let login = $('#login').val();
        let senha = $('#senha').val();
        if(login == null || login == ''){
            return false;
        }
        if(senha == null || senha == ''){
            return false;
        }
        let form = $('#logar').serialize();
        
        $.ajax({
            method: 'POST',
            url: 'controller/login.php',
            data: 'opcao=logar&'+form,
            beforeSend: function(){
                $('#load').show();
            },
            success: function(r){
                if(r == 'ok'){
                    $(location).attr('href', 'views/paginaIncial.php');
                }else{
                    alert('Dados incorretos');
                }
            }
        });
    })
    
</script>