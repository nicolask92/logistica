{{> header }}
{{> barraLateral }}
<div id="content-wrapper" class="d-flex flex-column">


	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		{{> barraTop }}
		<!-- End of Topbar -->

		<!-- Begin Page Content -->
		<div class="container-fluid">

			<div data-bind="visible: reporteCargado" style="display: none">
				<div class="alert alert-primary" role="alert">
					Se reporte se cargo correctamente.
				</div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <div class="form-group">
                            <select class="form-control"
                                    data-bind="
                                        options: viajes,
                                        value: viajeSeleccionado,
                                        optionsText: 'descripcionCompleta',
                                        optionsValue: 'estado',
                                        optionsCaption: 'Seleccione Viaje'">
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div data-bind="visible: errorEstado" style="display: none">
                <div class="alert alert-danger" role="alert">
                    El Estado del viaje seleccionado es <span data-bind="text: viajeSeleccionado"></span> y no se puede editar.
                </div>
            </div>

            <div class="row" data-bind="visible: habilitadoCargaDatos" style="display: none">
                <div class="col-lg-4">
                    <div id="mapa" style="width:100%; height:400px;"></div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-1">
                        <label class="form-label">Coordenadas actuales:</label>
                        <h6>Latitud: <span data-bind="text: latitud"></span></h6>
                        <h6>Longitud: <span data-bind="text: longitud"></span></h6>
                    </div>
                    <button data-bind="click: getLocation" type="button" class="btn btn-primary btn-sm">Actualizar ubicación automaticamente</button>
                </div>
                <div class="col-lg-4">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Combustible Cargado</label>
                            <input type="text" class="form-control" id="cantidad" data-bind="value: litros">
                            <div class="invalid-feedback" data-bind="text: errorTextoCantidad, visible: errorLitros, style: { display: errorLitros() ? 'block' : 'none' }"></div>
                        </div>
                        <div class="mb-3">
                            <label for="importe" class="form-label">Importe</label>
                            <input type="text" class="form-control" id="importe" data-bind="value: importe">
                            <div class="invalid-feedback" data-bind="text: errorTextoImporte, visible: errorImporte, style: { display: errorImporte() ? 'block' : 'none' }"></div>
                        </div>
                        <div class="mb-3">
                            <label for="km" class="form-label">Kilometro unidad</label>
                            <input type="text" class="form-control" id="km" data-bind="value: km">
                            <div class="invalid-feedback" data-bind="text: errorTextoKm, visible: errorKm, style: { display: errorKm() ? 'block' : 'none' }"></div>
                        </div>
                        <button data-bind="click: enviarReporte" type="button" class="btn btn-secondary btn-sm">Enviar reporte</button>
                    </form>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	{{> footer }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
    <script src='./../view/js/cargarReporte.js'></script>
