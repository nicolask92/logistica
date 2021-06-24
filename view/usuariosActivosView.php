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
                                  <h6 class="m-0 font-weight-bold text-primary">Usuarios Activos</h6>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                          <tr>
                                              <th>Usuario</th>
                                              <th>Email</th>
                                              <th>Contraseña</th>
                                              <th>Operacion</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                            {{# users }}
                                          <tr>
                                            <th>{{usuario}}</th>
                                            <th>{{email}}</th>
                                            <th>{{contraseña}}</th>
                                            <th> <a href="usuariosActivos/editarUsuario/id={{id}}">Editar Usuario</a> <a href="usuariosActivos/eliminarUsuario/id={{id}}">Eliminar Usuario</a></th>
                                          </tr>
                                          {{/ users }}
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                        <div><h3><a href="usuariosActivos/asignarRoles">Ver pendientes >></a></h3></div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

{{> footer }}
