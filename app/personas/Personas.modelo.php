<?php
class personasModelo{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=coletivo;charset=utf8', 'root', '');
    }
    
    // traer la DB completa fetchAll
    public function verViajes(){
        $query = $this->db->prepare('SELECT * FROM viaje');
        $query->execute();
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }
    
    // traer un solo elemento de la DB fetch
    public function verViaje($id) {    
        $query = $this->db->prepare('SELECT * FROM viaje WHERE id_viaje = ?');
        $query->execute([$id]);      
        $viaje = $query->fetch(PDO::FETCH_OBJ);    
        return $viaje;
    }
    
    public function verPersonas(){
        $query = $this->db->prepare('SELECT * FROM personas');
        $query->execute();
        $pasajero = $query->fetchAll(PDO::FETCH_OBJ);
        return $pasajero;
    }
    
    public function verPersona($id_pasajero){
        $query = $this->db->prepare('SELECT * FROM personas WHERE id_pasajero = ?');
        $query->execute([$id_pasajero]);      
        $personas = $query->fetch(PDO::FETCH_OBJ);    
        return $personas;
    }  
    

    //insertar a la DB 
    public function agregarPersona($nombre, $apellido, $dni, $edad) { 
        $query = $this->db->prepare('INSERT INTO personas (dni, nombre, apellido, edad) VALUES (?, ?, ?, ?)');
        $query->execute([$dni, $nombre, $apellido, $edad]);    
        $id_pasajero = $this->db->lastInsertId(); 
        return $id_pasajero;
    }
    
    

    // editar de la DB
    public function editarPersona($id_pasajero, $nombre, $apellido, $dni, $edad) { 
        $query = $this->db->prepare('UPDATE personas SET dni = ?, nombre = ?, apellido = ?, edad = ? WHERE id_pasajero = ?');
        $query->execute([$dni, $nombre, $apellido, $edad, $id_pasajero]);
    }
    
    
    // borrar de la DB
    public function borrarPersona($id){
        $query = $this->db->prepare('DELETE FROM personas WHERE id_pasajero = ?');
        $query->execute([$id]);
    }


}
