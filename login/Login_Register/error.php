<?php include("../../db.php")?>
<?php


$usuario = $_POST['usuario'];
$pass = $_POST['contraseña'];

$consulta = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("ss", $usuario, $pass);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    header("Location:../../index_usuario.php");
    exit();
} else {
    echo "<h1 class='bad'>ERROR DE AUTENTIFICACION</h1>";
    include("login.html");
}

$stmt->close();
$conn->close();
?>
