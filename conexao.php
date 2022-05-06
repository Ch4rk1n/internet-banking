<?php
    session_start();
    function conexao(){
        $dsn = 'mysql:host=localhost;dbname=internetBanking';
        $username = 'root';
        $password = '';
        $options = [];
        
        try {
            $connection = new PDO($dsn, $username, $password, $options);
        } catch(PDOException $e) {
            $e->getMessage();
        }
        return $connection;
    }
    

    //Funçoes SQL
    function login($login,$senha){ 
        $connection = conexao();
        $sql = "SELECT * FROM users WHERE loginUser = '{$login}' AND senha = md5('{$senha}')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $retorno = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if(!empty($retorno)){
            $_SESSION['id_user']  = $retorno[0]->id;
            return $retorno;
        }else{
            return 'erro';
        }
    }

    function cadastraUser($login,$senha,$nome,$endereco,$cidade){ 
        $connection = conexao();
        $sql = "INSERT INTO users (loginUser, senha, nome, endereco, cidade) VALUES ('{$login}', md5('{$senha}'), '{$nome}','{$endereco}','{$cidade}')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        if ($statement->execute()) {
            $retorno = login($login,$senha);
            return $retorno;
        }else{
            
            return 'erro';
        }
    }
    
    
?>