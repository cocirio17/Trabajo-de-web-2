<?php
require_once 'app/general/General.modelo.php';
require_once 'app/general/General.vista.php';
class generalContralador{
    private $modelo;
    private $vistas;

    public function __construct(){
        $this->modelo = new generalModelo();
        $this->vistas = new generalVista();            
    }

    public function mostraInicio(){
        return $this->vistas->mostraInicio();
    }

}