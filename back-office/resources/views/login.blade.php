<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #7f1d1d, #fce7e7, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 1.5rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            width: 100%;
            max-width: 420px;
        }

        h2 {
            text-align: center;
            color: #991b1b;
            margin-bottom: 2rem;
            font-size: 1.75rem;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #444;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            font-size: 1rem;
            background-color: #fff;
        }

        button {
            background-color: #991b1b;
        color: white;
        width: 90%;
        padding: 0.75rem;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.2s ease;
        margin: 0 auto; /* Center the button horizontally */
        display: block; /* Ensure the button respects the margin */
            
        }

        button:hover {
            background-color: #7f1d1d;
        }
        .logo-container {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .logo {
        max-width: 100px; /* Adjust the size of the logo */
        height: auto;
    }
    </style>
</head>
<body>

    <!-- filepath: c:\xampp\htdocs\back-office\back-office\resources\views\login.blade.php -->
<div class="login-container">
    <div class="logo-container">
        <img src="Logo2.png" alt="Logo" class="logo">
    </div>
    <h2>🔐 Connexion</h2>

    <!-- Display error messages -->
    @if ($errors->any())
        <div style="color: #991b1b; background-color: #fee2e2; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;">
            <ul style="list-style: none; padding: 0; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Se connecter</button>
    </form>
</div>

</body>
</html>
