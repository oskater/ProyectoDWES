<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="m-4 flex flex-col md:flex-row bg-white rounded-xl shadow-xl w-full max-w-4xl overflow-hidden">
        <!-- Sección de bienvenida con imagen -->
        <div class="img__perro hidden md:flex md:w-1/2 bg-blue-500 text-gray-500 flex-col justify-start items-center p-6">
            <h1 class="text-3xl font-bold text-center">Bienvenido a</h1>
            <h2 class="text-4xl font-extrabold">SpaRibera</h2>
        </div>
        <!-- Sección de formulario -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-10">
            <div class="bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-sm border">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Iniciar sesión</h2>
                <form action="" method="POST" class="space-y-5">
                    <div class="relative">
                        <label for="email" class="block text-gray-700 font-medium">Correo electrónico</label>
                        <div class="relative">
                            <i class="fa fa-envelope absolute left-3 top-3 text-gray-400"></i>
                            <input type="email" id="email" name="email" class="w-full pl-10 pr-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-400 text-gray-900" required>
                        </div>
                    </div>
                    <div class="relative">
                        <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                        <div class="relative">
                            <i class="fa fa-lock absolute left-3 top-3 text-gray-400"></i>
                            <input type="password" id="password" name="password" class="w-full pl-10 pr-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-400 text-gray-900" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="#" class="text-sm text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Ingresar</button>
                    
                    <div class="flex items-center justify-center my-4">
                        <hr class="w-1/3 border-gray-400">
                        <span class="mx-3 text-gray-600">o</span>
                        <hr class="w-1/3 border-gray-400">
                    </div>
                    <p class="text-sm text-gray-600 text-center">
                        ¿No tienes una cuenta? 
                        <a href="#" class="text-blue-500 hover:underline font-semibold">Regístrate aquí</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>