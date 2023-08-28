<?php

$conexion = mysqli_connect("localhost", "root", "", "r_user");

if (
    isset($_POST["documento"]) && !empty($_POST["documento"]) &&
    isset($_POST["nombres"]) && !empty($_POST["nombres"]) &&
    isset($_POST["apellidos"]) && !empty($_POST["apellidos"]) &&
    isset($_POST["correo"]) && !empty($_POST["correo"]) &&
    isset($_POST["telefono"]) && !empty($_POST["telefono"]) &&
    isset($_POST["password"]) && !empty($_POST["password"]) &&
    isset($_POST["rol"]) && !empty($_POST["rol"]) &&
    isset($_POST["ciudad"]) && !empty($_POST["ciudad"]) &&
    isset($_POST["departamento"]) && !empty($_POST["departamento"]) &&
    isset($_POST["direccion"]) && !empty($_POST["direccion"]) &&
    isset($_POST["empresa"]) && !empty($_POST["empresa"]) &&
    isset($_POST["estado"]) && !empty($_POST["estado"]) &&
    isset($_POST["recibo"]) && !empty($_POST["recibo"])
) {

    $nombre = $_POST["nombres"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $rol = $_POST["rol"];

    $documento = $_POST["documento"];
    $apellidos = $_POST["apellidos"];
    $ciudad = $_POST["ciudad"];
    $departamento = $_POST["departamento"];
    $direccion = $_POST["direccion"];
    $empresa = $_POST["empresa"];
    $estado = $_POST["estado"];


    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }



    if (isset($_POST["recibo"]) && !empty($_POST["recibo"])) {
        $recibo = $_POST["recibo"];
    } else {
        $recibo = '';
    }

    $sql = "INSERT INTO user (id,nombre, correo, telefono, password, rol, imagen, documento, apellidos, ciudad, departamento, direccion, empresa, estado, recibo)
    VALUES (null, '$nombre', '$correo', '$telefono', '$password', $rol, '$imagen', '$documento', '$apellidos', '$ciudad', '$departamento', '$direccion', '$empresa', '$estado', '$recibo')";
echo $sql;

if ($conexion->query($sql) === TRUE) {
    header('Location: ../views/user.php');
} else {
    echo "No se pudo realizar la accion";
}


    /*  $sql = "INSERT INTO user (nombre, correo, telefono, password, rol, imagen, documento, apellidos, ciudad, departamento, direccion, empresa, estado, url_recibo)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "ssssss", $nombre, $correo, $telefono, $password, $rol, $imagen, $documento, $apellidos, $ciudad, $departamento, $direccion, $empresa, $estado, $recibo);

        if (mysqli_stmt_execute($statement)) {
      header('Location: ../views/user.php');

        } else {
            echo "No se pudo realizar la accion";
        }
        mysqli_stmt_close($statement);
    }*/

    mysqli_close($conexion);
} else {

    echo "que pasas";
?>


<?php  } ?>
