<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registro</title>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/view/css/login.css">
    </head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="/view/img/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper center">
                                <img src="/view/img/logo_logistica.png" alt="logo" class="">
                            </div>
                            <p class="login-card-description">Registro</p>
                            <form  method="post"  enctype="multipart/form-data" action="/Registro/procesarRegistro">
                            <div class="form-group">
                                    <label for="nombre" class="sr-only">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="fechaNac" class="sr-only">Fecha de nacimiento</label>
                                    <input type="date" name="fechaNac" id="fechaNac" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                {{#error}}
                                    <div class="alert alert-danger" role="alert">
                                        Datos invalidos.
                                    </div>
                                {{/error}}
                                <input name="registrarse" id="registrarse" class="btn btn-block login-btn mb-4" type="submit" value="Registrarse">
                            </form>

                            <nav class="login-card-footer-nav">
                                <a href="#!">Condiciones de uso.</a>
                                <a href="#!">Política de privacidad</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>