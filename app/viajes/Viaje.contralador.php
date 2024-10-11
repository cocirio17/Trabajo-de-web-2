<?php
require_once 'app/viajes/Viaje.modelo.php';
require_once 'app/viajes/Viaje.vista.php';
require_once 'app/autenticacion/Autenticar.controlador.php';
class viajesContralador{
    private $modelo;
    private $vistas;
    private $autenticar;

    public function __construct(){
        $this->modelo = new viajeModelo();
        $this->vistas = new viajeVista();
        $this->autenticar = new AuthController();
    }

    public function mostraViajes(){
        $viaje = $this->modelo->verViajes();
            
        if(!$viaje){
            return $this->vistas->mostrarErrores("No hay viajes disponibles");
        }
        return $this->vistas->mostrarViaje($viaje);
    }

    public function mostrarViaje($id){
        $viaje = $this->modelo->verViaje($id);
        
        if(!$viaje){
            return $this->vistas->mostrarErrores("No se a encontrado el viaje con la id: $id");
        }
        $id = $viaje->id_pasajero;
        $persona = $this->modelo->verPersona($id);
        return $this->vistas->viajeDetalles($viaje, $persona);
    }

    public function mostrarformViajes(){
        $pasajero = $this->modelo->verPersonas();
        $this->vistas->mostrarformViajes($pasajero);
    }

    public function agregarViaje(){
        if ($this->autenticar->verificarSecion()) {   

            // verificacion si esta logeado
            if (!isset($_POST['destino_inicio']) || empty($_POST['destino_inicio']) ||
                !isset($_POST['destino_fin']) || empty($_POST['destino_fin']) ||
                !isset($_POST['fecha_salida']) || empty($_POST['fecha_salida']) ||
                !isset($_POST['precio']) || empty($_POST['precio']) ||
                !isset($_POST['id_personas']) || empty($_POST['id_personas'])){
                return $this->vistas->mostrarErrores('Falta completar todos los campos obligatorios');
            }

            //  id de pasajero;
            $destino_inicio = $_POST['destino_inicio'];
            $destino_fin = $_POST['destino_fin'];
            $fecha_salida = $_POST['fecha_salida'];
            $precio = $_POST['precio'];
            $id_pasajero = $_POST['id_personas'];

            $id = $this->modelo->agregarViaje($destino_inicio, $destino_fin, $fecha_salida, $precio, $id_pasajero);
            header('Location: ' . BASE_URL . 'listarViajes');
        }
    }
    public function mostarFormEditViaje($id_viaje){
        $viaje = $this->modelo->verViaje($id_viaje);

        if(!$viaje){
            return $this->vistas->mostrarErrores('El viaje que esta buscando no esta disponible');
        }
        
        $id_persona = $viaje->id_pasajero;
        $persona = $this->modelo->verPersona($id_persona);
        $pasajeros = $this->modelo->verPersonas();
        $this->vistas->formEditViaje($id_viaje, $viaje , $persona, $pasajeros);
    }

    public function modificarViaje($id_viaje){
        if (!isset($_POST['destino_inicio']) || empty($_POST['destino_inicio']) ||
            !isset($_POST['destino_fin']) || empty($_POST['destino_fin']) ||
            !isset($_POST['fecha_salida']) || empty($_POST['fecha_salida']) ||
            !isset($_POST['precio']) || empty($_POST['precio']) ||
            !isset($_POST['id_pasajero']) || empty($_POST['id_pasajero'])){
            return $this->vistas->mostrarErrores('Campos incompletos');
        }

        $precio = $_POST['precio'];
        $destino_inicio = $_POST['destino_inicio'];
        $destino_fin = $_POST['destino_fin'];
        $fecha_salida = $_POST['fecha_salida'];
        $precio = $_POST['precio'];
        $id_pasajero = $_POST['id_pasajero'];
        $this->modelo->editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida, $precio, $id_pasajero);

        header('Location: ' . BASE_URL . 'listarViajes');
    }

    public function borrarViaje($id){
        // verificacion si esta logeado
        $viaje = $this->modelo->verViaje($id);
        if (!$viaje) {
            return $this->vistas->mostrarErrores("No existe la viaje con el id=$id");
        }
        $this->modelo->borrarViaje($id);
        header('Location: ' . BASE_URL . 'listarViajes');
    }
}
