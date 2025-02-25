<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SpaRibera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./../resources/css/style.css">
</head>

<body>
    <!-- Header -->
    <header class="flex items-center justify-between px-8 py-4 bg-blue-500 text-white shadow-md">
        <!-- Logo o Nombre -->
        <h1 class="text-2xl font-bold">
            Spa<span class="text-gray-200">Ribera</span>
        </h1>

        <!-- Menú de navegación -->
        <nav class="hidden md:flex space-x-6">
            <a href="./indexView.php" class="hover:underline">Inicio</a>
            <a href="#" class="hover:underline">Servicios</a>
            <a href="#" class="hover:underline">Contacto</a>
        </nav>

        <!-- Botón de inicio de sesión -->
        <a href="./logout.php" class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-200 transition">
            Cerrar Sesión
        </a>
    </header>