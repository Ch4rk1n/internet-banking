<form id="saque" style="display:none">
  <h2>Valor do saque</h2>
  <div class="form-group">
    <input type="number" class="form-control" min="0" name="valorSaque" id="valorSaque" aria-describedby="Valor" placeholder="Valor R$" step="0.1">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="senhaSaque" id="senhaSaque" placeholder="Sua senha">
  </div>
  <button type="submit" class="btn btn-primary saque">Submit</button>
</form>
<script>
    $('.saque').on('click',function(){
        var form = $('#saque').serialize();
        $.ajax({
            method: 'POST',
            url: '../controller/saque.php',
            data: 'opcao=sacar&'+form,
            beforeSend: function(){
                $('#load').show();
            },
            success: function(r){
                if(r == 'ok'){
                    alert('Saque efetuado com sucesso!');
                    location.reload();
                }else{
                    alert(r);
                }
                $('#load').hide();
            }
        });
    });    
</script>