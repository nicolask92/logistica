<?php include_once('header.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Bienvenido @nombre.</h1>
    <div class="container">
        <div class="item  accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Cargar Combustible
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form class="" action="">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-1">
                                    <input type="text" class="form-control" name="ubicacion_carga" id="ubicacionCarga"
                                        placeholder="Introduzca la URL de su ubicacion aqui">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-1">
                                    <input type="text" class="form-control" name="litros" id="Litros"
                                        placeholder="Cantidad en Litros">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-1">
                                    <input type="text" class="form-control" name="importe_pago" id="importe"
                                        placeholder="Importe">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-1">
                                    <input type="text" class="form-control" name="km_unidad" id="kmUnidad"
                                        placeholder="Kilometros de la Unidad">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                    <input type="submit" class="form-control btn-success" id="apellidoCliente"
                                        name="btn" placeholder="Apellido">
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="item  accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Enviar Ubicacion
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form class="" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" name="url-maps" id="urlMaps"
                                        placeholder="Intruduzca la URL aqui">
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" class="form-control btn-success" id="apellidoCliente"
                                        name="btn" placeholder="Apellido">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->













<?php include_once('footer.php') ?>