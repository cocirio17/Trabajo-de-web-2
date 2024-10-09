<?php
// rutas
class AutenticarModelo {
    
    private $db;
   
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=coletivo;charset=utf8', 'root', '');;
    }
  
    public function obtenerPorCorreoElectrónico($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

}