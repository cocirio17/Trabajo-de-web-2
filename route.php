<?php
require_once './app/viajes/viaje.contralador.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// listar  -> viajesContralador->mostraViaje();
// nuevo-viaje  -> viajesContralador->agregarViaje();;
// eliminar/:ID  -> viajesContralador->borrarViaje($id);
// editar/:ID -> viajesContralador->editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida);

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new viajesContralador();
        $controller->mostraViaje();
        break;
    case 'nuevo-viaje':
 $controller = new viajesContralador();
        $controller->agregarViaje();
        break;
    case 'eliminar':
 $controller = new viajesContralador();
        $controller->borrarViaje($params[1]);
        break;
    case 'editar':
  $controller = new viajesContralador();
        $controller->editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida);
        break;
    default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}