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
            // Establecer el modo de error de PDO a excepción
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) 
        {
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
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["mensaje"] = "<div class='alert alert-success' role='alert'>¡Bienvenido " . $_SESSION["usuario"] . "!</div>";
                header('refresh:2;url=../index.php');
                exit();
            } else {
                $_SESSION["mensaje"] = "<div class='alert alert-warning' role='alert'>¡Usuario o contraseña incorrectos!</div>";
                exit();
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