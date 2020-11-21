<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Sistema de Asistencia</title>
</head>
<body>
    <header class="container">
        <img class="rounded mx-auto d-block" src="{{asset('image/logo-ssas.jpg')}}" alt="">
    </header>
        {{(String)$identifier->ident_id}}
    <section class="container">
        <div class="content">
            <div class="row border">
                <div class="col mt-2">
                    <h3>Registra tu asistencia:</h3>
                    <ul>
                        <li>Inicia la App de Asistencia</li>
                        <li>Selecciona el tipo de marcaje (Entrada/Salida)</li>
                        <li>Escanea el código Qr </li>
                    </ul>
                  </div>
                <div class="col mt-2">006034eb621a5099b90d6649c7f7f16823e3a6a0</div>
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