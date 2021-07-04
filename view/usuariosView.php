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
            <div class="achicar">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">Activos</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Legajo</th>
                                        <th>DNI</th>
                                        <th>ROL</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{# users }}

                                    <tr>
                                        <th>{{usuario}}</th>
                                        <th>{{email}}</th>
                                        <th>{{legajo}}</th>
                                        <th>{{dni}}</th>
                                        <th>{{rol}}</th>
                                        <th> <a class="btn btn-primary" href="usuarios/editarUsuario/id={{id}}">Editar</a>
                                            <a class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{usuario}}Modal" href="">Borrar</a>
                                        </th>
                                    </tr>

                                    {{/ users }}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary">Pendientes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Contraseña</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <th>usuario</th>
                                    <th>email</th>
                                    <th>legajo</th>
                                    <th>dni</th>
                                    <th>
                                        <form action="admin/procesarFormulario" method="post" enctype="multipart/form-data">
                                            <select class="btn btn-primary" name="tipoRol">
                                                <option selected>Asignar Rol...</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Supervisor</option>
                                                <option value="3">Mecanico</option>
                                                <option value="4">Chofer</option>
                                            </select>
                                            <input  type="submit"  name="btn-aceptar" class="btn btn-success" value="Aceptar"></input>
                                            <input  type="submit"  name="btn-rechazar" class="btn btn-danger" value="Rechazar"></input>
                                        </form>
                                    </th>
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