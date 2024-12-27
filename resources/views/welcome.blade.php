<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Dancing+Script:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }

        /* Fondo sólido */
        body {
            background-color: #f8f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Contenedor principal */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 70%;
            width: 60%;
            border: 3px solid #800000;
            border-radius: 16px;
            background-color: #f8f7f6; /* Misma que el fondo */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Botones */
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .buttons a {
            text-decoration: none;
            font-size: 1.2rem;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            color: #fff;
            background-color: #800000;
            font-family: 'Dancing Script', cursive; /* Fuente cursiva */
            font-style: italic;
            transition: background-color 0.3s ease, transform 0.2s;
            text-align: center;
        }

        .buttons a:hover {
            background-color: #b30000;
            transform: scale(1.05);
        }

        /* Logo */
        .logo img {
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="img/logo.png" alt="Wine Company">
        </div>

        <!-- Botones -->
        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
