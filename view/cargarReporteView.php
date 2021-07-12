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
                <div class="col-md-6">
                    <div id="mapa" style="width:500px; height:400px;"></div>

                </div>
                <div class="col-md-6">
                    <h3>Coordenadas actuales:</h3>
                    <h5>Latitud: <span data-bind="text: latitud"></span></h5>
                    <h5>Longitud: <span data-bind="text: longitud"></span></h5>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <button data-bind="click: getLocation" type="button" class="btn btn-primary">Actualizar coordenadas</button>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <button data-bind="click: getLocation" type="button" class="btn btn-primary">Actualizar ubicación automaticamente</button>
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

                self.loadMap = function() {
                    var mapOptions = {
                        center:new google.maps.LatLng(self.latitud(), self.longitud()),
                        zoom:12,
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
                }

                $(document).ready( function () {
                    self.loadMap();
                });

                self.getLocation = function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }

                self.showPosition = function (position) {
                    self.latitud(position.coords.latitude);
                    self.longitud(position.coords.longitude);
                }
            }
            ko.applyBindings(AppViewModel);
        </script>
