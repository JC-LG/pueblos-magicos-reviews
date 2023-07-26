<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = "pueblos_magicos";

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error de conexion: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}

$db = new Database();
$db_connection = $db->getConnection();

$nombre = $_POST['nombre'];
$pueblo = $_POST['pueblo'];
$comentarios = $_POST['review'];

$query = 'insert into reviews(nombre, pueblo, comentarios) values (?, ?, ?)';
//$result = $db_connection->execute_query($query, ['Juan','Test','Pueblo']);
$result = $db_connection->execute_query($query, [$nombre, $pueblo, $comentarios]);

http_response_code(200);

?>
