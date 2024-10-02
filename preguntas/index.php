<?php include("../db.php")?>
<?php include("../includes/header.php") ?>

<?php
$url_base="http://localhost/Ask2/preguntas/index.php";
?>

<div class="card">
    <div class="card-header">
        <a class="btn btn-success" href="pregunta.php" role="button">Nueva Pregunta</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Enunciado</th>
                        <th scope="col">Opcion A</th>
                        <th scope="col">Opcion B</th>
                        <th scope="col">Opcion C</th>
                        <th scope="col">Opcion D</th>
                        <th scope="col">Respuesta correcta</th>
                        <th scope="col">Categoría</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Obtener todas las preguntas
                    $query = "SELECT * FROM preguntas";
                    $result_asks = mysqli_query($conn, $query);

                    // Obtener todas las categorías
                    $query2 = "SELECT * FROM categoria";
                    $result_cats = mysqli_query($conn, $query2);

                    // Mapear categorías por ID
                    $categories = [];
                    while ($cat_row = mysqli_fetch_array($result_cats)) {
                        $categories[$cat_row['ID']] = $cat_row['nombre'];
                    }

                    // Mostrar preguntas y categorías
                    while ($row = mysqli_fetch_array($result_asks)) {
                        $question_id = $row['ID'];
                        $category_id = $row['categoria_id'];
                        $category_name = isset($categories[$category_id]) ? $categories[$category_id] : 'Desconocida';
                ?>
                    <tr>
                        <td><?php echo $row['enunciado'] ?></td>
                        <td><?php echo $row['opcion_A'] ?></td>
                        <td><?php echo $row['opcion_B'] ?></td>
                        <td><?php echo $row['opcion_C'] ?></td>
                        <td><?php echo $row['opcion_D'] ?></td>
                        <td><?php echo $row['respuesta_correcta'] ?></td>
                        <td><?php echo $category_name ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $question_id; ?>">
                                <i class="fas fa-marker"></i>
                            </button>
                            <a href="delete_ask.php?id=<?php echo $question_id; ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $question_id; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $question_id; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel<?php echo $question_id; ?>">Editar pregunta</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $question_id; ?>">
                                                <div class="form-group">
                                                    <label for="">Pregunta</label><br>
                                                    <textarea name="enunciado" class="form-control"><?php echo $row['enunciado'] ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Opcion A</label>
                                                    <input name="opcion_A" type="text" class="form-control" value="<?php echo $row['opcion_A'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Opcion B</label>
                                                    <input name="opcion_B" type="text" class="form-control" value="<?php echo $row['opcion_B'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Opcion C</label>
                                                    <input name="opcion_C" type="text" class="form-control" value="<?php echo $row['opcion_C'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Opcion D</label>
                                                    <input name="opcion_D" type="text" class="form-control" value="<?php echo $row['opcion_D'] ?>">
                                                </div><br>

                                                <div class="form-group">
                                                    <label>Respuesta correcta</label><br>
                                                    <select class="form-control" name="respuesta_correcta">
                                                        <option value="">Seleccionar</option>
                                                        <option value="A" <?php echo ($row['respuesta_correcta'] == 'A') ? 'selected' : ''; ?>>A</option>
                                                        <option value="B" <?php echo ($row['respuesta_correcta'] == 'B') ? 'selected' : ''; ?>>B</option>
                                                        <option value="C" <?php echo ($row['respuesta_correcta'] == 'C') ? 'selected' : ''; ?>>C</option>
                                                        <option value="D" <?php echo ($row['respuesta_correcta'] == 'D') ? 'selected' : ''; ?>>D</option>
                                                    </select><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary" name="update">Guardar cambios</button>                                
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>
