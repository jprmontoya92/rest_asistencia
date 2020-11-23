<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
     <!--Font Awesome-->
     <script src="https://kit.fontawesome.com/6e66d244ab.js" crossorigin="anonymous"></script>
    </head>
    <title>Sistema de Asistencia</title>
<body>
    
    <header class="container my-3">
        <img class="rounded mx-auto d-block" src="{{asset('image/logo-ssas.jpg')}}" alt="">
    </header>
    <section class="container">
        <i class="fas fa-building fa-2x mx-3 my-2"></i> <p class="building font-weight-bold">Direccion de Servicio - Primer Piso </p>
        <div class="content">
            <div class="row border">
                <div class="col mt-2">
                    <div class="ml-3 p-3">
                        <h3>Registra tu asistencia:</h3>
                        <ul>
                            <li>Inicia la App de Asistencia</li>
                            <li>Selecciona el tipo de marcaje (Entrada/Salida)</li>
                            <li>Escanea el código Qr </li>
                        </ul>
                    </div>
                  </div>
                 <div class="col d-flex justify-content-center align-items-center">
                    <div id="app">
                        <qr-component></qr-component>
                    </div>
                 </div>
            </div>
        </div>

    </section>

    <footer class="footer">
        <div class="my-3">
            <p class="text-center my-0">Sub Depto Gestión de la Información</p>
            <p class="text-center my-0">Sub Dirección de Desarrollo y Gestión de las Personas</p>
        </div>
      
        
    </footer>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>