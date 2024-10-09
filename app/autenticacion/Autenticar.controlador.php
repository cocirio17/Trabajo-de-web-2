<?php
require_once 'app/autenticacion/Autenticar.vista.php';
require_once 'app/autenticacion/Autenticar.controlador.php';
require_once 'app/autenticacion/Autenticar.modelo.php';
require_once 'app/autenticacion/Autenticar.ayudante.php';

class AuthController {
    private $modelo;
    private $vista;

    function __construct(){
        $this->modelo = new AutenticarModelo();
        $this->vista = new AutenticarVista();
    }
    
    public function mostrarLogin(){        
        $this->vista->mostrarLogin();
    } 

    public function autentificacion() {
        $usuario = $_POST['email'];
        $password = $_POST['contrasenea'];
        
        if (empty($usuario) || empty($password)) {
            $this->vista->mostrarLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->modelo->obtenerPorCorreoElectrónico($usuario);
        
        if ($user && password_verify($password,$user->contrasenea)) {
            
            AuthHelper::login($user);
            var_dump($user);
            header('Location: ' . BASE_URL);
        }
        else {
            $this->vista->mostrarLogin('Usuario inválido');
        }
    }

    public function mostrarAviso(){
        $this->vista->logoutAviso();
    }
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }


}
