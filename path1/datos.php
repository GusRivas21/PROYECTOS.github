<?php
$bandera = isset($_POST['bandera'])? $_POST['bandera']:"";
$nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
$telefono = isset($_POST['telefono']) ? $_POST['telefono']:"";
$genero = isset($_POST['genero']) ? $_POST['genero']:"";
$ids = isset($_POST['id'])? $_POST['id']:"";

include_once ('conf/conf.php');

class registros {
    public $conexion;
    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    public function select(){
        $consultaSelect = "SELECT * FROM registros";
        $ejecutar_consulta = $this->conexion->conexion->query($consultaSelect);
        return $ejecutar_consulta->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($datos){
        $campos = implode(',', array_keys($datos));
        var_dump($campos);
        $valores = "'".implode("','", array_values($datos))."'";
        var_dump($valores);
        $consulta_insertar = "INSERT INTO registros ($campos) VALUES ($valores)";
        var_dump($consulta_insertar);
        $resultado = $this->conexion->conexion->query($consulta_insertar);
        if ($resultado){
            return true;
        }else{
            $this->conexion->conexion->error;
        }
    }

    //metodo de seleccion para update
    public function selectupdate($id){
        $consultaSelect = "SELECT * FROM registros WHERE id=$id";
        $ejecutar_consulta = $this->conexion->conexion->query($consultaSelect);
        return $ejecutar_consulta->fetch_all(MYSQLI_ASSOC);
    }
    //metodo update
    public function update($id, $datos){
        $set = [];
        foreach ($datos as $campo => $valor){
            $set[] = "$campo = '$valor'";
        }
        $set = implode(',', $set);
        $consulta_actualizar = "UPDATE registros SET $set WHERE id = $id";
        $resultado = $this->conexion->conexion->query($consulta_actualizar);
        if($resultado){
            return true;
        }else{
            return $this->conexion->conexion->error;
        }
    }
}

$gestion = new registros($conexion);
if($bandera == 1){
    $datosInsert = array('nombre' => $nombre, 'telefono' => $telefono, 'genero' => $genero);
    $conexion->conectar();
    $gestion->insert($datosInsert);
    if($prueba){
        header('location:index.php');
    }
}else if ($bandera == 2){
    $id = $ids;
    $datosUpdate = array('nombre' => $nombre, 'telefono' => $telefono, 'genero' => $genero);
    $conexion->conectar();
    $prueba = $gestion->update($id, $datosUpdate);

    if ($prueba){
        header('location:index.php');
    }
}
?>