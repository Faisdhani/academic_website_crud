<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset CSS */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8; /* Background abu-abu terang */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .background {
            position: absolute;
            width: 400px;
            height: 500px;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#23a2f6, #1845ad);
            left: -70px;
            top: -70px;
        }

        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -70px;
            bottom: -70px;
        }

        .login-container {
            width: 360px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
        }

        .login-container h2 {
            font-size: 32px;
            color: #1845ad;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            text-align: left;
            font-size: 16px;
            color: #333;
            margin-top: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.6);
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .login-container button {
            background-color: #1845ad;
            color: #fff;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #23a2f6;
        }

        .login-container p {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .login-container a {
            color: #1845ad;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login_06959_fais.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password" required>

            <button type="submit" name="login">Login</button>

            <p>Belum punya akun? <a href="signup_06959_fais.php">Daftar disini</a></p>
        </form>
    </div>
</body>
</html>
