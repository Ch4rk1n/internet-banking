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
    
?>