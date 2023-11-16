<?php
session_start();
include('php/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT id_cargo FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = $conexion->query($consulta);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $rol = $fila['id_cargo'];

        if ($rol == 1) {
            header("Location: php/admin.php");
            exit();
        } elseif ($rol == 2) {
            header("Location: php/usuario.php");
            exit();
        }
    } else {
        header("Location: error.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario_registro = $_POST['usuario_registro'];
    $contrasena_registro = $_POST['contrasena_registro'];

    $insertar = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena, id_cargo) VALUES ('$nombre', '$correo', '$usuario_registro', '$contrasena_registro', 2)";
    
    if ($conexion->query($insertar)) {
        header("Location: php/usuario.php");
        exit();
    } else {
        header("Location: error_registro.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>LOGIN</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('images/fonlog.jpg') center/cover no-repeat; 
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px; 
            width: 100%; 
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        .registro-msg {
            color: green;
        }

        .btn-salir {
            margin-top: 10px;
            background-color: #f44336;
        }

        .btn-salir:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>Login</h2>
            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <button type="submit" name="login">Iniciar Sesión</button>

            <a class="btn-salir" href="index.html">Salir</a>
        </form>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>Registro</h2>
            <?php
            if (isset($registro_msg)) {
                echo "<p class='registro-msg'>$registro_msg</p>";
            }
            ?>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" required>

            <label for="usuario_registro">Usuario:</label>
            <input type="text" name="usuario_registro" required>

            <label for="contrasena_registro">Contraseña:</label>
            <input type="password" name="contrasena_registro" required>

            <button type="submit" name="registro">Registrarse</button>
        </form>
    </div>
   



</body>

</html>
