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
            <h1 class="h3 mb-4 text-gray-800 text-center">Usuario {{user}}</h1>
            <div class="achicar">
                <form method="post" action="/admin/procesarFormulario" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            LEGAJO:
                            <input type="text" class="form-control" id="legajo" name="legajo" placeholder="{{legajo}}"
                                value={{legajo}}>
                        </div>

                    </div>

                    <div class="form-group">
                        DNI:
                        <input type="Number" class="form-control" id="dni" name="dni" placeholder="{{dni}}"
                            value="{{dni}}">
                    </div>

                    <div class="form-group">
                        FECHA DE NACIMIENTO:
                        <input type="text" class="form-control" id="nacimiento" name="nacimiento" placeholder="{{nac}}"
                            value={{nac}}>
                    </div>

                    <div class="form-group">
                        EMAIL:
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{email}}"
                            value={{email}}>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="rol" name="rol">
                            <option selected>Seleccionar Rol</option>
                            <option value="admin">Administrativo</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="chofer">Chofer</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="/admin">Cancelar</a>
                        <input type="hidden" name="id_usuario" value="{{id}}">
                        <button type="submit" class="btn btn-dark ml-3">Aceptar</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    {{> footer }}