<?php
// rutas 
class AutenticarVista {

    public function mostrarLogin($error = null){
        require './templates/autenticar/iniciarSecion.phtml';
    }

    public function logoutAviso(){
        require './templates/aviso.logout.phtml';
    }
}