<?php
include("db.php");

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['usuario']=$usuario;


$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:index_administrador.php");

}else
if($filas['id_cargo']==2){ //cliente
header("location:index_usuario.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
