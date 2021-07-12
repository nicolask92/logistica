<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seven Logistic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body id="page-top">

<style>

    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 2px solid #8C8C8C; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
</style>

<div class="datagrid">
    {{#viaje}}
    <table>
        <thead>
            <tr>
                <th width="100">#</th>
                <th width="300">Viaje</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{id}}</td>
        </tr>
        <tr class="alt">
            <td>Origen</td>
            <td>{{origen}}</td>
        </tr>
        <tr>
            <td>Destino</td>
            <td>{{destino}}</td>
        </tr>
        <tr class="alt">
            <td>Fecha de Carga</td>
            <td>{{fecha_carga}}</td>
        </tr>
        <tr>
            <td>Chofer</td>
            <td>{{nombreChofer}} {{apellidoChofer}}</td>
        </tr>
        <tr class="alt">
            <td>Supervisor</td>
            <td>{{nombreSupervisor}} {{apellidoSupervisor}}</td>
        </tr>
        </tbody>
    </table>
    {{/viaje}}
</div>

<br><br>


<div class="datagrid">
    {{#carga}}
    <table>
        <thead>
        <tr>
            <th width="100">#</th>
            <th width="300">Carga</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Tipo</td>
            <td>{{tipo_carga}}</td>
        </tr>
        <tr class="alt">
            <td>Peso Neto</td>
            <td>{{peso_neto}} Kg</td>
        </tr>
        <tr>
            <td>Hazard</td>
            <td>{{hazard}}</td>
        </tr>
        <tr class="alt">
            <td>Imo Class</td>
            <td>{{imo_class}}</td>
        </tr>
        <tr>
            <td>Reefer</td>
            <td>{{reefer}}</td>
        </tr>
        <tr class="alt">
            <td>Temperatura</td>
            <td>{{temperatura}}°C</td>
        </tr>
        </tbody>
    </table>
    {{/carga}}
</div>

<br><br>

<div class="datagrid">
    {{#cliente}}
    <table>
        <thead>
        <tr>
            <th width="100">#</th>
            <th width="300">Cliente</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{nombre}}</td>
        </tr>
        <tr class="alt">
            <td>Apellido</td>
            <td>{{apellido}}</td>
        </tr>
        <tr>
            <td>CUIT</td>
            <td>{{cuit}}</td>
        </tr>
        <tr class="alt">
            <td>Dirección</td>
            <td>{{direccion}}</td>
        </tr>
        <tr>
            <td>Télefono</td>
            <td>{{telefono}}</td>
        </tr>
        <tr class="alt">
            <td>Email</td>
            <td>{{email}}</td>
        </tr>
        </tbody>
    </table>
    {{/cliente}}
</div>

<br><br><br><br>

<div class="datagrid">
    {{#costeo}}
    <table>
        <thead>
        <tr>
            <th width="100">Costeo</th>
            <th width="300">Estimado</th>
            <th width="300">Real</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Kilometros</td>
            <td>{{kilometros_previsto}}</td>
            <td>{{kilometros_real}}</td>
        </tr>
        <tr class="alt">
            <td>Combustible</td>
            <td>{{combustible_previsto}}</td>
            <td>{{combustible_real}}</td>
        </tr>
        <tr>
            <td>ETD</td>
            <td>{{fecha_salida_previsto}}</td>
            <td>{{fecha_salida_real}}</td>
        </tr>
        <tr class="alt">
            <td>ETA</td>
            <td>{{fecha_llegada_previsto}}</td>
            <td>{{fecha_llegada_real}}</td>
        </tr>
        <tr>
            <td>Viaticos</td>
            <td>{{viaticos_previsto}}</td>
            <td>{{viaticos_real}}</td>
        </tr>
        <tr class="alt">
            <td>Peajes</td>
            <td>{{peajes_previsto}}</td>
            <td>{{peajes_real}}</td>
        </tr>
        <tr>
            <td>Pesajes</td>
            <td>{{pesajes_previsto}}</td>
            <td>{{pesajes_real}}</td>
        </tr>
        <tr class="alt">
            <td>Extras</td>
            <td>{{extras_previsto}}</td>
            <td>{{extras_real}}</td>
        </tr>
        <tr>
            <td>Hazard</td>
            <td>Larry</td>
            <td>Larry</td>
        </tr>
        <tr class="alt">
            <td>Reefer</td>
            <td>Larry</td>
            <td>Larry</td>
        </tr>
        <tr>
            <td>Fee</td>
            <td>{{fee_previsto}}</td>
            <td>{{fee_real}}</td>
        </tr>
        <tr class="alt">
            <td>Peajes</td>
            <td>{{peajes_previsto}}</td>
            <td>{{peajes_real}}</td>
        </tr>

        <td>Total</td>
        <td>Larry</td>
        <td>Larry</td>
        </tbody>
    </table>
    {{/costeo}}
</div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Seven Company 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<script type="text/javascript" src="/view/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script type="text/javascript" src="/view/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script type="text/javascript" src="/view/js/sb-admin-2.min.js"></script>

</body>

</html>