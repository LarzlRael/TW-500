<?php

include 'database.php';

if (
    isset($_POST['id']) &&
    isset($_POST['status'])
) {

    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($status == "1") {
        //     UPDATE table_name
        // SET column1 = value1, column2 = value2, ...
        // WHERE condition;
        $insertar = "UPDATE user SET estado = 0 WHERE id=$id";
    } else {
        $insertar = "UPDATE user SET estado = 1 WHERE id=$id";
    }


    try {
        $ejecutar = mysqli_query($con, $insertar);
        echo json_encode('Updated :D');
    } catch (mysqli_sql_exception $e) {
        echo json_encode($e);
    }
} else {
    echo json_encode("Error de peticion");
}
