<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        require_once('common/_header.php')
        ?>
    </head>

    <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo_seven.png" class="img-fluid d-md-none d-lg-none d-sm-inline">
                </div>
                <div class="sidebar-brand-text mx-3"><img SRC="img/logo_logistica.png" class="img-fluid"></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-center" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-center" href="viewCargarViaje.php">
                    <span>Cargar Viaje</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php
                    require_once("common/barraTop.mustache");
                ?>
                <!-- End of Topbar -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Bienvenido @nombre.</h1>
                    <div class="container">
                        <div class="item  accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Cargar Combustible
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form class="" action="">
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-1">
                                                    <input type="text" class="form-control" name="ubicacion_carga" id="ubicacionCarga"
                                                           placeholder="Introduzca la URL de su ubicacion aqui">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-1">
                                                    <input type="text" class="form-control" name="litros" id="Litros"
                                                           placeholder="Cantidad en Litros">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-1">
                                                    <input type="text" class="form-control" name="importe_pago" id="importe"
                                                           placeholder="Importe">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-1">
                                                    <input type="text" class="form-control" name="km_unidad" id="kmUnidad"
                                                           placeholder="Kilometros de la Unidad">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit" class="form-control btn-success" id="apellidoCliente"
                                                       name="btn" placeholder="Apellido">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item  accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Enviar Ubicacion
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form class="" action="">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" class="form-control" name="url-maps" id="urlMaps"
                                                           placeholder="Intruduzca la URL aqui">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="submit" class="form-control btn-success" id="apellidoCliente"
                                                           name="btn" placeholder="Apellido">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                <?php
                require_once('common/_footer.php')
                ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Logout Modal-->
        <?php
        require_once('common/modalSalir.mustache')
        ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>
</html>