<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
			require_once('common/_header.php')
		?>
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
				<?php
					require_once("common/_barraLateral.php");
				?>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
						<?php
							require_once("common/_barraTop.php");
						?>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800 text-center">Cargar nuevo viaje.</h1>

						<div class="achicar"">
							<H3>Cliente</H3>

							<form class="" action="">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control" name="nombreCliente"
											id="nombreCliente" placeholder="Nombre">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="apellidoCliente"
											name="apellidoCliente" placeholder="Apellido">
									</div>
								</div>

								<div class="form-group">
									<input type="Number" class="form-control" id="cuitCliente"
										name="cuitCliente"  placeholder="CUIT">
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="domicilioCliente"
										name="domicilioCliente"    placeholder="Domicilio">
								</div>

								<div class="form-group">
									<input type="tel" class="form-control" id="telefonoCliente"
										name="telefonoCliente"    placeholder="Teléfono">
								</div>

								<div class="form-group">
									<input type="email" class="form-control" id="emailCliente"
										name="emailCliente"    placeholder="Email">
								</div>


								<div>
									<hr class="sidebar-divider mt-4">
									<h3>Viaje</h3>
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="origenViaje"
										name="origenViaje"    placeholder="Dirección oringen">
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="destinoViaje"
										name="destinoViaje"    placeholder="Dirección destino">
								</div>

								<div class="form-group">
									<input type="date" class="form-control" id="fechaViaje"
										name="fechaViaje" aria-describedby="fecha">
									<small id="fecha" class="text-muted">
										Fecha de carga.
									</small>
								</div>

								<div class="form-group">
									<input type="date" class="form-control" id="etaViaje"
										name="etaViaje" aria-describedby="eta">
									<small id="eta" class="text-muted">
										Fecha estimada de llegada.
									</small>
								</div>

								<div class="form-group">
									<input type="number" class="form-control" id="kmPrevistosViaje"
										name="kmPrevistosViaje"    placeholder="Kilometros previstos">
								</div>

								<div class="form-group">
									<input type="number" class="form-control" id="combustiblePrevistoViaje"
										name="combustiblePrevistoViaje"    placeholder="Cumbustible previsto Lts">
								</div>
							</form>

						</div>

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<?php
					require_once('common/_footer.php')
				?>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.php">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

	</body>

</html>