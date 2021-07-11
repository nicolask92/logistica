{{> header }}
{{> barraLateral }}
<div id="content-wrapper" class="d-flex flex-column">


    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        {{> barraTop }}
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        Codigo QR para: {{nombreCompleto}}
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <img class="img-fluid" src="{{urlQr}}" alt="qr viaje"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
{{> footer }}
