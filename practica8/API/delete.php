<?php

include 'database.php';
if (isset($_POST['id'])) {

    $id = $_POST['id'];


    $insertar = "DELETE FROM user where id=$id";

    try {
        $ejecutar = mysqli_query($con, $insertar);
        echo json_encode('Borrado');
    } catch (mysqli_sql_exception $e) {
        echo json_encode($e);
    }
}else{
    echo json_encode("Error, No hay id ");

}
