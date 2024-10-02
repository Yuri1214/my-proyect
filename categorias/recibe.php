<?php 
include("../db.php");
include("../includes/header_admin.php"); 

// Verifica si se ha seleccionado una categoría
if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    // Obtén el ID de la categoría seleccionada
    $query_categoria = "SELECT ID FROM categoria WHERE nombre = '$categoria' LIMIT 1";
    $result_categoria = mysqli_query($conn, $query_categoria);

    if ($result_categoria && mysqli_num_rows($result_categoria) > 0) {
        $cat_row = mysqli_fetch_assoc($result_categoria);
        $categoria_id = $cat_row['ID'];

        // Filtra preguntas por el ID de la categoría seleccionada
        $query_preguntas = "SELECT * FROM preguntas WHERE categoria_id = '$categoria_id'";
        $result_asks = mysqli_query($conn, $query_preguntas);

        if (mysqli_num_rows($result_asks) > 0) {
            // Mostrar preguntas relacionadas con la categoría seleccionada
            ?>
            <div class="card">
                <div class="card-body">
                    <h2>Preguntas de la categoría: <?php echo $categoria; ?></h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">Enunciado</th>
                                    <th scope="col">Opción A</th>
                                    <th scope="col">Opción B</th>
                                    <th scope="col">Opción C</th>
                                    <th scope="col">Opción D</th>
                                    <th scope="col">Respuesta Correcta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result_asks)) { ?>
                                    <tr>
                                        <td><?php echo $row['enunciado']; ?></td>
                                        <td><?php echo $row['opcion_A']; ?></td>
                                        <td><?php echo $row['opcion_B']; ?></td>
                                        <td><?php echo $row['opcion_C']; ?></td>
                                        <td><?php echo $row['opcion_D']; ?></td>
                                        <td><?php echo $row['respuesta_correcta']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<p>No hay preguntas para la categoría seleccionada.</p>";
        }
    } else {
        echo "<p>La categoría seleccionada no existe.</p>";
    }
} else {
    echo "<p>Por favor, selecciona una categoría válida.</p>";
}

include("../includes/footer.php");
?>
