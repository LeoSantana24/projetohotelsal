<!DOCTYPE html>
<html lang="pt">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Configuração do fundo */
        body {
            background-image: url('images/sm.jpg'); /* Caminho da imagem */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
      
    </style>
</head>

<body>

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-md">
        
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
    <label for="email" class="block font-medium text-gray-700">E-mail</label>
    <input type="email" name="email" id="email" 
           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
           required>
</div>

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
</div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600">Remind me</span>
                </label>

                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                   Forgot your password?
                </a>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Create account
                </a>
                <button type="submit" class="btn btn-primary" >
                    To enter
                </button>
            </div>

        </form>

    </div>

</body>

<script>
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function () {
        // Alternar entre 'password' e 'text'
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>
</html>
