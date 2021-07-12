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

			{{#reporteCargado}}
				<div class="alert alert-primary" role="alert">
					Se cargo su reporte correctamente.
				</div>
			{{/reporteCargado}}
            <div class="row">
                <select class="form-select" aria-label="Default select">
                    <option selected>Seleccione viaje a cual reportar</option>
                    <!-- ko foreach: { data: viajes, as: 'viaje' } -->
                        <option data-bind="attr: {value: viaje.id}, text: formatearDatosViaje(viaje)"></option>
                    <!-- /ko -->
                </select>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div id="mapa" style="width:100%; height:400px;"></div>
                </div>
                <div class="col-lg-6">
                    <h3>Coordenadas actuales:</h3>
                    <h5>Latitud: <span data-bind="text: latitud"></span></h5>
                    <h5>Longitud: <span data-bind="text: longitud"></span></h5>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button data-bind="click: getLocation" type="button" class="btn btn-primary">Actualizar ubicación automaticamente</button>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button data-bind="click: enviarReporte" type="button" class="btn btn-secondary">Enviar reporte</button>
                        </div>
                    </div>
                </div>
            </div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	{{> footer }}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
        <script>
            function AppViewModel() {
                self = this;
                self.latitud = ko.observable(-34.6686986);
                self.longitud = ko.observable(-58.5614947);
                var map;
                var mapOptions;
                var infoWindow;

                self.loadMap = function() {
                    const myLatlng = { lat: self.latitud(), lng: self.longitud() };
                    mapOptions = {
                        center:new google.maps.LatLng(self.latitud(), self.longitud()),
                        zoom:12,
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                    };
                    infoWindow = new google.maps.InfoWindow({
                        content: "click para conseguir lat y long",
                        position: myLatlng,
                    });
                    map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
                    infoWindow.open(map);
                    map.addListener("click", (mapsMouseEvent) => {
                        // Close the current InfoWindow.
                        infoWindow.close();
                        self.latitud(mapsMouseEvent.latLng.lat());
                        self.longitud(mapsMouseEvent.latLng.lng());
                        // Create a new InfoWindow.
                        infoWindow = new google.maps.InfoWindow({
                            position: mapsMouseEvent.latLng,
                        });
                        infoWindow.setContent(
                            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                        );
                        infoWindow.open(map);
                    });
                }

                $(document).ready( function () {
                    self.loadMap();
                });

                self.getLocation = function() {
                    infoWindow.close();
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            self.latitud(position.coords.latitude);
                            self.longitud(position.coords.longitude);
                            map.setCenter(new google.maps.LatLng(self.latitud(), self.longitud()))
                        });
                        infoWindow = new google.maps.InfoWindow({
                            content: "Aqui te encuentras",
                            position: { lat: self.latitud(), lng: self.longitud() },
                        });
                        infoWindow.open(map);
                    } else {
                        console.log("Geolocation is not supported by this browser.");
                    }
                }

                self.showPosition = function (position) {
                    self.latitud(position.coords.latitude);
                    self.longitud(position.coords.longitude);
                }

                // funciones de la pagina con respecto al viaje
                self.viajes = ko.observableArray();

                self.informacionDeViajes = function () {
                    $.ajax({
                        url: '/chofer/informacionViaje',
                        method: 'POST'
                    }).done(function(respuesta) {
                        self.viajes(JSON.parse(respuesta));
                        console.log(JSON.parse(respuesta));
                    })
                }

                self.informacionDeViajes();

                self.formatearDatosViaje = function (data) {
                    return `${data[0]} - ${data[1]} a ${data[2]} - ${data[3]}`;
                }

                self.enviarReporte = function() {
                    var data = {
                        latitud: self.latitud(),
                        longitud: self.longitud()
                    }

                    $.ajax(
                        '/chofer/procesarReporteDiario',
                        data
                    ).done(function(respuesta) {
                        console.log(respuesta);
                    })
                }
            }
            ko.applyBindings(AppViewModel);
        </script>
