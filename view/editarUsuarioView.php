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
            {{# user}}
            
            <h1 class="h3 mb-4 text-gray-800 text-center">Usuario {{usuario}}</h1>
            <div class="achicar">
                <form method="post" action="/usuarios/procesarFormulario" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="nacimiento" name="nacimiento" placeholder="{{fecha_nacimiento}}"
                            value={{fecha_nacimiento}}>
                    </div>

                    <div class="form-group">
                        EMAIL:
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{email}}"
                            value={{email}}>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="rol" name="rol">
                            <option selected>Rol actual: {{rol}}</option>
                            <option value="1">Administrativo</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Mecanico</option>
                            <option value="4">Chofer</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="/usuarios">Cancelar</a>
                        <input type="hidden" name="id_usuario" value="{{usuario_id}}">
                        <button type="submit" class="btn btn-dark ml-3">Aceptar</button>
                    </div>
                </form>
            </div>
            {{/ user}}
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    {{> footer }}