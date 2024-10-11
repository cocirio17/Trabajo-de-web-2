<?php
require_once './app/viajes/viaje.contralador.php';
require_once './app/autenticacion/Autenticar.controlador.php';
require_once './app/general/Geberal.contolador.php';



// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
 
$autenticar = new AuthController();
$controllerViajes = new viajesContralador();
$controladorGeneral = new generalContralador();


$action = 'inicio'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}



/*
/ (tabla de ruteo)
│
├── inicio                    -> $controladorGeneral->mostraInicio();
│
├── listarViajes              -> $controllerViajes->mostraViajes();
│
├── verMasViajes/:ID          -> $controllerViajes->mostrarViaje($params[1]);
│
├── formularioViajes          -> $controllerViajes->mostrarformViajes();
│
├── nuevo-viaje               -> $controllerViajes->agregarViaje();
│
├── eliminarViaje/:ID         -> $controllerViajes->borrarViaje($params[1]);
│
├── editarViaje/:ID           -> $controllerViajes->mostarFormEditViaje($params[1]);
│
├── modificarViaje/:ID        -> $controllerViajes->modificarViaje($params[1]);
│
├── login                     -> $autenticar->mostrarLogin();
│
└── autentificación           -> $autenticar->autentificacion();
*/

// parsea la accion para separar accion real de parametros
$params = explode('/',$action);
session_start();    
switch ($params[0]) {
    case 'inicio': 
        $controladorGeneral->mostraInicio();
        break;
    case 'listarViajes':
        $controllerViajes->mostraViajes();
        break;
    case 'verMasViajes':
        $controllerViajes->mostrarViaje($params[1]);
        break;
    case 'formularioViajes':
        $controllerViajes->mostrarformViajes();
        break;
    case 'nuevo-viaje':
        if($autenticar->verificarSecion()){
            $controllerViajes->agregarViaje();
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    case 'eliminarViaje':        
        if($autenticar->verificarSecion()){
            $controllerViajes->borrarViaje($params[1]);
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    case 'editarViaje':
        if($autenticar->verificarSecion()){
            $controllerViajes->mostarFormEditViaje($params[1]);
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    case 'modificarViaje':
        if($autenticar->verificarSecion()){
            $controllerViajes->modificarViaje($params[1]);
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    case 'login':
        $autenticar->mostrarLogin();
        break;
    case 'autentificación':
        $autenticar->autentificacion();
        break;
    case 'cerrarSecion':
        $autenticar->logout();
        break;
    default:
        $controladorGeneral->mostarErores("La pagina que busca no esta disponible"); // deberiamos llamar a un controlador que maneje esto
        break;
}
