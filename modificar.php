<?php
$servername = 'localhost';
$dbname = 'practicarober'; 
$user = 'novo';         
$password = 'Dexter16.';
$database='practicarober';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbbame;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Verifica si los datos han sido enviados correctamente
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['foto'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];

    // Actualiza el registro en la base de datos
    $sql = "UPDATE alumnos2 SET nombre = :nombre, descripcion = :descripcion, foto = :foto WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':foto', $foto);

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        header("Location: inicio.html");
        exit;
    } else {
        echo "Error al modificar el usuario";
    }
}
?>
