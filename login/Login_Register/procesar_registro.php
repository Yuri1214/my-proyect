<?php include("../../db.php"); ?>

<?php
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['contraseña'];

// Preparar la consulta para insertar los datos
$sql = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo) VALUES (?, ?, ?, 2)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $usuario, $password);

if ($stmt->execute()) {
    header('Location: login.html');
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar el statement y la conexión
$stmt->close();
$conn->close();
?>
