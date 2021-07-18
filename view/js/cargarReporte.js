'use strict';
'global _, ko';

function AppViewModel() {
    var self = this;

    self.latitud = ko.observable(-34.6686986);
    self.longitud = ko.observable(-58.5614947);
    self.urlQR = getParameterByName('viaje');
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
    self.viajeSeleccionado = ko.observable();
    self.opcionesDeReporte = ['Finalizar', 'Reporte Diario'];
    self.reporteSeleccionado = ko.observable();

    // variables de input
    self.km = ko.observable(0);
    self.litros = ko.observable(0);
    self.importe = ko.observable(0);
    self.extras = ko.observable(0);
    self.peaje = ko.observable(0);
    self.viatico = ko.observable(0)
    self.fee = ko.observable(0);
    self.pesaje = ko.observable(0);

    self.textoBoton = ko.observable('');

    // guards
    self.reporteCargado = ko.observable(false);
    self.habilitadoCargaDatos = ko.observable(false);
    self.seleccionTipoReporte = ko.observable(false);
    self.habilitarFee = ko.observable(false);
    self.habilitarPesaje = ko.observable(false);

    // errores
    self.errorKm = ko.observable(false);
    self.errorImporte = ko.observable(false);
    self.errorLitros = ko.observable(false);
    self.errorExtras = ko.observable(false);
    self.errorPeaje = ko.observable(false);
    self.errorFee = ko.observable(false);
    self.errorPesaje = ko.observable(false);
    self.errorViatico = ko.observable(false);
    self.errorSelectores = ko.observable(false);
    self.errorDeCreacionReporte = ko.observable(false);

    self.errorTextoCantidad = ko.observable('');
    self.errorTextoImporte = ko.observable('');
    self.errorTextoKm = ko.observable('');
    self.errorTextoExtras = ko.observable('');
    self.errorTextoPeaje = ko.observable('');
    self.errorTextoFee = ko.observable('');
    self.errorTextoViatico = ko.observable('');
    self.errorTextoPesaje = ko.observable('');
    self.textoSelectores = ko.observable('');
    self.erroresAMostrar = ko.observableArray([]);

    self.viajeSeleccionado.subscribe(function () {
        self.errorSelectores(false);
        self.seleccionTipoReporte(false);
        self.errorDeCreacionReporte(false);
        console.log(self.viajeSeleccionado());
        var viajeSeleccionado = _.find(self.viajes(), function (viaje) {
            return viaje.id === self.viajeSeleccionado();
        });

        if (viajeSeleccionado !== undefined && (viajeSeleccionado.estado === 'ACTIVO' || viajeSeleccionado.estado === 'PENDIENTE')) {
            if (self.hayViajesActivos() && viajeSeleccionado.estado !== 'ACTIVO') {
                self.errorSelectores(true);
                self.seleccionTipoReporte(false);
                self.textoSelectores('Tienes un viaje sin terminar, para comenzar uno pendiente debes terminar el anterior.');
            } else if (viajeSeleccionado.estado === 'PENDIENTE') {
                self.habilitarPesaje(true);
                self.errorSelectores(false);
                self.textoBoton('Comenzar Viaje');
                self.habilitadoCargaDatos(true);
            } else {
                self.errorSelectores(false);
                self.seleccionTipoReporte(true);
            }
        } else {
            if (self.viajeSeleccionado() !== undefined) {
                self.errorSelectores(true);
                self.textoSelectores('Este viaje ya finalizo.');
                self.seleccionTipoReporte(false);
            }
        }
    });

    ko.computed(function () {
        self.habilitarFee(false);
        if (self.errorSelectores()) {
            self.habilitadoCargaDatos(false);
            self.seleccionTipoReporte(false);
        } else {
            if (self.reporteSeleccionado() === 'Finalizar') {
                self.habilitadoCargaDatos(true);
                self.habilitarFee(true);
                self.textoBoton('Finalizar Viaje');
            } else if (self.reporteSeleccionado() === 'Reporte Diario') {
                self.habilitadoCargaDatos(true);
                self.textoBoton('Enviar Reporte');
            }
        }
    })

    self.hayViajesActivos = function () {
        return _.size(_.filter(self.viajes(), function (viaje) {
            return viaje.estado === 'ACTIVO';
        })) > 0;
    }

    self.informacionDeViajes = function () {
        $.ajax({
            url: '/chofer/informacionViaje',
            method: 'POST'
        }).done(function(respuesta) {
            self.viajes([]);
            var jsonViajes = JSON.parse(respuesta);
            _.each(JSON.parse(respuesta), function (viaje) {
                self.viajes.push(new ViajeViewModel(viaje));
            })
            console.log(jsonViajes);
        })
    }
    self.informacionDeViajes();

    self.enviarReporte = function () {
        self.errorKm(false);
        self.errorImporte(false);
        self.errorLitros(false);
        self.errorPeaje(false);
        self.errorExtras(false);
        self.errorViatico(false);
        self.reporteCargado(false);
        self.errorPesaje(false);
        self.erroresAMostrar();

        if (self.validarQueElCampoSeaNumerio(self.km())) {
            self.errorKm(true);
            self.errorTextoKm('Los km deben ser un valor numerico y mayor a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.litros())) {
            self.errorLitros(true);
            self.errorTextoCantidad('Los litros deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.extras())) {
            self.errorExtras(true);
            self.errorTextoExtras('Los extras deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.peaje())) {
            self.errorPeaje(true);
            self.errorTextoPeaje('Los peajes deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.viatico())) {
            self.errorViatico(true);
            self.errorTextoViatico('Los peajes deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.pesaje())) {
            self.errorPesaje(true);
            self.errorTextoPesaje('Los pesajes deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (self.validarQueElCampoSeaNumerio(self.importe())) {
            if (!self.errorLitros()) {
                self.errorImporte(true);
                self.errorTextoImporte('Si se cargo gasolina, el importe no puede ser nulo.')
            } else {
                self.errorImporte(true);
                self.errorTextoImporte('El importe debe ser un valor numerico y mayor o iguales a cero.');
            }
        }

        if (!self.errorLitros() && !self.errorKm() && !self.errorImporte() && !self.errorViatico() && !self.errorFee() && !self.errorExtras() && !self.errorPesaje()) {
            var tipoReporte = null;
            if (self.hayViajesActivos()) {
                tipoReporte = self.reporteSeleccionado();
            } else {
                tipoReporte = 'Comienzo';
            }
            var datosAMandar = {
                idViaje: self.viajeSeleccionado(),
                litros: self.litros(),
                km: self.km(),
                importe: self.importe(),
                extras: self.extras(),
                peaje: self.peaje(),
                fee: self.fee(),
                viatico: self.viatico(),
                latitud: self.latitud(),
                longitud: self.longitud(),
                pesaje: self.pesaje(),
                tipoReporte: tipoReporte
            }

            console.log('datos a enviar:', datosAMandar);

            $.ajax({
                url: '/chofer/procesarReporteDiario',
                data: { datos: datosAMandar },
                method: 'POST'
            }).done(function(respuesta) {
                var respuestaParseada = JSON.parse(respuesta);
                if (respuestaParseada.error) {
                    self.erroresAMostrar(respuestaParseada.errores);
                    self.errorDeCreacionReporte(true);
                } else {
                    self.habilitadoCargaDatos(false);
                    self.litros(0);
                    self.km(0);
                    self.importe(0);
                    self.extras(0);
                    self.peaje(0);
                    self.fee(0);
                    self.viatico(0);
                    self.pesaje(0);
                    self.reporteCargado(true);
                    self.errorDeCreacionReporte(false);
                    self.errorSelectores(false);
                    self.habilitarPesaje(false);
                    self.habilitarFee(false);
                    self.informacionDeViajes();
                }
                $(window).scrollTop(0);
                console.log(respuestaParseada);
            })
        }
    }

    self.validarQueElCampoSeaNumerio = function (valorAEvaluar) {
        return (_.isNaN(parseFloat(valorAEvaluar)) || !_.isNumber(parseFloat(valorAEvaluar)) || parseFloat(valorAEvaluar) < 0)
    }
    $(document).ready(function() {
        if (self.urlQR != null) {
            self.viajeSeleccionado(parseInt(self.urlQR));
        }
    });
}

function ViajeViewModel(options) {
    var self = this;

    self.id = options.id;
    self.origen = options.origen;
    self.destino = options.destino;
    self.fechaCarga = options.fecha_carga;
    self.estado = options.estado;

    self.descripcionCompleta =  `${self.id} - ${self.origen} a ${self.destino} - ${self.fechaCarga}`
}

ko.applyBindings(new AppViewModel());

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}