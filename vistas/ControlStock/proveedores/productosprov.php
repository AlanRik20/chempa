<?php
session_start();
require('conexion.php');
$cod_Proveedor=$_POST['cod_Proveedor'];

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
  
</div>
        
        
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
    <div class="container" style="width:700px;">
        <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                <div class="invoice-header">
                                </div>
                                <div class="row">
                                
                                </div>
                                </div>
                                <div class="invoice-body">
                                 
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table custom-table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Articulo</th>
                                                            <th></th>
                                                            <th>Nombre</th>
                                                            <th>Precio</th>
                                                            <th>Stock</th>
                                                            <th></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $query = "SELECT * FROM articulos WHERE cod_Proveedor=$cod_Proveedor ORDER BY `articulos`.`Nombre` ASC";
                                                    $result = mysqli_query($mysqli, $query);
                                                    if(mysqli_num_rows($result) > 0)
                                                    {
                                                    while($resultado = mysqli_fetch_array($result))
                                                    {
                                                   
                                            ?>
                                                        

                                                        <?php
                                                        echo "<tr>";
                                                        echo "<td>",$resultado['cod_Articulo'],"</td>";
                                                        //input Nombre
                                                        echo "<td style='width:80px;'><img style='height:70px;width:70px;object-fit:cover;' src='img/",$resultado['img'],"' alt='' ></td>";
                                                        echo "<td>",$resultado['Nombre'],"</td>";
                                                        echo "<td>",$resultado['Precio'],"</td>";
                                                        echo "<td>",$resultado['Stock'],"</td>";

                                                        echo"<td>
                                                        <form action='Eliminar/eliminararticulo.php' method='POST'>
                                                        <input type='hidden' name='cod_Articulo' value='" . $resultado["cod_Articulo"] . "'>
                                                        <button style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;' type='submit' name='eliminar' value='' onclick='return confirmacion()'><img src='img/delete.png' style='width:23px;'/></button>
                                                        
                                                    </form>
                                                    </td>";
                                                    
                                                        echo "</tr>";
                                                
                                                    }
                                                }
                                                
                                                    ?>
                                                        
                                                        <tr>
                                                            
                                                                
                                                                <h5 class="text-s"><strong>Productos del proveedor seleccionado</strong></h5>
                                                            </td>			
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            
</body>