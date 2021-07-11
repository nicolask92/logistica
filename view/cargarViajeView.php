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


            {{#cargado}}
            <div class="alert alert-primary" role="alert">
                Se cargo Viaje.
            </div>
            {{/cargado}}



            <div class="achicar">
                <H3>Cliente</H3>

                <form method="post" id="viaje" enctype="multipart/form-data" action="cargarViaje/procesarCargaViaje">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control" name="nombreCliente"
                                   id="nombreCliente" placeholder="Nombre" value="{{nombreCliente}}">

                            {{#errorNombreCliente}}<p class="text-danger">Ingresar nombre</p>{{/errorNombreCliente}}
                        </div>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="apellidoCliente"
                                   name="apellidoCliente" placeholder="Apellido" value="{{apellidoCliente}}">

                            {{#errorApellidoCliente}}<p class="text-danger">Ingresar apellido</p>{{/errorApellidoCliente}}
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="Number" class="form-control" id="cuitCliente"
                               name="cuitCliente"  placeholder="CUIT" value="{{cuitCliente}}">
                    </div>

                    {{#errorCuitCliente}}<p class="text-danger">Ingresar CUIT</p>{{/errorCuitCliente}}

                    <div class="form-group">
                        <input type="text" class="form-control" id="domicilioCliente"
                               name="domicilioCliente"    placeholder="Domicilio" value="{{domicilioCliente}}">
                    </div>

                    {{#errorDomicilioCliente}}<p class="text-danger">Ingresar Domicilio</p>{{/errorDomicilioCliente}}

                    <div class="form-group">
                        <input type="tel" class="form-control" id="telefonoCliente"
                               name="telefonoCliente"    placeholder="Teléfono" value="{{telCliente}}">
                    </div>

                    {{#errorTelCliente}}<p class="text-danger">Ingresar Teléfono</p>{{/errorTelCliente}}


                    <div class="form-group">
                        <input type="email" class="form-control" id="emailCliente"
                               name="emailCliente"    placeholder="Email" value="{{emailCliente}}">
                    </div>
                    {{#errorEmailCliente}}<p class="text-danger">Ingresar Email</p>{{/errorEmailCliente}}


                    <div>
                        <hr class="sidebar-divider mt-4">
                        <h3>Viaje</h3>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="origenViaje"
                               name="origenViaje"    placeholder="Dirección origen" value="{{origen}}">
                    </div>

                    {{#errorOrigen}}<p class="text-danger">Ingresar Dirección de origen</p>{{/errorOrigen}}

                    <div class="form-group">
                        <input type="text" class="form-control" id="destinoViaje"
                               name="destinoViaje"    placeholder="Dirección destino" value="{{destino}}">
                    </div>

                    {{#errorDestino}}<p class="text-danger">Ingresar Dirección de destino</p>{{/errorDestino}}


                    <div class="form-group">
                        <input type="datetime-local" class="form-control" id="fechaCarga"
                               name="fechaCarga" aria-describedby="fecha" value="{{fechaCarga}}">
                        <small id="fecha" class="text-muted">
                            Fecha de carga.
                        </small>
                    </div>

                    {{#errorFechaCarga}}<p class="text-danger">Ingresar fecha de carga</p>{{/errorFechaCarga}}


                    <div class="form-group">
                        <input type="datetime-local" class="form-control" id="eta"
                               name="eta" aria-describedby="eta" value="{{eta}}">
                        <small id="eta" class="text-muted">
                            Fecha estimada de llegada.
                        </small>
                    </div>
                    {{#errorETA}}<p class="text-danger">Ingresar fecha estimada de llegada</p>{{/errorETA}}


                    <div class="form-group">
                        <input type="datetime-local" class="form-control" id="etd"
                               name="etd" aria-describedby="etd" value="{{etd}}">
                        <small id="etd" class="text-muted">
                            Fecha estimada de salida.
                        </small>
                    </div>
                    {{#errorETD}}<p class="text-danger">Ingresar fecha estimada de salida</p>{{/errorETD}}

                    <div class="form-group">
                        <input type="number" class="form-control" id="kmPrevisto"
                               name="kmPrevisto"    placeholder="Kilometros previstos" value="{{kmPrevisto}}">
                    </div>
                    {{#errorKmPrevisto}}<p class="text-danger">Ingresar Kilometros previstos</p>{{/errorKmPrevisto}}

                    <div class="form-group">
                        <input type="number" class="form-control" id="combustiblePrevisto"
                               name="combustiblePrevisto"    placeholder="Cumbustible previsto Lts" value={{combustiblePrevisto}}>
                    </div>
                    {{#errorCombustiblePrevisto}}<p class="text-danger">Ingresar combustible previsto</p>{{/errorCombustiblePrevisto}}

                    <div class="form-group">
                        <input type="number" class="form-control" id="viaticosPrevisto"
                               name="viaticosPrevisto"    placeholder="Viáticos Previstos" value={{viaticosPrevisto}}>
                    </div>
                    {{#errorViaticosPrevisto}}<p class="text-danger">Ingresar viaticos previstos</p>{{/errorViaticosPrevisto}}

                    <div>

                        <div class="form-group">
                            <input type="number" class="form-control" id="peajesPrevisto"
                                   name="peajesPrevisto"    placeholder="Peajes Previstos" value={{peajesPrevisto}}>
                        </div>
                        {{#errorPeajesPrevisto}}<p class="text-danger">Ingresar peajes previstos</p>{{/errorPeajesPrevisto}}

                        <div class="form-group">
                            <input type="number" class="form-control" id="pesajesPrevisto"
                                   name="pesajesPrevisto"    placeholder="Pesajes Previstos" value={{pesajesPrevisto}}>
                        </div>
                        {{#errorPesajesPrevisto}}<p class="text-danger">Ingresar pesajes previstos</p>{{/errorPesajesPrevisto}}

                        <div class="form-group">
                            <input type="number" class="form-control" id="extrasPrevisto"
                                   name="extrasPrevisto"    placeholder="Extras Previstos" value={{extrasPrevisto}}>
                        </div>
                        {{#errorExtrasPrevisto}}<p class="text-danger">Ingresar extras previstos</p>{{/errorExtrasPrevisto}}

                        <div class="form-group">
                            <input type="number" class="form-control" id="feePrevisto"
                                   name="feePrevisto"    placeholder="Fee Previsto" value={{feePrevisto}}>
                        </div>
                        {{#errorFeePrevisto}}<p class="text-danger">Ingresar fee previstos</p>{{/errorFeePrevisto}}


                        <div>

                            <hr class="sidebar-divider mt-4">
                            <h3>Supervisor</h3>
                        </div>

                        <div class="form-group">

                            <select class="form-control" id="supervisorViaje" name="supervisorViaje">

                                <option selected value="0" >Seleccionar Supervisor</option>
                                {{#supervisores}}
                                <option value="{{id}}">{{nombre}} {{apellido}} </option>
                                {{/supervisores}}
                            </select>

                        </div>

                        {{#errorIdSupervisor}}<p class="text-danger">Debe Seleccionar un supervisor</p>{{/errorIdSupervisor}}


                        <div>

                            <div>
                                <hr class="sidebar-divider mt-4">
                                <h3>Camión</h3>
                            </div>

                            <div class="form-group">

                                <select class="form-control" id="camionViaje" name="camionViaje">

                                    <option selected value="0" >Seleccionar Camión</option>
                                    {{#camiones}}
                                    <option value="{{id}}">{{marca}}-{{modelo}} </option>
                                    {{/camiones}}
                                </select>
                                {{#errorIdCamion}}<p class="text-danger">Debe Seleccionar un Camión</p>{{/errorIdCamion}}


                            </div>

                            <div>
                                <hr class="sidebar-divider mt-4">
                                <h3>Carga</h3>
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="arrastradorViaje" name="arrastradorViaje">
                                    <option selected value="0" >Seleccionar Arrastrador</option>
                                    {{#arrastradores}}
                                    <option value="{{id}}">{{tipo}}-{{patente}}</option>
                                    {{/arrastradores}}
                                </select>
                                {{#errorIdArrastrador}}<p class="text-danger">Debe Seleccionar un Arrastrador</p>{{/errorIdArrastrador}}

                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="pesoCarga"
                                       name="pesoCarga"    placeholder="Peso neto de la carga" value={{pesoCarga}}>
                            </div>
                            {{#errorPesoCarga}}<p class="text-danger">Ingresar peso neto</p>{{/errorPesoCarga}}

                            <div class="form-group">
                                <label for="hazardCarga">Hazard</label> <br>
                                <input  type="radio" name="hazardCarga" id="hazardCarga" value="1"> Si

                                <input  type="radio" name="hazardCarga" id="hazardCarga" value="0"> No

                            </div>
                            {{#errorHazardCarga}}<p class="text-danger">Debe Seleccionar Hazard</p>{{/errorHazardCarga}}

                            <div class="form-group">
                                <select class="form-control" id="imoCarga" name="imoCarga">
                                    <option value="" selected >Seleccionar IMO Class</option>
                                    <option value="Class 1">Class 1</option>
                                    <option value="Class 2">Class 2</option>
                                    <option value="Class">Class 3</option>
                                    <option value="Class 4.1">Class 4.1</option>
                                    <option value="Class 4.2">Class 4.2</option>
                                    <option value="Class 4.3">Class 4.3</option>
                                    <option value="Class 5.1">Class 5.1</option>
                                    <option value="Class 5.2">Class 5.2</option>
                                    <option value="Class 6.1">Class 6.1</option>
                                    <option value="Class 6.2">Class 6.2</option>
                                    <option value="Class 7">Class 7</option>
                                    <option value="Class 8">Class 8</option>
                                    <option value="Class 9">Class 9</option>
                                </select>
                            </div>
                            {{#errorImoCarga}}<p class="text-danger">Debe Seleccionar Imo Class</p>{{/errorImoCarga}}

                            <div class="form-group">

                                <label for="reeferCarga">Reefer</label> <br>
                                <input  type="radio" name="reeferCarga" id="reeferCarga" value="1"> Si

                                <input  type="radio" name="reeferCarga" id="reeferCarga" value="0"> No

                            </div>
                            {{#errorReeferCarga}}<p class="text-danger">Debe Seleccionar Reefer</p>{{/errorReeferCarga}}


                            <div class="form-group">
                                <input type="number" class="form-control" id="temperaturaCarga"
                                       name="temperaturaCarga"    placeholder="Temperatura de la carga" value={{temperaturaCarga}}>
                            </div>
                            {{#errorTemperaturaCarga}}<p class="text-danger">Ingresar temperatura</p>{{/errorTemperaturaCarga}}

                            <div>
                                <hr class="sidebar-divider mt-4">
                                <h3>Chofer</h3>
                            </div>

                            <div class="form-group">

                                <select class="form-control" id="choferViaje" name="choferViaje">

                                    <option selected value="0" >Seleccionar Chofer</option>
                                    {{#choferes}}
                                    <option value="{{id}}">{{nombre}} {{apellido}}</option>
                                    {{/choferes}}
                                </select>
                                {{#errorIdChofer}}<p class="text-danger">Debe Seleccionar un Chofer</p>{{/errorIdChofer}}

                            </div>

                            <div class="form-group">
                                <hr class="sidebar-divider mt-4">
                            </div>


                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-dark" id="cargar">Cargar Viaje</button>
                            </div>

                </form>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{> footer }}