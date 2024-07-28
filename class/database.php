<?php
class database
{
    private $pdo;
    private $user = "root";
    private $password = "";
    private $server = "localhost";
    private $dbname = "cafe_sinfonia";

    // funcion para conectar
    function conectarDB()
    {
        try {
            $dsn = "mysql:host={$this->server};dbname={$this->dbname};";
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->exec("set names utf8");
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
    public function prepare($query)
    {
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
            // Consulta para obtener la contraseña del usuario
            $query = "SELECT contrasena FROM personas WHERE usuario = :usuario";
            $stmt = $this->pdo->prepare($query);

            $stmt->execute(['usuario' => $usuario]);

            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                $contrasenaAlmacenada = $fila['contrasena'];

                if (strlen($contrasenaAlmacenada) < 60) {
                    // La contraseña está en texto claro, encripta y actualiza la contraseña
                    $hashedPassword = password_hash($contrasenaAlmacenada, PASSWORD_DEFAULT);

                    // Actualiza la contraseña en la base de datos
                    $updateQuery = "UPDATE personas SET contrasena = :hashedPassword WHERE usuario = :usuario";
                    $updateStmt = $this->pdo->prepare($updateQuery);
                    $updateStmt->execute([
                        'hashedPassword' => $hashedPassword,
                        'usuario' => $usuario
                    ]);

                    // Establece la nueva contraseña en la variable $contrasenaAlmacenada
                    $contrasenaAlmacenada = $hashedPassword;
                }

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