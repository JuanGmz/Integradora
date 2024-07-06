<?php
class Conexion
{
    private $PDO;
    private $user = 'root';
    private $password = '';
    private $server = 'mysql:host=localhost;dbname=cafe_sinfonia';

    public function conectarBD()
    {
        try{
            $this->PDO = new PDO($this->server, $this->user, $this->password);
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
public function cerrarBD()
{
    try{
        $this->PDO = null;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
function select($consulta)
{
    try{
$resultado=$this->PDO->query($consulta);
$fila=$resultado->fetchAll(PDO::FETCH_OBJ);
return $fila;
    }
    catch(PDOException $e){
echo "Error: ".$e->getMessage();
    }
}
}