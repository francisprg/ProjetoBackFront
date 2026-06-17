<?php 

class Database {

    public static function conectar(): PDO
    {
        $host = 'localhost';
        $porta = '5432';
        $banco = 'projbackfront';
        $usuario = 'postgres';
        $senha = '02121940';

        $dsn = "pgsql:host={$host};port={$porta};dbname={$banco}";

        return new PDO($dsn, $usuario, $senha, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}

?>