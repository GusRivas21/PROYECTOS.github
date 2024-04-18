<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>


    <!-- <h1>Bienvenidos/as</h1> -->
    <a href="registrar.php ">registro</a>
    <table border="1">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>GENERO</th>
                <th>Modificar/Eliminar</th>
            </tr>

<?php

//abro conexion
include_once('datos.php');
$conexion->conectar();
$registros = $gestion->select();
foreach($registros as $filas){
//ejecuto procesos de servidor
    // $consulta = "SELECT * FROM registros";
    // $ejecutar_consulta = $conexion->conexion->query($consulta);
    // while ($filas=mysqli_fetch_row($ejecutar_consulta)){
    echo "<tr>";
        echo"<td>".$filas['id']."</td>";
        echo"<td>".$filas['nombre']."</td>";
        echo"<td>".$filas['telefono']."</td>";
        echo"<td>".$filas['genero']."</td>";
        //agregar las columnas de modificar y eliminar
        echo "<td><a href = 'modificar.php?id=".$filas['id']."'>Modificar</a>
        <a href = 'datos.php?iddelete = ".$filas['id']."&banderaE = 3'>Eliminar</a>
        </td>";
        echo"</tr>";
    //}
    //cierro conexion
}
//$conexion->desconectar();
?>
</table>

</body>
</html>