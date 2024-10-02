<?php include("../db.php"); ?>
<?php include("../includes/header_admin.php"); ?>

<!-- Mostrar mensajes -->
<?php if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset(); } ?>

<form method="POST" action="recibe.php">
    <div class="categoria">
        <h1>Seleccione categoria</h1>
        <select class="form-control" name="categoria">
            <option value="">Seleccionar</option>
            <option value="Matematicas">Matematicas</option>
            <option value="Lenguaje">Lenguaje</option>
            <option value="C.Ciudadanas">C.Ciudadanas</option>
            <option value="Biología y Química">Biología y Química</option>
            <option value="Inglés">Inglés</option>
        </select><br>
        <input type="submit" name="enviar" class="btn btn-success" value="Filtrar Preguntas">
    </div>
</form>

<?php include("../includes/footer.php") ?>
