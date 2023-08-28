<?php 
include '_db.php';



$result= array();
$result['datos'] =array();
$codigo= $_REQUEST['codigo'];
$query ="SELECT *FROM user where documento=".$codigo;
$responce = mysqli_query($conexion,$query);

while($row = mysqli_fetch_array($responce))
{
    $index['id'] =$row['0'];
    $index['nombre'] =$row['1'];
    $index['correo'] =$row['2'];
    $index['telefono'] =$row['3'];
    $index['password'] =$row['4'];
    $index['fecha'] =$row['5'];
    $index['rol'] =$row['6'];
    $index['imagen'] =$row['7'];
    $index['documento'] =$row['8'];
    $index['apellidos'] =$row['9'];
    $index['ciudad'] =$row['10'];
    $index['departamento'] =$row['11'];
    $index['direccion'] =$row['12'];
    $index['empresa'] =$row['13'];
    $index['estado'] =$row['14'];
    $index['recibo'] =$row['15'];

    

   

    array_push($result['datos'], $index);

}
$result["exito"]="1";
echo json_encode($result);

?>