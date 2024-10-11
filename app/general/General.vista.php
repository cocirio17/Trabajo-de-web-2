<?php
class generalVista{

    public function mostraInicio(){
        require_once 'templates/general/inicio.phtml';
    }
    public function mostarErores($errores){
        require_once 'templates/viajes/errores.phtml';
    }
}