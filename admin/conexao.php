<?php

class Conexao{


    public static function LigarConexao(){

        // Conexão
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_senior";

        try{

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }catch(PDOException $e){
            echo "Erro de conexão " . $e->getMessage();
        }





    }




}






