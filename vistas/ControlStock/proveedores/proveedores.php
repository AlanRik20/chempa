<?php
session_start();
require('conexion.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="a/historial2.css">
        
        
       
        <title>Historial</title>
        <script>
        function confirmacion() {
            var respuesta = confirm("¿Desea realmente borrar el registro?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }

        }
</script>
    </head>

        
        
    <body class="fondo">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.navegador {
    background-color: #000000; /* Color de fondo del navegador */
    color: white; /* Color del texto en el navegador */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
}

.imagen-circular {
    width: 70px;
    height: 70px;
    border-radius: 50%; /* Crea una imagen circular */
    background-image: url('./images.png'); /* Ruta de tu imagen circular */
    background-size: cover;
    background-position: center;
}

.titulo {
    margin: 0;
    margin-left: 80px;
    font-size: 40px;
}

.cerrar-sesion {
    text-decoration: none;
    color: black;
    background-color: rgba(255, 255, 47);
    margin-left: 10px;
    padding: 8px 25px;
    border-radius: 5px;
}

.otro-titulo {
    background-color: rgba(255, 255, 47); /* Cambia el color de fondo del segundo título */
    padding: 3px;
    text-align: center;
}

.otro-titulo h2 {
    margin: 0;
    font-size: 20px;
}

    </style>
    <nav class="navegador">
        <div class="imagen-circular"></div>
        <h1 class="titulo">Chempanada</h1>
        <a href="../../index.php" class="cerrar-sesion">Cerrar Sesión</a>
    </nav>
    <div class="otro-titulo">
        <h2>Segundo Título</h2>
    </div>
    <center>
    <div class="container">
        <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                <div class="invoice-header">
                                </div>
                                <div class="row">
                                <form action="buscarproveedor.php" method="POST">
                                <input type="search" style="width: 280px;margin-left:300px;
    padding: 5px;
    border: 1px solid #dadada;text-transform:uppercase;
    border-radius: 3px;" name="busqueda" value="" placeholder="🔎 Buscar por nombre o ID">
                                <i class="fa fa-search"></i>
                                </form>
                                </div>
                                </div>
                                <div class="invoice-body">
                                 
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table custom-table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Proveedor</th>
                                                            <th>Nombre</th>
                                                            <th>Telefono</th>
                                                            <th>Dirección</th>
                                                            <th>Email</th>
                                                            <th></th>
                                                            <th></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $buscardor=mysqli_query($mysqli,"SELECT * FROM proveedores"); 
                                                    while($resultado = mysqli_fetch_assoc($buscardor)){ 
                                            ?>
                                                        

     <?php
         echo "<tr>";
         echo "<td>",$resultado['cod_Proveedor'],"</td>";
         //input Nombre
         echo "<td><form action='Actualizar/ActualizarNombreProv.php' method='post'>
         <input type='hidden' name='cod_Proveedor' value='".$resultado['cod_Proveedor']."'>
         <h3><input style='font-size:15px;border-color:white;border-style:none;
         text-transform: uppercase;width:100px;'type='text' name='nvnombre' class='form-control' value='".$resultado['provedor']."'/></h3></p></form></td>";

         //input email
         echo "<td><form action='Actualizar/ActualizarTelProv.php' method='post'>
         <input type='hidden' name='cod_Proveedor' value='".$resultado['cod_Proveedor']."'>
         <h3><input style='font-size:15px;border-color:white;border-style:none;width:120px;
         'type='number'min='1000000000' max='9999999999' name='nvtelefono' class='form-control' value='".$resultado['telefono']."'/></h3></p></form></td>";

         echo "<td><form action='Actualizar/ActualizarDirProv.php' method='post'>
         <input type='hidden' name='cod_Proveedor' value='".$resultado['cod_Proveedor']."'>
         <h3><input style='font-size:15px;border-color:white;border-style:none;
         text-transform: uppercase;width:170px;'type='text' name='nvdireccion' class='form-control' value='".$resultado['direccion']."'/></h3></p></form></td>";

         echo "<td><form action='Actualizar/ActualizarEmailProv.php' method='post'>
         <input type='hidden' name='cod_Proveedor' value='".$resultado['cod_Proveedor']."'>
         <h3><input style='font-size:15px;border-color:white;border-style:none;
         text-transform: undercase;width:150px;'type='email' name='nvemail' class='form-control' value='".$resultado['email']."'/></h3></p></form></td>";

         echo"<td>
         <form action='Eliminar/eliminarproveedor.php' method='POST'>
         <input type='hidden' name='cod_Proveedor' value='" . $resultado["cod_Proveedor"] . "'>
         <button style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;' type='submit' name='eliminar' value='' onclick='return confirmacion()'><img src='img/delete.png' style='width:23px;'/></button>
         
        </form>
        </td>";
        echo "<td><form action='productosprov.php' method='post'>
        <input type='hidden' name='cod_Proveedor' value='".$resultado['cod_Proveedor']."'>
        <button style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;' type='submit' name='' value=''><img src='img/caja.png' style='width:28px;'/></button>
            
        </form>
        </td>";
         echo "</tr>";
 
     }
     ?>
                                                        
                                                        <tr>
                                                            
                                                                
                                                                <h5 class="text-s"><strong>Proveedores</strong></h5>
                                                            </td>			
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            
</body>