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

                </div>
            </div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	{{> footer }}
        <script>
            function loadMap() {

                var mapOptions = {
                    center:new google.maps.LatLng(-34.6686986,-58.5614947),
                    zoom:12,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
            }

            $(document).ready( function () {
                loadMap();
            });

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                x.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude;
            }

        </script>
