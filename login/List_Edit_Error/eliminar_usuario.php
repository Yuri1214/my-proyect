<?php include("../../includes/header_admin.php"); ?>
<?php
include('../../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}

header("Location: listar_usuarios.php");
exit();
?>
