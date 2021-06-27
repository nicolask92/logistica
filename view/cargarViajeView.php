{{> header }}
{{> barraLateral }}
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
                <h1 class="h3 mb-4 text-gray-800 text-center">Cargar nuevo viaje.</h1>

                <div class="achicar">
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
                               name="origenViaje"    placeholder="Dirección origen">
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


                    <div>
                        <hr class="sidebar-divider mt-4">
                        <h3>Carga</h3>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="tipoCarga" name="tipoCarga">
                            <option selected >Seleccionar tipo de carga</option>
                            <option value="araña">Araña</option>
                            <option value="jaula">Jaula</option>
                            <option value="tanque">Tanque</option>
                            <option value="granel">Granel</option>
                            <option value="carcarrier">CarCarrier</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" id="pesoCarga"
                               name="pesoCarga"    placeholder="Peso neto de la carga">
                    </div>

                    <div class="form-group">
                        <label for="hazardCarga">Hazard</label> <br>
                        <input  type="radio" name="hazardCarga" id="si"> Si

                        <input  type="radio" name="hazardCarga" id="no"> No

                    </div>

                    <div class="form-group">
                        <select class="form-control" id="imoCarga" name="imoCarga">
                            <option selected >Seleccionar IMO Class</option>
                            <option value="1">Class 1</option>
                            <option value="2">Class 2</option>
                            <option value="3">Class 3</option>
                            <option value="41">Class 4.1</option>
                            <option value="42">Class 4.2</option>
                            <option value="43">Class 4.3</option>
                            <option value="51">Class 5.1</option>
                            <option value="52">Class 5.2</option>
                            <option value="61">Class 6.1</option>
                            <option value="62">Class 6.2</option>
                            <option value="7">Class 7</option>
                            <option value="8">Class 8</option>
                            <option value="9">Class 9</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="reeferCarga">Reefer</label> <br>
                        <input  type="radio" name="reeferCarga" id="si"> Si

                        <input  type="radio" name="reeferCarga" id="no"> No

                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" id="temperaturaCarga"
                               name="temperaturaCarga"    placeholder="Temperatura de la carga">
                    </div>

                    <div>
                        <hr class="sidebar-divider mt-4">
                        <h3>Chofer</h3>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="choferViaje" name="choferViaje">
                            <option selected >Seleccionar Chofer</option>
                            <option value="1">chofer 1</option>
                            <option value="2">chofer 2</option>
                            <option value="3">chofer 3</option>
                            <option value="4">chofer 4</option>
                            <option value="5">chofer 5</option>
                            <option value="6">chofer 6</option>
                            <option value="7">chofer 7</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <hr class="sidebar-divider mt-4">
                    </div>


                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark">Cargar Viaje</button>
                    </div>



                </form>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        {{> footer }}