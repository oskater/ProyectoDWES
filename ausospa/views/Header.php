<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SpaRibera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>
    <!-- Header -->
    <header class="flex flex-wrap items-center justify-between px-8 py-4 bg-blue-500 text-white shadow-md">
        <!-- Logo o Nombre -->
        <h1 class="text-3xl font-bold">
            Spa<span class="text-gray-300 text-2xl">Ribera</span>
        </h1>

        <!-- Menú de navegación -->
        <nav class="flex space-x-6">
            <a href="./dashboard.php?controller=Cliente&action=listar" class="hover:text-gray-300">Clientes</a>
            <a href="./dashboard.php?controller=Perro&action=listar" class="hover:text-gray-300">Perros</a>
            <a href="./dashboard.php?controller=Servicio&action=listar" class="hover:text-gray-300">Servicios</a>
            <a href="./dashboard.php?controller=PerroRecibeSer&action=listar" class="hover:text-gray-300">Servicios Realizados</a>
            <a href="./dashboard.php?controller=Empleado&action=listar" class="hover:text-gray-300">Empleados</a>
        </nav>

        <!-- Botón de inicio de sesión -->
        <a href="./logout.php" class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-200 transition">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </header>
    <main>