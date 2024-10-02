<?php include("../db.php"); ?>
<?php include("../../includes/header_admin.php"); ?>

<div class="categoria">
    <form action="usuario_cat.php" method="POST">
        <h1>Seleccione categoría</h1>
        <select class="form-control" name="categoria">
            <option value="">Seleccionar</option>
            <option value="Matematicas">Matemáticas</option>
            <option value="Lenguaje">Lenguaje</option>
            <option value="C.Ciudadanas">C.Ciudadanas</option>
            <option value="Biología y Química">Biología y Química</option>
            <option value="Inglés">Inglés</option>
        </select><br>
        <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
    </form>
</div>

<?php include("../includes/footer.php"); ?>
