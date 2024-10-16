<?php
require_once 'app/autenticacion/Autenticar.vista.php';
require_once 'app/autenticacion/Autenticar.modelo.php';


class ControlAutenticar {
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
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->vista->mostrarLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['contrasenea']) || empty($_POST['contrasenea'])) {
            return $this->vista->mostrarLogin('Falta completar la contraseña');
        }
        $usuario = $_POST['email'];
        $password = $_POST['contrasenea'];

        // busco el usuario
        $user = $this->modelo->obtenerPorCorreoElectrónico($usuario);
        
        if ($user && password_verify($password,$user->contrasenea)) {    

            session_start();
           
            
            $_SESSION['ID_USER'] = $user->id_usuario;
            $_SESSION['USER_NAME'] = $user->usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
            header('Location: ' . BASE_URL);
        }
        else {
            return $this->vista->mostrarLogin('Usuario inválido');
        }
    }

    public function mostrarAviso(){
        $this->vista->logoutAviso();
    }

    public function verificarSecion(){
        if(!empty($_SESSION['ID_USER'] == null)){
            return false;
        }
        return true;
    }
    
    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }



}
