<?php 
    require '../conexao.php';
    
    class Depositar {
        public function __construct($idUser,$senha,$valor){
            $this->idUser  = $idUser;
            $this->senha = $senha;
            $this->valor = $valor;
        }
        function depositar(){
            $validaUser = select("SELECT * FROM users WHERE id={$this->idUser} and md5('{$this->senha}'); ");

            if($validaUser){
                $pegaSaldo = select("SELECT saldo FROM conta WHERE id_user = {$this->idUser}");

                $saldo = (float)$pegaSaldo[0]->saldo;

                $novoSaldo = $saldo + (float)$this->valor;

                $updateR = update("UPDATE conta SET saldo = {$novoSaldo} WHERE id_user = {$this->idUser}"); 

                if($updateR){
                    return 'ok';
                }else{
                    return 'Erro na operação';
                }
            }

        }
        
        
    }
?>