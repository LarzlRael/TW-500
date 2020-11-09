<!DOCTYPE html>
<meta charset="UTF-8">
<!------CONEXION CON LA BASE DE DATOS------>
<?php
$con = mysqli_connect("localhost", "larz", "larz", "cotizacion") or die("Error en la Conexion");
?>
<html>

<head>
    <meta chrset="UTF-8">
    <title>CRUD PHP & MySQL</title>
</head>

<body>
    <center>
        <h2>INSERTAR, LEER, ACTUALIZAR Y BORRAR DATOS (CRUD)</h2>
    </center>
    <form method="post" action="nuevo.php">
        <label>Nombre</label><br />
        <input type="text" name="nombre" placeholder="Escriba su nombre" /><br />
        <label>Apellido</label><br />
        <input type="text" name="apellido" placeholder="Escriba su apellido" /><br />
        <label>Deuda</label><br />

        <input type="number " name="deuda" placeholder="Escriba deuda" /><br/>
        
        <input type="submit" value="Insertar Datos" />
    </form>

   

    

    <!------MOSTRAR TABLA DE BASE DE DATOS------>
    <br />
    <table width="1050" border="2">
        <tr>
            <td bgcolor='#24A16B'>
                <center>COD</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>NOMBRE</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>Apellido</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>Codigo</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>Deuda</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>Interes</center>
            </td>
            <td bgcolor='#24A16B'>
                <center>Total</center>
            </td>
            
        </tr>
        <?php
        $consulta = "SELECT * FROM clientes";
        $ejecutar = mysqli_query($con, $consulta);
        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

            $id_cliente = $fila['id_cliente'];
            $nombre = $fila['nombre'];
            $apellido = $fila['apellido'];
            $deuda = $fila['deuda'];
            // $cantidad = $fila['cantidad'];
            // $precio = $fila['precio'];
            $i++;
        ?>
            <tr>
                <td><?php echo $id_cliente; ?> </td>
                <td><?php echo $nombre; ?> </td>
                <td><?php echo $apellido; ?> </td>
                <td><?php echo cod($deuda); ?> </td>
                <td><?php echo $deuda; ?> </td>
                <td><?ph    p echo registro_deudas($deuda); ?> </td>
                <td><?php echo ($deuda *registro_deudas($deuda))+$deuda; ?> </td>

                
            </tr>
        <?php } ?>
    </table>
    <!------SI PRESIONA BOTON EDITAR SE DIRECCIONA A EDITAR.PHP------>
            

    <?php 
    function registro_deudas($number){
        if($number>0 && $number<1000){
            return 0.02;
        }
        if($number>1001 && $number<2000){
            return 0.05;
        }
        if($number>2001 && $number<3000){
            return 0.1;
        }
        if($number > 3000)
            return 0;
    }
    function cod($number){
        if($number>0 && $number<1000){
            return "cod_01";
        }
        if($number>1001 && $number<2000){
            return "cod_02";
        }
        if($number>2001 && $number<3000){
            return "cod_03";
        }
        if($number > 3000)
        return "cod";
    }
    ?>
</body>

</html>