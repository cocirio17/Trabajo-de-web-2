<?php
require_once 'app/personas/Personas.vista.php';
require_once 'app/personas/Personas.modelo.php';
require_once 'app/autenticacion/Autenticar.controlador.php';
class personasContralador{
    private $modelo;
    private $vistas;
    private $autenticar;

    public function __construct(){
        $this->modelo = new personasModelo();
        $this->vistas = new personasVista();
        $this->autenticar = new ControlAutenticar();
    }

    public function mostrarPersonas(){
        $persona = $this->modelo->verPersonas();            
        if(!$persona){
            return $this->vistas->mostrarErrores("No hay personas disponibles");
        }
        return $this->vistas->mostrarPersonas($persona);
    }

    public function mostrarPersona($id_persona){
        $persona = $this->modelo->verPersona($id_persona);        
        if(!$persona){
            return $this->vistas->mostrarErrores("No se a encontrado la persona con la id: $id_persona");
        }
        return $this->vistas->listadoPersonas($persona);
    }

    public function mostrarformPersonas(){
        //$viaje = $this->modelo->verViajes();
        $this->vistas->mostrarformPersonas();
    }

    public function agregarPersona(){
        if ($this->autenticar->verificarSecion()) {
            
            if (!isset($_POST['nombre']) || empty($_POST['nombre']) ||
                !isset($_POST['apellido']) || empty($_POST['apellido']) ||
                !isset($_POST['dni']) || empty($_POST['dni']) ||
                !isset($_POST['edad']) || empty($_POST['edad'])) {
            return $this->vistas->mostrarErrores('Falta completar todos los campos obligatorios');
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $edad = $_POST['edad'];

            $id = $this->modelo->agregarPersona($nombre, $apellido, $dni, $edad);

            header('Location: ' . BASE_URL . 'mostrarPersonas');          
            
            
        }
    }
    public function mostrarFormEditPersona($id_persona){
        $persona = $this->modelo->verPersona($id_persona);

        if(!$persona){
            return $this->vistas->mostrarErrores('la persona que esta buscando no esta disponible');
        }
        $this->vistas->formEditPersonas($id_persona, $persona);
    }

    public function modificarPersona($id_pasajero) {
        if (!isset($_POST['nombre']) || empty($_POST['nombre']) ||
            !isset($_POST['apellido']) || empty($_POST['apellido']) ||
            !isset($_POST['dni']) || empty($_POST['dni']) ||
            !isset($_POST['edad']) || empty($_POST['edad'])) {
            return $this->vistas->mostrarErrores('Campos incompletos');
        }
    
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $edad = $_POST['edad'];
    
        $this->modelo->editarPersona($id_pasajero, $nombre, $apellido, $dni, $edad);
        header('Location: ' . BASE_URL . 'mostrarPersonas');
    }
    

    public function borrarPersona($id){
        $persona = $this->modelo->verPersona($id);
        if (!$persona) {
            return $this->vistas->mostrarErrores("No existe la viaje con el id=$id");
        }
        $this->modelo->borrarPersona($id);
        header('Location: ' . BASE_URL . 'mostrarPersonas');
    }
}
