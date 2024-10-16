<?php
class personasVista{
    // mostrar DB
    public function mostrarPersonas($personas){
        $constante = count($personas);

        // traigo el PHTL del listado;
        require_once 'templates/personas/lista_persona.phtml';
    }
    public function listadoPersonas ($persona) {
        require_once 'templates/personas/detalles.viaje.phtml';

    }
    public function mostrarformPersonas(){
        require_once 'templates/personas/formulario_persona.phtml';
    }
    public function formEditPersonas($id_persona, $persona){
        require_once 'templates/personas/formulario.modificar.persona.phtml';
    }
    // mostrar errores
    public function mostrarErrores($errores){
        require_once 'templates/personas/errores.phtml';
    }
}
