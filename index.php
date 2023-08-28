<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ./includes/login.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
</head>

<body id="page-top">

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="POST">
                        <div class="form-group">
                            <label for="imagen" class="form-label">Foto *</label>
                            <input type="file" type="file" id="selImg" name="selImg" class="form-control" onclick="actualizarImg()">

                        </div>

                        <div class="form-group">
                            <label for="documento" class="form-label">Documento *</label>
                            <input type="
                            " id="documento" name="documento" class="form-control" maxlength="15" required>
                        </div>


                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombres *</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre" class="form-label">Apellidos *</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Correo:</label><br>
                            <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="username">Contraseña:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="form-label">Celular *</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="password">Ciudad:</label><br>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Departamento:</label><br>
                            <input type="text" name="departamento" id="departamento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Direccion:</label><br>
                            <input type="text" name="direccion" id="direccion" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label for="password">Empresa:</label><br>
                            <input type="text" name="empresa" id="empresa" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="rol" class="form-label">Rol *</label>
                            <select id="rol" name="rol" required>
                                <option value="1">Administrador</option>
                                <option value="2">Secretaria</option>
                                <option value="3">Usuario</option>

                            </select>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="rol" class="form-label">Estado *</label>
                            <select id="estado" name="estado" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>

                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="recibo" class="form-label">Recibo de pago *</label>
                            <input type="file" type="file" id="recibo" name="recibo" class="form-control" onclick="actualizarRecibo()">

                        </div>


                        <script>
                            function actualizarImg() {
                                const $inputfile = document.querySelector("#selImg"),
                                    $imgProducto = document.querySelector("#image");
                                // Escuchar cuando cambie
                                $inputfile.addEventListener("change", () => {
                                    // Los archivos seleccionados, pueden ser muchos o uno
                                    const files = $inputfile.files;
                                    // Si no hay archivos salimos de la función y quitamos la imagen
                                    if (!files || !files.length) {
                                        $imgProducto.src = "";
                                        return;
                                    }
                                    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                                    const archivoInicial = files[0];
                                    // Lo convertimos a un objeto de tipo objectURL
                                    const Url = URL.createObjectURL(archivoInicial);
                                    // Y a la fuente de la imagen le ponemos el objectURL
                                    $imgProducto.src = Url;
                                });
                            }


                            function actualizarRecibo() {
                                const $inputfile2 = document.querySelector("#recibo"),
                                    $imgProducto2 = document.querySelector("#image2");
                                // Escuchar cuando cambie
                                $inputfile2.addEventListener("change", () => {
                                    // Los archivos seleccionados, pueden ser muchos o uno
                                    const files2 = $inputfile2.files;
                                    // Si no hay archivos salimos de la función y quitamos el archivo
                                    if (!files2 || !files2.length) {
                                        $imgProducto2.src = "";
                                        return;
                                    }
                                    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                                  
                                    const archivoInicial2 = files2[0];

                                    // Lo convertimos a un objeto de tipo objectURL
                                    const Url2 = URL.createObjectURL(archivoInicial2);
                                    // Y a la fuente de del archivo le ponemos el objectURL


                                    $imgProducto2.src = Url2;

                                });
                            }
                        </script>
                        <br>

                        <div class="mb-3">

                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>

                        </div>


                    </form>


</body>

</html>