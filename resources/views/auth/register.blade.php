<!DOCTYPE html>
<html lang="pt">
<head>
    <base href="/public">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

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
        
        <h2 class="text-2xl font-bold text-center mb-4">Registro</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div>
                <label for="phone" class="block font-medium text-gray-700">Telefone</label>
                <input type="text" name="phone" id="phone" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div>
                <label for="país" class="block font-medium text-gray-700">País</label>
                <input type="text" name="país" id="país" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div class="relative">
                <label for="password" class="block font-medium text-gray-700">Senha</label>
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

            <div class="relative mt-4">
                <label for="password_confirmation" class="block font-medium text-gray-700">Confirmar Senha</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50 pr-10"
                           required>
                    <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 px-3 flex items-center">
                        👁️
                    </button>
                </div>
                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">As senhas não coincidem!</p>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Já tem conta?
                </a>
                <button type="submit" id="registerButton"
                        class="btn btn-primary">
                    Registrar
                </button>
            </div>

        </form>

    </div>

    <script>
        function togglePasswordVisibility(inputId, buttonId) {
            const passwordInput = document.getElementById(inputId);
            const toggleButton = document.getElementById(buttonId);

            toggleButton.addEventListener("click", function () {
                passwordInput.type = passwordInput.type === "password" ? "text" : "password";
            });
        }

        // Alternar visibilidade da senha
        togglePasswordVisibility("password", "togglePassword");
        togglePasswordVisibility("password_confirmation", "togglePasswordConfirm");

        // Verificação de senha
        document.querySelector("form").addEventListener("submit", function (event) {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password_confirmation").value;
            const errorText = document.getElementById("passwordError");

            if (password !== confirmPassword) {
                event.preventDefault(); // Impede o envio do formulário
                errorText.classList.remove("hidden");
            } else {
                errorText.classList.add("hidden");
            }
        });
    </script>

</body>
</html>
