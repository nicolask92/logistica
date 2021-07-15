'use strict';

function AppViewModel() {
    var self = this;

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
    self.viajeSeleccionado = ko.observable();

    self.km = ko.observable(0);
    self.litros = ko.observable(0);
    self.importe = ko.observable(0);

    // guards
    self.reporteCargado = ko.observable(false);
    self.habilitadoCargaDatos = ko.observable(false);

    self.viajeSeleccionado.subscribe(function () {
        console.log(self.viajeSeleccionado());
        if (self.viajeSeleccionado() === 'ACTIVO') {
            self.errorEstado(false);
            self.habilitadoCargaDatos(true);
        } else {
            self.errorEstado(true);
            self.habilitadoCargaDatos(false);
        }
    });

    self.informacionDeViajes = function () {
        $.ajax({
            url: '/chofer/informacionViaje',
            method: 'POST'
        }).done(function(respuesta) {
            var jsonViajes = JSON.parse(respuesta);
            _.each(JSON.parse(respuesta), function (viaje) {
                self.viajes.push(new ViajeViewModel(viaje));
            })
            console.log(jsonViajes);
        })
    }
    self.informacionDeViajes();

    // errores
    self.errorEstado = ko.observable(false);
    self.errorKm = ko.observable(false);
    self.errorImporte = ko.observable(false);
    self.errorLitros = ko.observable(false);

    self.errorTextoCantidad = ko.observable('');
    self.errorTextoImporte = ko.observable('');
    self.errorTextoKm = ko.observable('');

    ko.computed(function () {

    })

    self.enviarReporte = function () {
        self.errorKm(false);
        self.errorImporte(false);
        self.errorLitros(false);

        if (_.isNaN(parseFloat(self.km())) || !_.isNumber(parseFloat(self.km())) || parseFloat(self.km()) < 0) {
            self.errorKm(true);
            self.errorTextoKm('Los km deben ser un valor numerico y mayor a cero.');
        }
        if (_.isNaN(parseFloat(self.litros())) ||!_.isNumber(parseFloat(self.litros()))  || parseFloat(self.litros()) < 0) {
            self.errorLitros(true);
            self.errorTextoCantidad('Los litros deben ser un valor numerico y mayor o iguales a cero.');
        }
        if (_.isNaN(parseFloat(self.importe())) || !_.isNumber(parseFloat(self.importe())) || parseFloat(self.importe()) < 0) {
            if (!self.errorLitros()) {
                self.errorImporte(true);
                self.errorTextoImporte('Si se cargo gasolina, el importe no puede ser nulo.')
            } else {
                self.errorImporte(true);
                self.errorTextoImporte('El importe debe ser un valor numerico y mayor o iguales a cero.');
            }
        }

        if (!self.errorLitros() && !self.errorKm() && !self.errorImporte()) {
            var datosAMandar = {
                litros: self.litros(),
                km: self.km(),
                importe: self.importe()
            }

            $.ajax({
                url: '/chofer/procesarReporteDiario',
                data: { datos: datosAMandar },
                method: 'POST',
                dataType: 'json',
            }).done(function(respuesta) {
                console.log(respuesta);
            })
        }
    }

    // implementar
    self.validarQueElCampoSeaNumerioYMayorACero = function (valorAEvaluar) {

    }
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