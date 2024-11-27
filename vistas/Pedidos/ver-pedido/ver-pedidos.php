<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<tr>
                <td>Nombre y Apellido</td>
                <td>Fecha</td>
                <td>Servicios</td>
                <td>Pago total</td>

            </tr>

        <?php
        // $sql="SELECT id_ventas,id_cliente,fecha,paga_total, nombre, apellido,id_detalleVenta, id_servicio, servicio FROM detalle_ventas dv INNER JOIN cliente c ON c.id_cliente=dv.id_cliente INNER JOIN ventas v ON v.id_venta=dv.id_venta INNER JOIN servicio s ON s.id_servicio=dv.id_servicio;";
        
        $sql="SELECT id_detalleVenta, dv.id_servicio, id_venta,v.id_ventas, v.id_cliente, nombre, apellido, fecha, paga_total, nombre_Ser FROM detalle_ventas dv
         INNER JOIN ventas v ON v.id_ventas = dv.id_venta INNER JOIN servicio s ON s.id_servicio=dv.id_servicio INNER JOIN cliente c ON c.id_cliente = v.id_cliente";
        $result=mysqli_query($conectar,$sql);
        while($mostrar=mysqli_fetch_array($result)){
            $id=$mostrar['id_ventas'];
            $idc=$mostrar['id_cliente'];
            $sql2="SELECT nombre,apellido FROM cliente c INNER JOIN ventas v ON v.id_cliente=c.id_cliente;";
            $result2=mysqli_query($conectar,$sql2);
            $fecha=$mostrar['fecha'];
            $paga=$mostrar['paga_total'];
            $nombre=$mostrar['nombre'];
            $apellido=$mostrar['apellido'];
            $servicio=$mostrar['nombre_Ser'];
        ?>
        <tr style="margin-top:50px">
            <td><?php $c=1;
             if($c<2){
                echo $nombre,(" "),$apellido;
                 $c++;
                } 
            ?>
                </td>
            <td><?=$fecha?></td>
                <td><?=$servicio?></td>
            <td><?=$paga?></td>
        </tr >
        <?php
        }
        ?>
        </table>
</body>
</html>
            