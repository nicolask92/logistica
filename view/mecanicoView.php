{{> header }}
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    {{> barraTop }}
					<!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Datos del mantenimiento</h1>

                        <div class="achicar">
                            <H3>Mecánico</H3>

                            <form class="" action="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="legajoMecanico"
                                            id="legajoMecanico" placeholder="Legajo">
                                    </div>
                                </div>    

                                <div>
                                    <hr class="sidebar-divider mt-4">
                                    <h3>Vehículo</h3>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="idVehiculo"
                                        name="idVehiculo"    placeholder="ID">
                                </div>
                                
                                <div class="form-group">
                                <label for="select">Service</label>
                                <select name="select" id="serviceInternoExterno" class="form-control">
                                    <option value="interno">Interno</option>
                                    <option value="externo" selected>Externo</option>
                                </select>    
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control" id="fechaService"
                                        name="fechaService" aria-describedby="fecha">
                                    <small id="fechaService" class="text-muted">
                                        Fecha de service
                                    </small>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="repuestoCambiado"
                                        name="repuestoCambiado"    placeholder="Repuesto cambiado">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="IDvehiculo"
                                        name="IDvehiculo"    placeholder="ID vehículo">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="costoVehiculo"
                                        name="costoVehiculo"    placeholder="Costo">
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

                {{> footer }}