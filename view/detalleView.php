{{> header }}
{{> barraLateral }}

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        {{> barraTop }}

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    {{#viaje}}
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Viaje</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Origen</th>
                            <td>{{origen}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Destino</th>
                            <td>{{destino}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fecha carga</th>
                            <td>{{fecha_carga}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Chofer</th>
                            <td>{{nombreChofer}} {{apellidoChofer}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Supervisor</th>
                            <td>{{nombreSupervisor}} {{apellidoSupervisor}}</td>
                        </tr>
                        </tbody>
                    </table>
                    {{/viaje}}
                </div>

                <div class="col-sm-6">
                    {{#carga}}
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Carga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Tipo</th>
                            <td>{{tipo_carga}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Peso Neto</th>
                            <td>{{peso_neto}} Kg</td>
                        </tr>
                        <tr>
                            <th scope="row">Hazard</th>
                            <td>{{hazard}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Imo Class</th>
                            <td>{{imo_class}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Reefer</th>
                            <td>{{reefer}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Temperatura</th>
                            <td>{{temperatura}}°C</td>
                        </tr>
                        </tbody>
                    </table>
                    {{/carga}}

                </div>

            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    {{#cliente}}
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Nombre</th>
                            <td>{{nombre}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Apellido</th>
                            <td>{{apellido}}</td>
                        </tr>
                        <tr>
                            <th scope="row">CUIT</th>
                            <td>{{cuit}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Dirección</th>
                            <td>{{direccion}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Télefono</th>
                            <td>{{telefono}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{email}}</td>
                        </tr>
                        </tbody>
                    </table>
                    {{/cliente}}

                </div>

                <div class="col-sm-6">
                    {{#costeo}}
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Costeo</th>
                            <th scope="col">Estimado</th>
                            <th scope="col">Real</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Kilometros</th>
                            <td>{{kilometros_previsto}}</td>
                            <td>{{kilometros_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Combustible</th>
                            <td>{{combustible_previsto}}</td>
                            <td>{{combustible_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">ETD</th>
                            <td>{{fecha_salida_previsto}}</td>
                            <td>{{fecha_salida_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">ETA</th>
                            <td>{{fecha_llegada_previsto}}</td>
                            <td>{{fecha_llegada_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Viaticos</th>
                            <td>{{viaticos_previsto}}</td>
                            <td>{{viaticos_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Peajes</th>
                            <td>{{peajes_previsto}}</td>
                            <td>{{peajes_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pesajes</th>
                            <td>{{pesajes_previsto}}</td>
                            <td>{{pesajes_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Extras</th>
                            <td>{{extras_previsto}}</td>
                            <td>{{extras_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Hazard</th>
                            <td>Larry</td>
                            <td>Larry</td>
                        </tr>
                        <tr>
                            <th scope="row">Reefer</th>
                            <td>Larry</td>
                            <td>Larry</td>
                        </tr>
                        <tr>
                            <th scope="row">Fee</th>
                            <td>{{fee_previsto}}</td>
                            <td>{{fee_real}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td>Larry</td>
                            <td>Larry</td>
                        </tr>
                        </tbody>
                    </table>
                    {{/costeo}}
                </div>

            </div>


        </div>
    </div>

    {{> footer }}