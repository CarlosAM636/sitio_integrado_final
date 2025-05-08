<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $clave = $_POST["clave"];

    $clave_hash = password_hash($clave, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, clave) VALUES ('$nombre', '$email', '$clave_hash')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
    } else {
        $error = "Error al registrar: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #fce4ec, #f8bbd0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color:rgb(224, 81, 138);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color:rgb(238, 76, 135);
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c2185b;
        }

        a {
        display: block;
        text-align: center;
        margin-top: 1rem;
        color:rgb(235, 16, 136);
        text-decoration: none;
        }

        a:hover {
        text-decoration: underline;
        }

        p {
            color: red;
            text-align: center;
        }

        @media (max-width: 480px) {
    .form-container {
        padding: 1.5rem 1rem;
        margin: 0 1rem;
    }

    h2 {
        font-size: 1.5rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    button {
        font-size: 0.95rem;
    }
}
        
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="">
            <h2>Crear cuenta</h2>
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
            <a href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
        </form>
    </div>
</body>
</html>
