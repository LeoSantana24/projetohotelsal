<!DOCTYPE html>
<html lang="pt">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login</title>

    <style>
        body {
            background-image: url('images/sm.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>

<body>

    
    <div class="back-button">
        <a href="/" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm transition duration-200">
            ⬅️ Back to home
        </a>
    </div>

    
    <div class="bg-white bg-opacity-90 p-10 rounded-lg shadow-lg w-full max-w-lg">
        
        <h2 class="text-3xl font-bold text-center mb-6">Login</h2>

        
        @if(session('error'))
            <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Campo de e-mail -->
            <div>
                <label for="email" class="block font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de senha -->
            <div class="relative">
                <label for="password" class="block font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50 pr-10"
                           required>
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 flex items-center">
                        👁️
                    </button>
                </div>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lembrar e recuperar senha -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600">Remind me</span>
                </label>

                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Forgot your password?
                </a>
            </div>

            <!-- Criar conta e botão de login -->
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Create account
                </a>
                <button type="submit" class="btn btn-primary">
                    To enter
                </button>
            </div>
        </form>
    </div>

    <!-- Script para alternar visualização da senha -->
    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        });
    </script>

</body>
</html>
