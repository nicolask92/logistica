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
            <h1 class="h3 mb-4 text-gray-800 text-center">Usuario @{{user}}</h1>
            <div class="achicar">
                <form class="" action="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente"
                                placeholder="Legajo">
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="Number" class="form-control" id="cuitCliente" name="cuitCliente" placeholder="DNI">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="domicilioCliente" name="domicilioCliente"
                            placeholder="Fecha de Nacimiento">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="emailCliente" name="emailCliente"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="choferViaje" name="choferViaje">
                            <option selected>Seleccionar Rol</option>
                            <option value="admin">Administrativo</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="chofer">Chofer</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-dark ml-3">Aceptar</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{> footer }}