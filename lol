<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
}

a {
  color: #47b2e4;
  text-decoration: none;
}


h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Jost", sans-serif;
}

#encabezado {
  padding: 15px 0;
  background-color: #37517e;
  border-top:#209ed800;
  border-bottom: white;
  border-style:solid;
  border-left: white;
  border-right: white;
}
#encabezado .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 500;
  letter-spacing: 2px;
  text-transform: uppercase;
}

#encabezado .logo a {
  color: #fff;
}

#encabezado .logo img {
  max-height: 40px;
}

.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}
.navbar .getstarted{
  padding: 8px 20px;
  margin-left: 40px;
  border-radius: 50px;
  color: #fff;
  font-size: 14px;
  border: 2px solid #47b2e4;
  font-weight: 700;
}

#container{
    background-color: #ffffff;
}



  #contenedor .btn-inicio {
    font-size: 16px;
    padding: 10px 24px 11px 24px;
  }

section {
  padding: 62px 0;
  overflow: hidden;
}



#footer {
  font-size: 14px;
  background: #37517e;
}
#footer .footer-bottom {
  padding-top: 30px;
  padding-bottom: 30px;
  color: #fff;
}
#footer .copy {
  float: left;
}
#footer .creditos {
  float: right;
  font-size: 13px;
}
#footer .creditos a {
  transition: 0.3s;
}

.team .member {
  position: relative;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 25px;
  border-radius: 5px;
  background: #37517e;
  color: #fff;
  transition: 0.5s;
}

.team .member .pic {
  width: 180px;
  border-radius: 50%;
}

.team .member .pic img {
  transition: ease-in-out 0.3s;
}

.team .member:hover {
  transform: translateY(-10px);
}

.team .member .member-info {
  padding-left: 30px;
}

.team .member h4 {
  font-weight: 700;
  margin-bottom: 5px;
  margin-top: 10px;
  font-size: 20px;
  color: #fff;
}

.team .member span {
  display: block;
  font-size: 15px;
  padding-bottom: 10px;
  position: relative;
  font-weight: 500;
}

.team .member span::after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 1px;
  background: #cbd6e9;
  bottom: 0;
  left: 0;
}

.team .member p {
  margin: 10px 0 0 0;
  font-size: 14px;
}

.team .member .social {
  margin-top: 12px;
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

.team .member .social a {
  transition: ease-in-out 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50px;
  width: 32px;
  height: 32px;
  background: #eff2f8;
}

.team .member .social a i {
  color: #37517e;
  font-size: 16px;
  margin: 0 2px;
}

.team .member .social a:hover {
  background: #47b2e4;
}

.team .member .social a:hover i {
  color: #fff;
}

.team .member .social a+a {
  margin-left: 8px;
}
  </style>
</head>
<body>

  <header id="encabezado" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><img src="imagenes/img/logo/sistema-operativo.png" class="img-fluid"></a><a href="index.html">  Gestion Escolar</a></h1>

    </div>
  </header>
  <center>
    <section id="container" class="d-flex">
      <div class="container" data-aos="fade-up">
          <div class="col-lg-10 d-flex flex-column">
              <section id="contact" class="contact">
                  <div class="container"  style="margin-bottom: 0px;">
            
                      <h2 style="color:#fff;">Gestionar asistencia</h2>
                    </div>
                      <div class="col-lg-10 mt-5 mt-lg-0 d-flex " style="margin-bottom: 20px;">
                        <form action="InicioPreceptor.html" method="post" class="php-email-form">
                          <div class="row">
                              <h2>Control de asistencia</h2><p></p>
                             <h5>Nombre del alumno</h5><input type="text"><input type="submit" value="Buscar"></input>
                          <table class="" border="2" style="margin-bottom: 40px;margin-top: 10px;">
                                <tr style="text-align: center;">
                                    <th>Nombre del Alumno</th>
                                    <th>Cantidad asistencias</th>
                                    <th>Cantidad inasistencias</th>
                                    <th>Cantidad inasistencias</th>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan </td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Juan Perez</td>
                                    <td>30</td>
                                    <td>7</td>
                                </tr>
                                   
                                    
                  </div>
                  
                            </div>
                            
                        </table>
                        
                        
                          </div>
                          
                          
                            
                          
                          <div class="text-center"><button type="submit">cerrar</button></div>
  
                        </form>
                        
      </div>
                      </div>
        
                    </div>
            
                  </div>
                </section>
            
              </main>
  
    </section>
  </center>

  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copy">
        &copy; <strong><span> CRVG </span></strong>
      </div>
      <div class="creditos">
        Diseñado por CRVG
      </div>
    </div>
  </footer>
</body>
</html>