<?php include('../includes/includes.php'); ?>
<form id="cadastrar" enctype="multipart/form-data">
  <input type="hidden" name="opcao" id="opcao" value="cadastrar">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
    </div>
    <div class="form-group col-md-4">
      <label for="login">Email</label>
      <input type="email" class="form-control" name="login" id="login" placeholder="Email" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
    </div>
    <div class="form-group col-md-4">
      <label for="foto">foto</label>
      <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-12">
        <label for="chave">Chave PIX</label>
        <input type="text" class="form-control" name="chave" id="chave" placeholder="Chave PIX" required>
      </div>
  </div>
  <div class="row">
     <div class="form-group col-md-6">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0" required>
     </div> 
    <div class="form-group col-md-6">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" name="cidade" id="cidade" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Entrar</button>
  <a href="../index.php">Voltar</a>
</form>
<script>
    $('.btn').on('click',function(e){
        let login = $('#login').val();
        let senha = $('#senha').val();
        let endereco = $('#endereco').val();
        let cidade = $('#cidade').val();
        if(login == null || login == ''){
            return false;
        }
        if(senha == null || senha == ''){
            return false;
        }
        if(endereco == null || endereco == ''){
            return false;
        }
        if(cidade == null || cidade == ''){
            return false;
        }
        e.preventDefault();
        const form = new FormData($('#cadastrar')[0]);
        
        $.ajax({
          url: '../controller/login.php',
          method: 'POST',
          data: form,
          contentType: false,
          cache: false,
          processData:false,    
          beforeSend: function(){
              $('#load').show();
          },
          success: function(r){
              if(r == 'ok'){
                  alert('cadastro efetuado com successo!');
                  $(location).attr('href', 'paginaIncial.php');
              }else{
                  alert(r);
              }
          }
        });
        
    })
    
</script>