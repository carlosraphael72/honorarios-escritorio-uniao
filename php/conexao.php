<?php

    $username = 'root';
    $dsn = 'mysql:host=localhost; dbname=honorarios';
    $password = '';

    try{
        //Conexão com o banco de dados
        $db = new PDO($dsn, $username, $password);

        //Mudando o erro do PDO para exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Banco conectado com sucesso";
    } catch (PDOException $ex){
        echo "Conexão falhou".$ex->getMessage();
    }

   /* $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "honorarios";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
        echo "deu certo a conexão";*/
    
?>