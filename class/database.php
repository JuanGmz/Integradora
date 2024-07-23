<?php
class database
{
    private $pdo;
    private $user = "root";
    private $password = "123456";
    private $server = "localhost";
    private $dbname = "cafe_sinfonia";

    // funcion para conectar
    function conectarDB()
    {
        try {
            $dsn = "mysql:host={$this->server};dbname={$this->dbname};";
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            // Establecer el modo de error de PDO a excepció
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    // Método opcional para obtener la conexión PDO
    public function getConnection()
    {
        return $this->pdo;
    }

    // funcion para desconectar
    function desconectarDB()
    {
        try {
            $this->pdo = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function prepare($query) {
        return $this->pdo->prepare($query);
    }

    // funcion para seleccionar
    function select($consulta)
    {
        try {
            $resultado = $this->pdo->query($consulta);

            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function execute($consulta)
    {
        try {
            $this->pdo->query($consulta);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function verifica($usuario, $contraseña)
    {
        try {

            $pase = false;
            $query = "SELECT * from personas p where p.usuario = '$usuario'";
            $resultado = $this->pdo->query($query);

            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

                if (password_verify($contraseña, $fila['contrasena'])) {
                    $pase = true;
                }
            }

            if ($pase) {
                $_SESSION["usuario"] = $usuario;
                header('location: ../index.php');
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header('location: ../../index.php');
    }
}