<?php
require_once 'app/autenticacion/Autenticar.controlador.php';
class AutenticarVista {

    public function mostrarLogin($error = null){
        require './templates/general/iniciarSecion.phtml';
    }

    public function logoutAviso(){
        require './templates/aviso.logout.phtml';
    }
}