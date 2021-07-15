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

                    <img  class="img-fluid" src="/view/img/perfil.png">

                </div>

                <div class="col-sm-8">
                {{#usuarioActual}}
                {{#empleadoActual}}

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



                    </div>

                    <div>
                        <label>DNI</label>
                        <input type="text" class="form-control" id="dni"
                               name="dni" readonly value="{{dni}}">
                    </div>

                    <div>
                        <label>N° Legajo</label>
                        <input type="text" class="form-control" id="legajo"
                               name="legajo" readonly value="{{legajo}}">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="text" class="form-control" id="email"
                               name="email" readonly value="{{email}}">
                    </div>

                    <div>
                        <label>Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fecha_nac"
                               name="fecha_nac" readonly value="{{fecha_nacimiento}}">
                    </div>

                    {{#chofer}}
                    {{#choferActual}}
                    <form>
                        <div>
                            <label>Tipo de Licencia</label>
                            <input type="text" class="form-control" id="licencia"
                                   name="licencia" value="{{tipo_licencia}}">
                        </div>

                        <div>
                            <label>Patente Camion</label>
                            <input type="text" class="form-control" id="patente"
                                   name="patente" value="{{patente}}">
                        </div>
                    </form>
                    {{/choferActual}}
                    {{/chofer}}
                    <div class="text-center mt-3">
                        {{#chofer}}
                        <a href="/home" type="button" class="btn btn-primary">Actualizar</a>
                        {{/chofer}}
                        <a href="/home" type="button" class="btn btn-dark">Volver</a>
                    </div>

                </div>

            </div>

            {{/empleadoActual}}
            {{/usuarioActual}}


        </div>

    </div>



    {{> footer }}