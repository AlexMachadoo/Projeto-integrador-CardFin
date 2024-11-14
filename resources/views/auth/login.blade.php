<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .left-side {
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            border-radius: 8px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .login-box:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2), 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #4c9dff;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input {
            margin-right: 5px;
        }

        .links {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .links a {
            color: #4c9dff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #4c9dff;
            color: #fff;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #3687e4;
            transform: scale(1.05);
        }

        .btn:active {
            transform: scale(0.98);
        }

        .right-side {
            width: 50%;
            height: 100%;
            background-color: #4c9dff;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 30px;
        }

        .ad-container {
            text-align: center;
        }

        .ad-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        .ad-container h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ad-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .ad-container a {
            text-decoration: none;
            background-color: #ff9900;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .ad-container a:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="left-side">
            <div class="login-box">
                <h2>Entrar</h2>

                <form action="/login" method="POST">
                @csrf

                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required autofocus>
                    </div>

                    <div class="input-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Lembrar-me</label>
                    </div>

                    <button type="submit" class="btn">Entrar</button>

                    <div class="links">
                        <a href="/password/request">Esqueceu sua senha?</a>
                        <a href="/register">Registre-se</a>
                        
                    </div>
                </form>
            </div>
        </div>

        <div class="right-side">
            <div class="ad-container">
                <img src="logo.png" alt="Logo CardFin">
                <h3>Bem-vindo ao CardFin</h3>
                <p>O seu banco digital para um futuro financeiro mais fácil e rápido. Abra sua conta e aproveite todas as vantagens.</p>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = '#4c9dff';
            });

            input.addEventListener('blur', function() {
                this.style.borderColor = '#ddd';
            });
        });

        const button = document.querySelector('.btn');
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.05)';
        });

        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
        });
    </script>

</body>
</html>
