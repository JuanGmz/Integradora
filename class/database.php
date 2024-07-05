<?php
class database
{
    private $pdo;
    private $user = "root";
    private $password = "";
    private $server = "mysql:host=localhost;dbname=cafe_sinfonia";

    function contectarDB()
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
    
    function seleccionar($consulta)
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
}