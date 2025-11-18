<?php

class Conexion{
    private static ?PDO $instancia = null;
    public static function pdo(): PDO{
        if(self::$instancia === null){
            $host = '127.0.0.1';
            $db = 'ecommerceg2';
            $user = 'root';
            $pass = '';
            $dsn = "mysql:host=$host;dbname=$db;cahrset=utf8mb4";

            self::$instancia = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }

        return self::$instancia;
    }
}