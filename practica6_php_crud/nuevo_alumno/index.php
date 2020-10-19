<?php 
include_once '../API.php';

    $api = new API();
    if(isset($_POST['nombre']) 
        && isset($_POST['apellido_p'])
        && isset($_POST['apellido_m'])
        && isset($_POST['direccion'])
        && isset($_POST['telefono'])
    ){
        $nombre = $_POST['nombre'];
        $apellido_p = $_POST['apellido_p'];
        $apellido_m = $_POST['apellido_m'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        
        $api->newPersona(array(
            'nombre'=>$nombre,
            'nombre'=>$nombre,
            'apellido_p'=>$apellido_p,
            'apellido_m'=>$apellido_m,
            'direccion'=>$direccion,
            'telefono'=>$telefono
        ));
    }else{
        echo json_encode(array('error'=>'faltan Datos'));
    }
    // $api->nuevoAlumno();
?>