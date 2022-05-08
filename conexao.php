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
    function validaLogin($login){
        $sql = select("SELECT count(*) as valida FROM users WHERE loginUser = '{$login}'");
        
        return $sql;
    }
    function login($login,$senha){ 
        $connection = conexao();
        $sql = "SELECT * FROM users WHERE loginUser = '{$login}' AND senha = md5('{$senha}')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $retorno = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if(!empty($retorno)){
            $_SESSION['id_user']  = $retorno[0]->id;
            return 'ok';
        }else{
            return 'erro';
        }
    }

    function cadastraConta($idUser, $chave){
        $connection = conexao();
        $sql = "INSERT INTO conta (id_user,chave_pix) VALUES ('{$idUser}','{$chave}')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        if($statement == true){
            return 'ok';
        }else{
            return 'erro';
        }
    }

    function cadastraUser($login,$senha,$nome,$endereco,$cidade,$chave){ 
        $valida = validaLogin($login);
        
        if(isset($valida) AND $valida[0]->valida != 0){
            return 'existe';
        }else{
            $connection = conexao();
            $sql = "INSERT INTO users (loginUser, senha, nome, endereco, cidade) VALUES ('{$login}', md5('{$senha}'), '{$nome}','{$endereco}','{$cidade}')";
            $statement = $connection->prepare($sql);
            $statement->execute();
            
            if ($statement == true) {
                $pegaId = $connection->lastInsertId();
                $conta = cadastraConta($pegaId,$chave);
                $retorno = login($login,$senha);

                return $retorno;
            }else{
                return 'erro';
            }
        }
    }

    function insert($sql){
        $connection = conexao();
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        if ($statement == true) {
            return 'ok';
        }else{
            return 'erro';
        }
    }

    function select($sql){
        $connection = conexao();
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $retorno = $statement->fetchAll(PDO::FETCH_OBJ);

        if(!empty($retorno)){
            return $retorno;
        }else{
            return 'erro';
        }
    }

    function update($sql){
        $connection = conexao();
        $statement = $connection->prepare($sql);
        $statement->execute();

        if ($statement == true) {
            return 'ok';
        }else{
            return 'erro';
        }
    }

    function delete($sql){
        $connection = conexao();
        $statement = $connection->prepare($sql);
        $statement->execute();

        if ($statement == true) {
            return 'ok';
        }else{
            return 'erro';
        }
    }
    
    
?>