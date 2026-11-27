<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica García</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f8;
        }

        .menu {
            width: 230px;
            height: 100vh;
            background: #542579;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 15px;
            display: flex;
            flex-direction: column;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h2 {
            margin-bottom: 5px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 14px;
            display: block;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .menu a:hover {
            background: #75449b;
        }

        .salir {
            margin-top: auto;
        }

        .contenido {
            margin-left: 230px;
            padding: 30px;
        }

        .encabezado {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .encabezado h1 {
            margin: 0;
            color: #542579;
        }

        .principal {
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        @media (max-width: 650px) {
            .menu {
                width: 170px;
            }

            .contenido {
                margin-left: 170px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="menu">
        <div class="logo">
            <h2>GARCÍA</h2>
            <p>ÓPTICAS</p>
        </div>

        <a href="{{ route('pacientes.index') }}">Inicio</a>

        <a href="{{ route('pacientes.create') }}">Nuevo paciente</a>

        <div class="salir">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('form-salir').submit();">
                Salir
            </a>

            <form id="form-salir" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </div>

    <div class="contenido">
        <div class="encabezado">
            <h1>GARCÍA ÓPTICAS</h1>
        </div>

        <div class="principal">
            @yield('contenido')
        </div>
    </div>

</body>
</html>