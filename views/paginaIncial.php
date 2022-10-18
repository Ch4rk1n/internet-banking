<?php include('../controller/telaPrincipal.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Internet Banking</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?=$dados[0]->nome?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= $dados[0]->foto != '../assets/fotosUsers/' ? $dados[0]->foto : '../assets/fotosUsers/administrador.png' ?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><button class="btn" onclick="modal('#enviarPix');return false;">PIX</button></li>
                    <li class="nav-item"><button class="btn" onclick="modal('#saque');return false;">Saque</button></li>
                    <li class="nav-item"><button class="btn" onclick="modal('#depositar');return false;">Deposito</button></li>
                    <li class="nav-item"><button class="btn" onclick="modal('#extrato');return false;">Extrato</button></li>
                    <li class="nav-item"><button class="btn" onclick="deslogar();">Sair</button></li>
                </ul>
            </div>
        </nav>
        <section>
            <h1>INTERNET BANKING LTDA</h1>
            <h4>Olá, <?=$dados[0]->nome?></h4>
            <h5>Seu saldo é de: R$<?=$dados[0]->saldo?></h5>
        </section>
    </body>
</html>

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