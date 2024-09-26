<?php
require_once 'app/viajes/Viaje.modelo.php';
require_once 'app/viajes/Viaje.vista.php';
class viajesContralador{
    private $modelo;
    private $vistas;

    public function __construct(){
        $this->modelo = new viajeModelo();
        $this->vistas = new viajeVista();
    }

    public function mostraViaje(){
        $viaje = $this->modelo->verViajes();
        return $this->vistas->mostrarViaje($viaje);
    }

    public function agregarViaje(){
        if (!isset($_POST['destino_inicio']) || empty($_POST['destino_inicio'])) {
            return $this->vistas->mostrarErrores('Falta completar destino de inicio');
        }
        if (!isset($_POST['destino_fin']) || empty($_POST['destino_fin'])) {
            return $this->vistas->mostrarErrores('Falta completar destino de fin');
        }
        if (!isset($_POST['fecha_salida']) || empty($_POST['fecha_salida'])) {
            return $this->vistas->mostrarErrores('Falta completar fecha de salida');
        }
        
        //  id de pasajero;

        $destino_inicio = $_POST['destino_inicio'];
        $destino_fin= $_POST['destino_fin'];
        $fecha_salida= $_POST['fecha_salida'];

        $id = $this->modelo->agregarViaje($destino_inicio, $destino_fin, $fecha_salida);

        // A --> {redirecionar al inicio}
        // B --> {mostrar mensaje si es que se puedo agregar}
        header('Location: ' . BASE_URL);

    }

    public function editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida) {
        $viaje = $this->modelo->verViaje($id_viaje);

        if (!$viaje) {
            return $this->vistas->mostrarErrores("No existe la tarea con el id=$id_viaje");
        }

        // actualiza la tarea
        $this->modelo->editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida);

        header('Location: ' . BASE_URL);
    }



    public function borrarViaje($id){
        $viaje = $this->modelo->verViaje($id);
        
        if(!$viaje){
            return $this->vistas->mostrarErrores("No existe la tare con el id=$id");
        }
        
        $this->modelo->borrarViaje($id);
        // A --> {redirecionar al inicio}
        // B --> {mostrar mensaje si es que se puedo agregar}
        
        header('Location: ' . BASE_URL);
    }
}
