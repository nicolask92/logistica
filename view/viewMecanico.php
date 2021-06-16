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
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <img src="img/logo_seven.png" class="img-fluid d-md-none d-lg-none d-sm-inline">
                    </div>
                    <div class="sidebar-brand-text mx-3"><img SRC="img/logo_logistica.png" class="img-fluid"></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-center" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <li class="nav-item active">
                    <a class="nav-link text-center" href="viewCargarViaje.php">
                        <span>Mantenimiento</span></a>
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

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Datos del mantenimiento</h1>

                        <div class="achicar"">
                            <H3>Mecánico</H3>

                            <form class="" action="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="nombreMecanico"
                                            id="nombreMecanico" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="apellidoMecanico"
                                            name="apellidoMecanico" placeholder="Apellido">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="Number" class="form-control" id="cuitCliente"
                                        name="cuitCliente"  placeholder="CUIT">
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control" id="telefonoMecanico"
                                        name="telefonoMecanico"    placeholder="Teléfono">
                                </div>

                                <div>
                                    <hr class="sidebar-divider mt-4">
                                    <h3>Auto</h3>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="modeloAuto"
                                        name="ModeloAuto"    placeholder="Modelo">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="patenteAuto"
                                        name="patenteAuto"    placeholder="Patente">
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control" id="fechaService"
                                        name="fechaService" aria-describedby="fecha">
                                    <small id="fechaService" class="text-muted">
                                        Fecha de service
                                    </small>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" id="kmAuto"
                                        name="kmAuto"    placeholder="Kilometros de la unidad">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="serviceInterno"
                                        name="ServiceInterno"    placeholder="Service interno">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="serviceExterno"
                                        name="ServiceExterno"    placeholder="Service externo">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="repuestosCambiados"
                                        name="repuestosCambiados"    placeholder="Repuestos Cambiados">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="costoTotal"
                                        name="costoTotal"    placeholder="Costo total">
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-dark">Enviar</button>
                                </div>
                            </form>
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