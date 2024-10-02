<?php
include("../db.php");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $enunciado = $_POST['enunciado'];
    $opcion_a = $_POST['opcion_A'];
    $opcion_b = $_POST['opcion_B'];
    $opcion_c = $_POST['opcion_C'];
    $opcion_d = $_POST['opcion_D'];
    $respuesta_correcta = $_POST['respuesta_correcta'];  

    $query = "UPDATE preguntas 
              SET enunciado='$enunciado', opcion_A='$opcion_a', opcion_B='$opcion_b', opcion_C='$opcion_c', opcion_D='$opcion_d', respuesta_correcta='$respuesta_correcta' 
              WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) { 
        die("Query Failed: " . mysqli_error($conn));
    }

    header("location: index.php");
}
?>
    