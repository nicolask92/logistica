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

            <div class="{{alerta}}" role="alert">
                {{mensaje}}
            </div>

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center">Datos del mantenimiento</h1>

            <div class="achicar">
                <H3>Mecánico</H3>

                <form method="POST" enctype="multipart/form-data" action="mecanico/procesarMantenimiento">
                    <div class="form-group">
                        <select class="form-control" id="datosMecanico" name="datosMecanico">
                            <option selected value="0" >Seleccionar Mecánico</option>
                            {{#datosMecanico}}
                            <option value="{{id}}">{{nombre}} {{apellido}} </option>
                            {{/datosMecanico}}
                        </select>
                    </div>
                    {{#errorDatosMecanico}}<p class="text-danger">Debe Seleccionar un mecanico</p>{{/errorDatosMecanico}}

                    <div>
                        <hr class="sidebar-divider mt-4">
                        <h3>Vehículo</h3>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="seleccionarVehiculo" name="seleccionarVehiculo">
                            <option selected value="0" >Seleccionar Vehículo</option>
                            {{#seleccionarVehiculo}}
                            <option value="{{id}}">{{marca}}-{{modelo}} | {{patente}} </option>
                            {{/seleccionarVehiculo}}
                        </select>
                        {{#errorSeleccionarVehiculo}}<p class="text-danger">Debe Seleccionar un Vehículo</p>{{/errorSeleccionarVehiculo}}
                    </div>

                    <div class="form-group">
                        <label for="select">Service</label>
                        <select id="tipoService" name="tipoService" class="form-control">
                            <option selected value="0" >Seleccionar service</option>
                            <option value="INTERNO">Interno</option>
                            <option value="EXTERNO" selected>Externo</option>
                        </select>
                        {{#errorTipoService}}<p class="text-danger">Debe Seleccionar un tipo de service</p>{{/errorTipoService}}
                    </div>

                    <div class="form-group">
                        <input type="datetime-local" class="form-control" id="fechaService" name="fechaService" value="{{fechaService}}" aria-describedby="fecha">
                        <small id="fechaService" class="text-muted">
                            Fecha de service
                        </small>
                        {{#errorFechaService}}<p class="text-danger">Debe Seleccionar una fecha</p>{{/errorFechaService}}
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="repuestoCambiado" name="repuestoCambiado" value="{{repuestoCambiado}}"   placeholder="Repuesto cambiado">
                        {{#errorRepuestoCambiado}}<p class="text-danger">Debe rellenar este campo</p>{{/errorRepuestoCambiado}}
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" id="costoVehiculo"  name="costoVehiculo" value="{{costoVehiculo}}"   placeholder="Costo">
                        {{#errorCostoVehiculo}}<p class="text-danger">Debe rellenar este campo</p>{{/errorCostoVehiculo}}
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