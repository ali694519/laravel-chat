<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

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
      background-color: #000000;
      color: #FFFFFF;
      /* نص أبيض ليكون مقروءاً على الخلفية السوداء */
    }

    .container {
      text-align: center;
    }

    .welcome-message {
      font-size: 2rem;
      font-weight: bold;
      color: #FFFFFF;
      /* لون النص الأبيض */
      margin-bottom: 20px;
    }

    .auth-links a {
      display: inline-block;
      margin: 10px;
      padding: 10px 20px;
      text-decoration: none;
      color: white;
      background-color: #D53F8C;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .auth-links a:hover {
      background-color: #b83280;
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
