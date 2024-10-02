<?php include("../db.php"); ?>
<?php include("../../includes/header_admin.php"); ?>

<div class="container">
    <?php
    // Verificar si se ha seleccionado una categoría
    if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
        $categoria = $_POST['categoria'];

        // Obtener el ID de la categoría seleccionada
        $query_cat = "SELECT ID FROM categoria WHERE nombre = '$categoria'";
        $result_cat = mysqli_query($conn, $query_cat);
        
        if ($result_cat && mysqli_num_rows($result_cat) > 0) {
            $cat_row = mysqli_fetch_assoc($result_cat);
            $categoria_id = $cat_row['ID'];

            // Consulta para obtener las preguntas relacionadas a la categoría seleccionada
            $query = "SELECT * FROM preguntas WHERE categoria_id = $categoria_id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Formularios disponibles para la categoría: $categoria</h2><br>";

                // Mostrar cada pregunta relacionada como un botón
                while ($row = mysqli_fetch_assoc($result)) {
                    
            
                    echo "<button type='submit' class='btn btn-primary'>" . $row['enunciado'] . "</button>";
                    echo "</form>";
                }
            } else {
                echo "<p>No hay preguntas disponibles para esta categoría.</p>";
            }
        } else {
            echo "<p>La categoría seleccionada no existe.</p>";
        }
    } else {
        echo "<p>Por favor seleccione una categoría.</p>";
    }
    ?>
</div>

<?php include("../includes/footer.php"); ?>
