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

            <div class="alert " role="alert">

            </div>
            <div class="achicar">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        {{# uno }}
                        <h6 class="m-0 font-weight-bold text-primary">Usuario: {{usuario}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Contraseña</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th>{{usuario}}</th>
                                    <th>{{email}}</th>
                                    <th>{{contraseña}}</th>

                                </tr>
                                {{/ uno }}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{> footer }}

