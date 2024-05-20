<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Abarrotes</title>
    <style>
        /* Estilos básicos */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-image: url('tienda_de_barrio.jpg');
            background-size: cover;
            color: black;
            padding: 20px;
            text-align: center;
        }

        nav {
            text-align: center;
            margin-top: 20px;
        }

        nav a {
            margin-right: 20px;
            color: black;
            text-decoration: none;
        }

        .content {
            display: none; /* Inicialmente oculto */
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Tienda de Abarrotes</h1>
    </header>
    <nav>
        <a href="#" onclick="toggleContent()">Actualizacion Stock</a>
    </nav>
    <div class="content" id="content">
        @yield('content')
    </div>

    <script>
        function toggleContent() {
            var content = document.getElementById('content');
            if (content.style.display === 'none') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        }
    </script>
</body>

</html>
