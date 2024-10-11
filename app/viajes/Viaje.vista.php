<?php
class viajeVista{
    // mostrar DB
    public function mostrarViaje($viajes){
        $constante = count($viajes);

        // traigo el PHTL del listado;
        require_once 'templates/viajes/lista_viajes.phtml';
    }
    public function viajeDetalles ($viaje, $persona) {
        require_once 'templates/viajes/detalles.viaje.phtml';

    }
    public function mostrarformViajes($pasajeros){
        require_once 'templates/viajes/formulario_viajes.phtml';
    }
    public function formEditViaje($id_viaje,$viaje, $persona, $pasajeros){
        require_once 'templates/viajes/formulario.modificar.viaje.phtml';
    }
    // mostrar errores
    public function mostrarErrores($errores){
        require_once 'templates/viajes/errores.phtml';
    }
}
