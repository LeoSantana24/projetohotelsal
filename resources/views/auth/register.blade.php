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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

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
        
        <h2 class="text-2xl font-bold text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-700"> Full name</label>
                <input type="text" name="name" id="name" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" 
                       class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                              focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
                       required>
            </div>

            <div>
    <label for="phone" class="block font-medium text-gray-700">Phone (with country code)</label>
    <input type="text" name="phone" id="phone"
           placeholder="+351 912345678"
           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
           required>
    <p id="phoneError" class="text-red-500 text-sm mt-1 hidden">Include a valid country code (e.g. +1, +351).</p>
</div>


    <div>
    <label for="country" class="block font-medium text-gray-700">Country</label>
    <input list="countries" name="country" id="country"
           placeholder="Type or select a country"
           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50"
           required>

    <datalist id="countries">
        <option value="Brazil">
        <option value="United States">
        <option value="Portugal">
        <option value="France">
        <option value="Germany">
        <option value="Spain">
        <option value="Angola">
        <option value="Mozambique">
        <!-- Adicione mais países -->
    </datalist>
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

            <div class="relative mt-4">
                <label for="password_confirmation" class="block font-medium text-gray-700">Confirm password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="mt-1 block w-full rounded-md border border-gray-700 bg-white px-3 py-2 shadow-sm 
                                  focus:border-black focus:ring focus:ring-gray-500 focus:ring-opacity-50 pr-10"
                           required>
                    <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 px-3 flex items-center">
                        👁️
                    </button>
                </div>
                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">Passwords do not match!</p>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Already have an account??
                </a>
                <button type="submit" id="registerButton"
                        class="btn btn-primary">
                    Register
                </button>
            </div>

        </form>

    </div>

    <script>
    // Alternar visibilidade da senha
    function togglePasswordVisibility(inputId, buttonId) {
        const passwordInput = document.getElementById(inputId);
        const toggleButton = document.getElementById(buttonId);

        toggleButton.addEventListener("click", function () {
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        });
    }

    togglePasswordVisibility("password", "togglePassword");
    togglePasswordVisibility("password_confirmation", "togglePasswordConfirm");

    // Validação ao enviar o formulário
    document.querySelector("form").addEventListener("submit", function (event) {
        const phoneInput = document.getElementById("phone").value.trim();
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("password_confirmation").value;

        const phoneError = document.getElementById("phoneError");
        const passwordError = document.getElementById("passwordError");

        let isValid = true;

        // 📞 Validação do telefone: começa com + seguido de 2 ou 3 números, depois ao menos 6 dígitos
        const phoneRegex = /^\+\d{2,3}\s?\d{6,}$/;
        if (!phoneRegex.test(phoneInput)) {
            phoneError.classList.remove("hidden");
            isValid = false;
        } else {
            phoneError.classList.add("hidden");
        }

        // 🔐 Validação de senha: 8-15 chars, 1 maiúscula, 1 número
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,15}$/;
        if (!passwordRegex.test(password)) {
            passwordError.textContent = "Password must be 8–15 characters, with at least one uppercase letter and one number.";
            passwordError.classList.remove("hidden");
            isValid = false;
        } else if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match!";
            passwordError.classList.remove("hidden");
            isValid = false;
        } else {
            passwordError.classList.add("hidden");
        }

        if (!isValid) {
            event.preventDefault(); // Impede o envio do formulário
        }
    });
</script>

</body>
</html>
