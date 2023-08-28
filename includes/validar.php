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
    isset($_POST["estado"]) && !empty($_POST["estado"]) 
    
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


   /*if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }*/


      /*  if (isset($_FILES["imagen"])) {
            $target_dir = "../imgs/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);

            // Verificar si es una imagen real
            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                    echo "La imagen se subió correctamente.";
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            } else {
                echo "El archivo no es una imagen válida.";
            }
        }
    

        
        if (isset($_FILES["archivo"])) {
            $target_dir = "../recibos/";
            $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Verificar si es un archivo PDF
            if ($imageFileType != "pdf") {
                echo "Solo se permiten archivos PDF.";
                $uploadOk = 0;
            }
    
            if ($uploadOk == 0) {
                echo "No se pudo subir el archivo.";
            } else {
                if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
                    echo "El archivo se subió correctamente.";
                } else {
                    echo "Hubo un error al subir el archivo.";
                }
            }
        }*/



        if (isset($_FILES["imagen"]) && isset($_FILES["pdf"])) {
            $target_dir = "../imgs/";
            $target_dir2 = "../recibos/";
    
            // Manejar la subida de la imagen
            $imageFileType = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
            $target_image = $target_dir . $documento."." . $imageFileType;
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_image)) {
                echo "La imagen se subió correctamente. ";
            } else {
                echo "Hubo un error al subir la imagen. ";
            }
    
            // Manejar la subida del archivo PDF
            $pdfFileType = strtolower(pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION));
            $target_pdf = $target_dir2 . $documento.".pdf";
            if ($_FILES["pdf"]["type"] == "application/pdf" && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_pdf)) {
                echo "El archivo PDF se subió correctamente.";
            } else {
                echo "Hubo un error al subir el archivo PDF.";
            }
        }

  
        $recibo = '';
   

    $sql = "INSERT INTO user (id,nombre, correo, telefono, password, rol, imagen, documento, apellidos, ciudad, departamento, direccion, empresa, estado, recibo)
    VALUES (null, '$nombre', '$correo', '$telefono', '$password', $rol, '$target_image', '$documento', '$apellidos', '$ciudad', '$departamento', '$direccion', '$empresa', '$estado', '$target_pdf')";
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

    echo "campos vacios";

   
?>


<?php  } ?>
