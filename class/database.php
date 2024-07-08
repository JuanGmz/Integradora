<?php
class database
{
    private $pdo;
    private $user = "root";
    private $password = "";
    private $server = "mysql:host=localhost;dbname=cafe_sinfonia";

    // funcion para conectar
    function conectarDB()
    {
        try 
        {
            $this->pdo = new PDO($this->server, $this->user, $this->password);
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
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