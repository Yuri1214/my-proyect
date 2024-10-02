<?php include("../../includes/header_admin.php"); ?>

<?php
include('../../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT usuario, contraseña FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($usuario, $password);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevo_usuario = $_POST['usuario'];
    $nueva_password = $_POST['contraseña'];
    
    $sql = "UPDATE usuarios SET nombre = ? usuario = ?, contraseña = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nuevo_usuario, $nueva_password, $id);
    
    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
    
    header("Location: listar_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editar.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Usuario</h2>
        <form method="POST" action="">
        <div class="mb-3">
                <label for="usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="listar_usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
