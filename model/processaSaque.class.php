<?php 
    require '../conexao.php';
    
    class Sacar {
        public function __construct($idUser,$senha,$valor){
            $this->idUser  = $idUser;
            $this->senha = $senha;
            $this->valor = $valor;
        }
        function sacar(){
            $validaUser = select("SELECT * FROM users WHERE id={$this->idUser} and md5('{$this->senha}'); ");

            if($validaUser){
                $pegaSaldo = select("SELECT saldo FROM conta WHERE id_user = {$this->idUser}");

                $saldo = (float)$pegaSaldo[0]->saldo;

                $novoSaldo = $saldo - (float)$this->valor;

                if($novoSaldo < 0){
                    return 'Saldo insuficiente';
                }else{
                    $updateR = update("UPDATE conta SET saldo = {$novoSaldo} WHERE id_user = {$this->idUser}"); 

                    if($updateR){
                        $extrato = registraExtrato($this->idUser,"Saque efetuado no valor de ".$this->valor);

                        return 'ok';
                    }else{
                        return 'Erro na operação';
                    }  
                }
                
            }

        }
        
        
    }
?>