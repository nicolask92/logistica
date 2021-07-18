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
					Su reporte se cargo correctamente.
				</div>
            </div>
            <div data-bind="visible: errorDeCreacionReporte" id="errores" style="display: none">
                <div class="alert alert-danger" role="alert">
                    <ul data-bind="foreach: { data: erroresAMostrar, as: 'error' }">
                        <li data-bind="text: error"></li>
                    </ul>
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
                                        optionsValue: 'id',
                                        optionsCaption: 'Seleccione Viaje'">
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" data-bind="visible: seleccionTipoReporte" style="display: none;">
                    <div class="form-group">
                        <select class="form-control"
                                data-bind="
                                    options: opcionesDeReporte,
                                    value: reporteSeleccionado,
                                    optionsCaption: 'Cargar Reporte o Finalizar Viaje'">
                        </select>
                    </div>
                </div>
            </div>

            <div data-bind="visible: errorSelectores" style="display: none">
                <div class="alert alert-danger" role="alert" data-bind="text: textoSelectores">
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
                        <div class="mb-3">
                            <label for="extras" class="form-label">Extras</label>
                            <input type="text" class="form-control" id="extras" data-bind="value: extras">
                            <div class="invalid-feedback" data-bind="text: errorTextoExtras, visible: errorKm, style: { display: errorExtras() ? 'block' : 'none' }"></div>
                        </div>
                        <div class="mb-3">
                            <label for="viaticos" class="form-label">Viaticos</label>
                            <input type="text" class="form-control" id="viaticos" data-bind="value: viatico">
                            <div class="invalid-feedback" data-bind="text: errorTextoViatico, visible: errorViatico, style: { display: errorViatico() ? 'block' : 'none' }"></div>
                        </div>
                        <div class="mb-3">
                            <label for=peaje" class="form-label">Peaje</label>
                            <input type="text" class="form-control" id="peaje" data-bind="value: peaje">
                            <div class="invalid-feedback" data-bind="text: errorTextoPeaje, visible: errorPeaje, style: { display: errorPeaje() ? 'block' : 'none' }"></div>
                        </div>
                        <div class="mb-3" data-bind="visible: habilitarFee">
                            <label for=fee" class="form-label">Fee</label>
                            <input type="text" class="form-control" id="fee" data-bind="value: fee">
                            <div class="invalid-feedback" data-bind="text: errorTextoFee, visible: errorFee, style: { display: errorFee() ? 'block' : 'none' }"></div>
                        </div>
                        <button data-bind="click: enviarReporte, text: textoBoton" type="button" class="btn btn-secondary btn-sm"></button>
                    </form>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
		<!-- /.container-fluid -->
        </div>
	</div>
	<!-- End of Main Content -->
	{{> footer }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
    <script src='./../view/js/cargarReporte.js'></script>
