<?php
class database
{
    private $pdo;
    private $user = "root";
    private $password = "amomifamilia";
    private $server = "localhost";
    private $dbname = "cafe_sinfonia";
    private $puerto = "3305";

    // funcion para conectar
    function conectarDB()
    {
        try 
        {
            $dsn = "mysql:host={$this->server};dbname={$this->dbname};port={$this->puerto}";
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            // Establecer el modo de error de PDO a excepció
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }

    }
        // Método opcional para obtener la conexión PDO
        public function getConnection() {
            return $this->pdo;
        }

    // funcion para desconectar
    function desconectarDB()
    {
        try {
            $this->pdo = null;
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    // funcion para seleccionar
    function select($consulta)
    {
        try {
            $resultado = $this->pdo->query($consulta);

            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function execute($consulta) {
        try {
            $this->pdo->query($consulta);
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}