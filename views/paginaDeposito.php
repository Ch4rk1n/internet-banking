<form id="depositar" style="display:none">
  <h2>Valor Deposito</h2>
  <div class="form-group">
    <input type="number" class="form-control" min="0" name="valorDeposito" id="valorDeposito" aria-describedby="Valor" placeholder="Valor R$" step="0.1">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="senhaUser" id="senhaUser" placeholder="Sua senha">
  </div>
  <button type="submit" class="btn btn-primary depositar">Submit</button>
</form>
<script>
    $('.depositar').on('click',function(){
        var form = $('#depositar').serialize();
        $.ajax({
            method: 'POST',
            url: '../controller/deposito.php',
            data: 'opcao=depositar&&'+form,
            beforeSend: function(){
                $('#load').show();
            },
            success: function(r){
                if(r == 'ok'){
                    alert('Deposito efetuado com sucesso!');
                    location.reload();
                }else{
                    alert(r);
                }
                $('#load').hide();
            }
        });
    });    
</script>