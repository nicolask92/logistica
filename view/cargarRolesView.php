{{> header }}

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
                        <h1 class="h3 mb-4 text-gray-800 text-center">Asignacion de Roles.</h1>
                        <div class="alert {{tipo}}" role="alert">
                              {{mensaje}}
                        </div>
                        <div class="achicar">
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">

                              <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Pendientes</h6>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                          <tr>
                                              <th>Usuario</th>
                                              <th>Legajo</th>
                                              <th>DNI</th>
                                              <th>Mail</th>
                                              <th>Asinacion de Rol</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                            <th>@cachito</th>
                                            <th>1234</th>
                                            <th>32492384</th>
                                            <th>cachito@g7.com</th>
                                            <th> <a href="">Asignar Rol</a> </th>
                                          </tr>
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
