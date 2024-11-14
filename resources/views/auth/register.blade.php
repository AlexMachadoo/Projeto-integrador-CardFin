<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - CardFin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos principais */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #4c9dff, #68a0ff); /* Gradiente azul */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            width: 100%;
            max-width: 480px;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05); /* Sombras mais fortes */
            border-radius: 8px;
            transition: box-shadow 0.3s ease, transform 0.2s ease-in-out;
        }

        .register-box:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 0 15px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px); /* Efeito de elevação no hover */
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-group input:focus {
            border-color: #4c9dff;
            box-shadow: 0 0 5px rgba(76, 157, 255, 0.5);
        }

        .flex-end {
            display: flex;
            justify-content: flex-end;
            font-size: 14px;
            margin-top: 20px;
        }

        .links a {
            color: #4c9dff;
            text-decoration: none;
            font-weight: 500;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background-color: #4c9dff;
            color: #fff;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #3687e4;
            transform: scale(1.05); /* Efeito de aumento */
        }

        .btn:active {
            transform: scale(0.98); /* Efeito de diminuição */
        }

        /* Adicionando um efeito de animação ao fundo */
        .container {
            background: linear-gradient(to right, #4c9dff, #68a0ff);
            animation: gradientAnimation 6s infinite alternate;
        }

        @keyframes gradientAnimation {
            0% {
                background: linear-gradient(to right, #4c9dff, #68a0ff);
            }
            50% {
                background: linear-gradient(to right, #68a0ff, #4c9dff);
            }
            100% {
                background: linear-gradient(to right, #4c9dff, #68a0ff);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Formulário de Cadastro -->
        <div class="register-box">
            <h2>Cadastro</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="input-group">
                    <label for="name">Nome</label>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- E-mail -->
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="input-group">
                    <label for="password">Senha</label>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmar Senha -->
                <div class="input-group">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Botão de Cadastro -->
                <button type="submit" class="btn">Cadastrar</button>

                <!-- Link para login -->
                <div class="flex-end">
                    <a href="{{ route('login') }}">Já tem uma conta? Entre</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Script para animações de foco e clique nos campos de entrada
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = '#4c9dff';
                this.style.boxShadow = '0 0 5px rgba(76, 157, 255, 0.5)';
            })});