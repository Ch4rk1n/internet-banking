<?php 
    require '../conexao.php';
    
    class Login {
        public function __construct($login,$senha){
            $this->login = $login;
            $this->senha = $senha;
        }
        function logarClass() {
            $validacao = login($this->login,$this->senha);
            if(isset($validacao) AND $validacao != 'erro'){
                $_SESSION['user']  = $this->login;
                return 'ok';
            }else{
                return 'erro';
            }
        }
    }
?>