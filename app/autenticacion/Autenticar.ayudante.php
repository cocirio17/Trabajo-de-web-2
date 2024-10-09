<?php
require_once 'app/autenticacion/Autenticar.controlador.php';

class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->id_usuario;
        $_SESSION['USER_EMAIL'] = $user->usuario; 
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verificar() {
        AuthHelper::init();
        if (isset($_SESSION['USER_ID'])) {
            return true;
        } else {
            header('Location:' . BASE_URL . 'login');
        }
    }

    public static function estaRegistrado(){
        AuthHelper::init();
        if (isset($_SESSION['USER_ID'])) {
            return true;
        }
        else{
            return false;
        }
    }
}
