<?php
include("../db.php"); // Conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara y ejecuta la consulta para eliminar la pregunta
    $query = "DELETE FROM preguntas WHERE ID = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error al eliminar la pregunta: " . mysqli_error($conn));
    }

    // Redirigir de vuelta al índice después de eliminar
    header("Location: index.php");
}
?>