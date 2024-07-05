<?php
class database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "";
    private $server = "mysql:host = localhost; dbname=empresa";

    function contectarDB()
    {
        try 
        {
            $this->PDOLocal = new PDO($this->server, $this->user, $this->password);
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    function desconectarDB()
    {
        try 
        {
            $this->PDO_Local = null;
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    function seleccionar($consulta)
    {
        try {
            $resultado = $this->PDOLocal->query($consulta);

            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}