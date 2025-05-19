<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'QueikChat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            color: #FFFFFF;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-message {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .auth-links a {
            display: inline-block;
            margin: 10px;
            padding: 12px 28px;
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg, #D53F8C, #6D28D9);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: 0 5px 15px rgba(213, 63, 140, 0.3);
        }

        .auth-links a:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #b83280, #5b21b6);
        }
    </style>
</head>

<body>
    <div class="container">
        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="welcome-message">
            Welcome to the QueikChat website
        </div>
    </div>
</body>

</html>
