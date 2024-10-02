<?php
 // La sesion tiene que estar iniciada
 include("../db.php");


if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    // Verificar si la categoría ya existe
    $check_query = "SELECT * FROM categoria WHERE nombre = '$categoria'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = 'La categoría ya existe';
        $_SESSION['message_type'] = 'error'; 
        header("Location: index.php"); // Redirigir de vuelta al formulario
    } else {
        $query = "INSERT INTO categoria(nombre) VALUES ('$categoria')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Error en la consulta");
        } else {
            header('Location: recibe.php');
        }
    }
}
?>
