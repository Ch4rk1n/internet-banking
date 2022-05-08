<?php 
    require '../conexao.php';
    
    class Pix {
        public function __construct($idUser,$senha,$chave,$valor){
            $this->idUser  = $idUser;
            $this->senha = $senha;
            $this->chave = $chave;
            $this->valor = $valor;
        }
        function enviarPix(){
            $validaRemetente    = select("SELECT * FROM users WHERE id={$this->idUser} and md5('{$this->senha}'); ");
            $validaDestinatario = select("SELECT * FROM conta WHERE chave_pix = '{$this->chave}'; ");

            if($validaRemetente AND $validaDestinatario){
                $pegaSaldoR = select("SELECT saldo FROM conta WHERE id_user = {$this->idUser}");
                $pegaSaldoD = select("SELECT saldo FROM conta WHERE id_user = {$validaDestinatario[0]->id_user}");

                $saldoR = $pegaSaldoR[0]->saldo;
                $saldoD = $pegaSaldoD[0]->saldo;

                $valorEnvio = (float)$this->valor;
            
                $validaSaldo = $saldoR - $valorEnvio;

                if($validaSaldo < 0){
                    return 'Saldo insuficiente';
                }else{
                    $novoSaldo = $saldoD + $valorEnvio;
                    $updateR = update("UPDATE conta SET saldo = {$validaSaldo} WHERE id_user = {$this->idUser}"); 
                    $updateD = update("UPDATE conta SET saldo = {$novoSaldo} WHERE id_user = {$validaDestinatario[0]->id_user}"); ;

                    return 'ok';
                }
            }
        }
        
    }
?>