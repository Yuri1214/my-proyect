<?php
include("../db.php");

if (isset($_POST['save_ask'])) {
    $enunciado = $_POST['enunciado'];
    $opcion_A = $_POST['opcion_A'];
    $opcion_B = $_POST['opcion_B'];
    $opcion_C = $_POST['opcion_C'];
    $opcion_D = $_POST['opcion_D'];
    $respuesta_correcta = $_POST['respuesta_correcta'];
    $categoria_id = $_POST['categoria'];

    // Inserta la nueva pregunta junto con la categoría en la base de datos
    $query = "INSERT INTO preguntas (enunciado, opcion_A, opcion_B, opcion_C, opcion_D, respuesta_correcta, categoria_id) 
              VALUES ('$enunciado', '$opcion_A', '$opcion_B', '$opcion_C', '$opcion_D', '$respuesta_correcta', '$categoria_id')";
    
    mysqli_query($conn, $query);

    // Redirige o muestra un mensaje de éxito
    header('Location: index.php');
    exit();
}
?>