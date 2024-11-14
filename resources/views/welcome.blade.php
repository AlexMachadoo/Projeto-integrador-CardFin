<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CardFin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(135deg, #a0e1f5 0%, #c7e7f7 100%);
            transition: background 0.5s ease;
        }

        body.dark {
            background: linear-gradient(135deg, #243b55, #3b8d99);
        }

        .container {
            text-align: center;
            padding: 40px;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-in-out forwards;
            transform: scale(0.9);
        }

        .container h1 {
            font-size: 3rem;
            color: #3173b8;
            text-transform: uppercase;
            background: linear-gradient(to right, #2b98ff, #6ec1e4);
            -webkit-background-clip: text;
            color: transparent;
            animation: slideIn 1s forwards;
        }

        .container p {
            font-size: 1.1rem;
            margin: 20px 0;
            color: #4b5563;
            opacity: 0;
            animation: fadeIn 1s 0.5s forwards;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #3173b8;
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: bounce 1.2s infinite;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .toggle-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: #2d3748;
            color: #fff;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .toggle-btn:hover {
            transform: rotate(180deg);
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-15px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-100px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <button class="toggle-btn" id="toggleDarkMode">🌙</button>
    <div class="container">
        <h1>Bem-vindo ao CardFin</h1>
        <p>Gerencie seus empréstimos e cartões com facilidade.</p>
        <a href="{{ route('login') }}" class="btn">Entrar</a>
    </div>

    <script>
        const toggleButton = document.getElementById('toggleDarkMode');
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            toggleButton.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
        });

        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = `${x}px`;
            particle.style.top = `${y}px`;
            particle.style.animationDuration = `${Math.random() * 3 + 2}s`;
            document.body.appendChild(particle);

            particle.addEventListener('animationend', () => {
                particle.remove();
            });
        }

        document.addEventListener('mousemove', (e) => {
            if (Math.random() > 0.95) {
                createParticle(e.pageX, e.pageY);
            }
        });

        const button = document.querySelector('.btn');
        button.addEventListener('mousedown', () => {
            button.style.transform = 'scale(0.95)';
        });

        button.addEventListener('mouseup', () => {
            button.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>
