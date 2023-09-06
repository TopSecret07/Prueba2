<?php
session_start();

$error_message = "";

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Aquí debes agregar la lógica para verificar las credenciales de inicio de sesión.
    // Ejemplo simple: verificar si el usuario es "admin" y la contraseña es "123"
    if ($username === "admin" && $password === "123") {
        // Iniciar sesión y redirigir al usuario a otra página
        $_SESSION["username"] = $username;
        header("Location: registros_administrador.php");
        exit;
    } else {
        $error_message = "Credenciales incorrectas. Inténtalo nuevamente.";
    }
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/login-box.css"> <!-- Agregado el CSS del cuadro de inicio de sesión -->
    <link rel="stylesheet" href="style/inicio.css">
    <title>ADMIN - CEPEIGE</title>

</head>

<body onload="hideErrorMessage()">

    <section class="vh-50">

        <?php include 'comp/menu.php'; ?>
        <div class="container py-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-box">
                        <h2 style="text-align: center; text-decoration:underline;">Iniciar Sesión</h2>
                        <?php if (!empty($error_message)) : ?>
                            <div id="error-message" class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                            <div class="mb-3">
                                <h2 for="username" class=""> <i class="fa-solid fa-user"> </i> Usuario</h2>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
                            </div>
                            <div class="mb-3">
                                <h2 for="password" class="form-label"><i class="fa-solid fa-lock"></i> Contraseña</h2>
                                <input type="password" class="form-control" id="password" name="password" placeholder=" Contraseña" required>
                            </div>
                            <br>
                            <button type="submit" class="buton" style="display: flex;justify-content: center;margin-left: center;margin: auto;">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
    <script src="js/camera.js"></script>
    <script src="js/pagination.js"></script>
</body>

</html>