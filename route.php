<?php
require_once './app/viajes/Viaje.contralador.php';
require_once './app/personas/Personas.controlador.php';
require_once './app/autenticacion/Autenticar.controlador.php';
require_once './app/general/Geberal.contolador.php';



// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
 
$autenticar = new ControlAutenticar();
$controllerViajes = new viajesContralador();
$controllerPersona = new personasContralador();
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
│
├── cerrarSecion              -> $autenticar->logout();
│
├── mostrarPersonas           -> $controllerPersona->mostrarPersonas();
│
├── eliminarPersona/:ID       -> $controllerPersona->borrarPersona($params[1]);
│
├── formularioPersona         -> $controllerPersona->mostrarformPersonas();
│
├── nuevaPersona              -> $controllerPersona->agregarPersona();
│
├── mostrarFormEditPersona/:ID-> $controllerPersona->mostrarFormEditPersona($params[1]);
│
└── editPersona/:ID           -> $controllerPersona->modificarPersona($params[1]);
│
└── viajesXPersonas/:ID       -> $controllerViajes->verViajexPersona($params[1]);
*/

// parsea la accion para separar accion real de parametros
$params = explode('/',$action);
session_start();    
switch ($params[0]) {
    case 'inicio': 
        $controladorGeneral->mostraInicio();
        break;
    //--------------------------------------------------------------------------------------
    case 'listarViajes':
        $controllerViajes->mostraViajes();
        break;
    case 'verMasViajes':
        $controllerViajes->mostrarViaje($params[1]);
        break;
    case 'formularioViajes':
        $controllerViajes->mostrarformViajes();
        break;
    case 'nuevoViaje':
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
    //--------------------------------------------------------------------------------------
    case 'login':
        $autenticar->mostrarLogin();
        break;
    case 'autentificación':
        $autenticar->autentificacion();
        break;
    case 'cerrarSecion':
        $autenticar->logout();
        break;    
    //----------------------------------------------------------------------------------------
    case 'mostrarPersonas':
        $controllerPersona->mostrarPersonas();
        break;
    case 'eliminarPersona':
        if($autenticar->verificarSecion()){
            $controllerPersona->borrarPersona($params[1]);        
        }else{
            header('Location: ' . BASE_URL . 'login');
        }        
        break;
    case 'formularioPersona':
        $controllerPersona->mostrarformPersonas();
        break;
    case 'nuevaPersona':
        if($autenticar->verificarSecion()){
            $controllerPersona->agregarPersona();
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    case 'mostrarFormEditPersona':
        $controllerPersona->mostrarFormEditPersona($params[1]);
        break;
    case 'editPersona':
        if($autenticar->verificarSecion()){
            $controllerPersona->modificarPersona($params[1]);
        }else{
            header('Location: ' . BASE_URL . 'login');
        }
        break;
    
    case 'viajesPorPersonas':
        $controllerViajes->verViajexPersona($params[1]);
       break;
    default:
        $controladorGeneral->mostarErores("La pagina que busca no esta disponible");
        break;
}
