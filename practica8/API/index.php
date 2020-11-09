<?php
include 'database.php';

$sql = "select * from user order by id desc";
$response = [];

$resultado = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($resultado)) {
    $usuario = [
        'id' => $row["id"],
        'nombre' => $row["nombre"],
        'apellido_p' => $row["apellido_p"],
        'apellido_m' => $row["apellido_m"],
        'telefono' => $row["telefono"],
        'direccion' => $row["direccion"],
        'estado' => $row["estado"]
    ];
    
    // push category to final json array
    array_push($response,$usuario);
}

echo json_encode($response);

?>
