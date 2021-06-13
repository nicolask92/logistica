<?php include_once('header.php') ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Cargar nuevo viaje.</h1>

                    <div class="achicar"">
                        <H3>Cliente</H3>

                        <form class="" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" name="nombreCliente"
                                           id="nombreCliente" placeholder="Nombre">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="apellidoCliente"
                                           name="apellidoCliente" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="Number" class="form-control" id="cuitCliente"
                                       name="cuitCliente"  placeholder="CUIT">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="domicilioCliente"
                                       name="domicilioCliente"    placeholder="Domicilio">
                            </div>

                            <div class="form-group">
                                <input type="tel" class="form-control" id="telefonoCliente"
                                       name="telefonoCliente"    placeholder="Teléfono">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="emailCliente"
                                       name="emailCliente"    placeholder="Email">
                            </div>


                            <div>
                                <hr class="sidebar-divider mt-4">
                                <h3>Viaje</h3>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="origenViaje"
                                       name="origenViaje"    placeholder="Dirección oringen">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="destinoViaje"
                                       name="destinoViaje"    placeholder="Dirección destino">
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control" id="fechaViaje"
                                       name="fechaViaje" aria-describedby="fecha">
                                <small id="fecha" class="text-muted">
                                    Fecha de carga.
                                </small>
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control" id="etaViaje"
                                       name="etaViaje" aria-describedby="eta">
                                <small id="eta" class="text-muted">
                                    Fecha estimada de llegada.
                                </small>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="kmPrevistosViaje"
                                       name="kmPrevistosViaje"    placeholder="Kilometros previstos">
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="combustiblePrevistoViaje"
                                       name="combustiblePrevistoViaje"    placeholder="Cumbustible previsto Lts">
                            </div>


                        </form>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include_once('footer.php') ?>