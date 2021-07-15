{{> header }}
{{> barraLateral }}

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        {{> barraTop }}

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="text-center mb-4">
                <h1> Datos Personales</h1>
            </div>

            <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                    <img  class="img-fluid" src="img/perfil.png">

                </div>

                <div class="col-sm-8">
                {{#usuarioActual}}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                                   id="nombre" readonly value="{{nombre}}">
                        </div>

                        <div class="col-sm-6">
                            <label>Apellido</label>
                            <input type="text" class="form-control" id="apellido"
                                   name="apellido" readonly value="{{apellido}}">

                        </div>
                {{/usuarioActual}}

                    </div>


                </div>

            </div>


        </div>

    </div>



    {{> footer }}