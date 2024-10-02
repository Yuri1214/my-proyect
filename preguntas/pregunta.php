<?php include("../db.php");?>
<?php include('../includes/header_admin.php'); ?>
<div class="container">
    <div class="card card-body">

        <form action="save_ask.php" method="POST">

            <h2>Preguntas</h2>

            <div class="formulario">

                <div class="title">
                    <label for="">Pregunta</label><br>
                    <textarea name="enunciado" class="form-control" required></textarea>
                </div>

                <div class="form-group1">
                    <label>Opcion A</label>
                    <input name="opcion_A" type="text" class="form-control" required>

                    <label>Opcion B</label>
                    <input name="opcion_B" type="text" class="form-control" required>
                </div>
                
                <div class="form-group1">
                    <label>Opcion C</label>
                    <input name="opcion_C" type="text" class="form-control" required>

                    <label>Opcion D</label>
                    <input name="opcion_D" type="text" class="form-control" required>
                </div><br>

                <div class="form-group">
                    <label>Respuesta correcta</label><br>
                    <select class="form-control" name="respuesta_correcta" required>
                        <option value="">Seleccionar</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select><br>
                </div>

                <div class="categoria">
                    <label>Seleccione categoria</label>
                    <select class="form-control" name="categoria">
                        <option class="form-control" >Seleccionar</option>
                        <option value="6">Matematicas</option>
                        <option value="7">Lenguaje</option>
                        <option value="8">C.Ciudadanas</option>
                        <option value="9">Biología y Química</option>
                        <option value="10">Inglés</option>
                    </select><br>
                </div>
                <input type="submit" class="btn btn-success btn-block" 
                        name="save_ask" value="save_ask">

            </div>
        </form>
    </div>
</div>


<?php include('../includes/footer.php');?>

