{{> header }}
{{> barraLateral }}
<div id="content-wrapper" class="d-flex flex-column">


    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        {{> barraTop }}
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            {{#viajeCargado}}
            <div class="alert alert-primary" role="alert">
                Se cargo Viaje Correctamente.
            </div>
            {{/viajeCargado}}

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Viajes en curso</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Origen</th>
                                <th class="text-center">Destino</th>
                                <th class="text-center">Fecha de carga</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Supervisor</th>
                                <th class="text-center">Chofer</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Origen</th>
                                <th class="text-center">Destino</th>
                                <th class="text-center">Fecha de carga</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Supervisor</th>
                                <th class="text-center">Chofer</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            {{#viajes}}
                            <tr>
                                <td>{{id}}</td>
                                <td>{{origen}}</td>
                                <td>{{destino}}</td>
                                <td>{{fecha_carga}}</td>
                                <td>{{estado}}</td>
                                <td>{{nombreSupervisor}} {{apellidoSupervisor}}</td>
                                <td>{{nombreChofer}} {{apellidoChofer}}</td>
                                <td class="text-center">
                                    {{#chofer}}
                                        <a href="/chofer?id={{id}}" type="button" class="btn btn-secondary">QR</a>
                                    {{/chofer}}
                                    {{#supervisor}}

                                        <a href="/detalle?id={{id}}" target=_blank type="button" class="btn btn-primary">Detalle</a>
                                        <a href="/detalle/PDF?id={{id}}" target=_blank type="button" class="btn btn-primary">PDF</a>
                                    {{/supervisor}}
                                    {{#admin}}
                                        <a href="/detalle?id={{id}}" target=_blank type="button" class="btn btn-primary">Detalle</a>
                                        <a href="/detalle/PDF?id={{id}}" target=_blank type="button" class="btn btn-primary">PDF</a>
                                    {{/admin}}
                                </td>
                            </tr>
                            {{/viajes}}
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mantenimiento</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Costo</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Repuesto cambiado</th>
                                <th class="text-center">Camion</th>
                                <th class="text-center">Mecanico</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Costo</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Repuesto cambiado</th>
                                <th class="text-center">Camion</th>
                                <th class="text-center">Mecanico</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            {{#mantenimiento}}
                            <tr class="text-center">
                                <td>{{id}}</td>
                                <td>{{fecha}}</td>
                                <td>{{costo}}</td>
                                <td>{{tipo}}</td>
                                <td>{{repuesto_cam}}</td>
                                <td>{{id_camion}</td>
                                <td>{{id_mecanico}}</td>
                            </tr>
                            {{/mantenimiento}}
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
{{> footer }}
