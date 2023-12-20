<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #1e1e1e; 
            color: #ff4500; 
        }

        #login {
            margin-top: 5%;
        }

        #login-box {
            background-color: #1e1e1e; 
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
            color: #ff4500; 
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }

        label {
            font-size: 14px;
            color: #ff4500; 
        }

        input {
            margin-bottom: 10px;
        }

        .btn-ingresar {
            background-color: #1e1e1e; 
            border-color: #ff4500;
            color: #ff4500; 
        }

        .btn-ingresar:hover {
            background-color: #ff4500; 
            border-color: #ff4500;
            color: #1e1e1e;
        }

        center {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form action="_functions.php" method="POST">
        <div id="login" class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <h1>Iniciar Sesión</h1>
                        <div class="form-group">
                            <label for="nombre">Usuario:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <input type="hidden" name="accion" value="acceso_user">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-ingresar" value="Ingresar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
