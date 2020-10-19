<?php 
include_once '../API.php';

    $api = new API();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $api->eliminarAlumno($id);
    }else{
        echo json_encode(array('error'=>'Falta el id'));
    }
    // $api->nuevoAlumno();
?>