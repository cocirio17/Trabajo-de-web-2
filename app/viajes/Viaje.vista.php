<?php
class viajeVista{
    // mostrar DB
    public function mostrarViaje ($viajes){
        $constante = count($viajes);

        // traigo el PHTL del listado;
        require_once 'templates/viajes/lista_viajes.phtml';
        
        
    }
    // mostrar errores
    public function mostrarErrores($errores){
        require_once 'templates/viajes/errores.phtml';
    }

}
?>