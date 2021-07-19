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
                            <form  method="post"  enctype="multipart/form-data" action="/registro/procesarRegistro">
                                <div class="form-group">
                                    <label for="nombre" class="sr-only">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" value="{{nombre}}" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellido" class="sr-only">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" value="{{apellido}}" class="form-control" placeholder="Apellido">
                                </div>
                                
                                <div class="form-group">
                                    <label for="dni" class="sr-only">DNI</label>
                                    <input type="number" name="dni" id="dni" value="{{dni}}" class="form-control" placeholder="DNI">
                                </div>

                                <div class="form-group date">
                                    <input type="date" class="form-control" id="fechaNac"
                                            name="fechaNac" aria-describedby="fecha" value="{{fechaNac}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" value="{{email}}" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                {{#error}}
                                    <div class="alert alert-danger" role="alert">
                                        Hay errores:
                                        <ul>
                                            {{#errorNombre}}<li>Nombre invalido</li>{{/errorNombre}}
                                            {{#errorApellido}}<li>Apellido invalido</li>{{/errorApellido}}
                                            {{#errorDni}}<li>DNI invalido</li>{{/errorDni}}
                                            {{#errorEmail}}<li>Email invalido</li>{{/errorEmail}}
                                            {{#errorFechaNac}}<li>Fecha invalida</li>{{/errorFechaNac}}
                                            {{#errorContrasenia}}<li>Constraseña invalida</li>{{/errorContrasenia}}
                                        </ul>
                                    </div>
                                {{/error}}
                                <input name="registrarse" id="registrarse" class="btn btn-block login-btn mb-4" type="submit" value="Registrarse">
                            </form>

                            <p class="login-card-footer-text">¿Tienes una cuenta? <a href="/login" class="text-reset">INICIAR SESIÓN</a></p>

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
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script type="text/javascript">
        $(function () {
            $('.datepicker').datepicker();
        });
    </script>
    </body>
</html>