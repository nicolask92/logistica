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
                                <th>Cliente</th>
                                <th>Vehiculo</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Tipo de carga</th>
                                <th>Chofer</th>
                                <th>Estado</th>
                                <th>Partida</th>
                                <th>Arribo</th>
                                <th>Tiempo estimado de viaje</th>
                                <th>Tiempo real</th>
                                <th>Desviacion</th>
                                <th>Km recorridos previstos</th>
                                <th>Km recorridos reales</th>
                                <th>Combustible previsto consumido</th>
                                <th>Combustible real consumido</th>
                                <th>Ubicación</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Vehiculo</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Tipo de carga</th>
                                <th>Chofer</th>
                                <th>Estado</th>
                                <th>Partida</th>
                                <th>Arribo Estimado</th>
                                <th>Tiempo estimado de viaje</th>
                                <th>Tiempo real</th>
                                <th>Desviacion</th>
                                <th>Km recorridos previstos</th>
                                <th>Km recorridos reales</th>
                                <th>Combustible previsto consumido</th>
                                <th>Combustible real consumido</th>
                                <th>Ubicación</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>Cliente 1</td>
                                <td>AB-123-CD</td>
                                <td>Buenos Aires</td>
                                <td>Puerto Alegre</td>
                                <td>Plasticos</td>
                                <td>Juan Carlos Pezzoa</td>
                                <td>En curso</td>
                                <td>12/06/2021 13:00</td>
                                <td>13/06/2021 21:00</td>
                                <td>32hs</td>
                                <td>20hs</td>
                                <td>Sin desviacion</td>
                                <td>800km</td>
                                <td>650km</td>
                                <td>50L</td>
                                <td>20L</td>
                                <td><a href="">Ver mapa</a></td>
                            </tr>
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