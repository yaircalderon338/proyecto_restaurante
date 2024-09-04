<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            height: 100vh; /* Ocupa toda la altura de la ventana */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centra verticalmente */
            align-items: center; /* Centra horizontalmente */
            background-image: url('fondorestaurante1.png'); /* Imagen de fondo */
            background-size: cover; /* Asegura que la imagen cubra toda el área */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
        }

        h1 {
            font-size: 100px; /* Tamaño del título */
            color: #FFFFFF; /* Color del texto en blanco */
            margin: 0; /* Elimina el margen predeterminado */
            font-family: 'Bell MT', serif; /* Fuente para el título */
            font-weight: bold; /* Negrita para el título */
        }

        nav {
            display: flex; /* Utiliza flexbox para alinear los botones en una fila */
            gap: 15px; /* Espacio entre los botones */
            margin-top: 20px; /* Espacio arriba del menú */
        }

        a {
            display: flex; /* Utiliza flexbox para centrar el texto */
            justify-content: center; /* Centra horizontalmente el texto */
            align-items: center; /* Centra verticalmente el texto */
            font-size: 1.5em; /* Tamaño de la fuente del botón */
            text-decoration: none;
            color: #FFFFFF; /* Color del texto en blanco */
            padding: 15px 30px; /* Ajusta el padding para el nuevo tamaño */
            background-color: #000000; /* Fondo del botón en negro */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        a:hover {
            background-color: #f0f0f0;
            color: #000000; /* Cambia el color del texto a negro en hover */
        }
    </style>
</head>

<body>
    <header>
        <h1>EL ARTE CULINARIO</h1>
    </header>
    
    <nav>
        <a href="staff\login.php">EMPLEADO</a>
        <a href="admin\login.php">ADMINISTRADOR</a>
    </nav>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
</body>

</html>



