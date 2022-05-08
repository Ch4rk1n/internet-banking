<form id="enviarPix" style="display:none">
  <h2>Enviar PIX</h2>
  <div class="form-group">
    <input type="number" class="form-control" min="0" name="valor" id="valor" aria-describedby="Valor" placeholder="Valor R$" step="0.1">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="chave" id="chave" placeholder="Chave PIX">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua senha">
  </div>
  <button type="submit" class="btn btn-primary pix">Submit</button>
</form>
<script>
    $('.pix').on('click',function(){
        var form = $('#enviarPix').serialize();
        $.ajax({
            method: 'POST',
            url: '../controller/pix.php',
            data: 'opcao=enviarPix&'+form,
            beforeSend: function(){
                $('#load').show();
            },
            success: function(r){
                if(r == 'ok'){
                    alert('Pix enviado com sucesso!');
                    location.reload();
                }else{
                    alert(r);
                }
                $('#load').hide();
            }
        });
    });    
</script>