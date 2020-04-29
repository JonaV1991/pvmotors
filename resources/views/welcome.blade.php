<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @extends('layouts.head_bootstrap')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .container{
                background-color: #F5F5F5;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
          <!-- cabecera -->
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="form-group">
              <ul class="nav nav-tabs">
                @if (Route::has('login'))
                @auth
                <li role="presentation" class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                @else
                <li role="presentation" class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Ingresar</a></li>

                @if (Route::has('register'))
                <li role="presentation" class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                @endif
                @endauth
                @endif  
              </ul>
            </div>
          </div>
          <div class="content">
            <div class="title m-b-md">
              <h1><b>P&V MOTORS</b></h1>
            </div>
            <!-- Imágenes en carrusel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
                <li data-target="#carousel" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img width="40%" src="imagenes/imagen1.jpg" class="adapter"> 
                </div>
                <div class="carousel-item">
                  <img width="40%" src="imagenes/imagen2.jpg" class="adapter"> 
                </div>
                <div class="carousel-item">
                  <img width="40%" src="imagenes/imagen3.jpg" class="adapter"> 
                </div>
                <div class="carousel-item">
                  <img width="40%" src="imagenes/imagen4.jpg" class="adapter"> 
                </div>
                <div class="carousel-item">
                  <img width="40%" src="imagenes/imagen5.jpg" class="adapter"> 
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- Enlaces -->
            <div class="row">
              <div class="col-lg-2"></div>
              <ul class="nav nav-tabs">
                <li role="presentation" class="nav-item"><a class="nav-link" href="#intro" data-toggle="tab">Quiénes Somos?</a></li>
                <li role="presentation" class="nav-item active"><a class="nav-link" href="#tienda" data-toggle="tab">Tienda</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="#cotizaciones" data-toggle="tab">Cotiza Aquí</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="#contacto" data-toggle="tab">Contactos</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="#servicios" data-toggle="tab">Servicios</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="#carrito" data-toggle="tab"><i class="glyphicon glyphicon-shopping-cart">Compras</i></a></li>
              </ul>
            </div>
            <!-- Cuerpo de enlaces -->
            <div class="tab-content clearfix">
              <!-- Enlace quiénes somos -->
              <div class="tab-pane" id="intro">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-7">
                    <p class="text-justify">
                      En el año 2007 el Grupo Hidrobo con una amplia experiencia en la venta de vehículos, repuestos y accesorios a través del Econ. Fernando Hidrobo Estrada adquiere la compañía HYUNMOTOR, concesionaria de vehículos Hyundai, con instalaciones en las principales ciudades del país: Quito, Guayaquil y Cuenca

                      Su oficina principal se encuentra ubicada en la ciudad de Quito con su Gerente General y Representante Legal el Señor Christian Godoy y como Gerente de ventas el Señor Juan Carlos Molina, su agencia en Guayaquil, ubicada en la Av. Juan Tanca Marengo con su Jefe de Agencia el señor Jimmy Jara y la agencia Cuenca ubicada en la calle Elia Liut, con su Gerente el señor Fabián Moscoso Vintimilla.
s
                      Desde sus inicios Hyunmotor S.A. siempre ha sido una figura muy importante dentro la participación del mercado de Hyundai lo que nos ha llevado hasta el día de hoy a que nuestros clientes y público en general nos conozcan como "el mejor" a nivel nacional por su calidad de servicio y productos tanto en ventas, como en postventa.
                    </p>
                  </div>  
                </div>
              </div>
              <!-- Enlace tienda -->
              <div class="tab-pane active" id="tienda">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <p class="text-justify">
                      Aqui van a ir las tiendas que se responde
                    </p>
                  </div>  
                </div>
              </div>
              <!-- Enlace Cotiza Aquí-->
              <div class="tab-pane" id="cotizaciones">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <p class="text-justify">
                      Aqui van a ir las cotizaciones que se responde
                    </p>
                  </div>  
                </div>
              </div>
              <!-- Enlace contactos -->
              <div class="tab-pane" id="contacto">
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-8">
                    <p class="text-justify">
                      Aqui van a ir las contactos que se responde
                    </p>
                  </div>  
                </div>
              </div>
              <!-- Enlace Servicios -->
              <div class="tab-pane" id="servicios">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <p class="text-justify">
                      Aqui van a ir las servicios que se responde
                    </p>
                  </div>  
                </div>
              </div>
              <!-- Enlace compras -->
              <div class="tab-pane" id="carrito">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <p class="text-justify">
                      Aqui van a ir las carrito de compras que se responde
                    </p>
                  </div>  
                </div>
              </div>
            </div>
            </div>
        </div>
    </body>
</html>
