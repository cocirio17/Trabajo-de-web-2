<?php
class viajeModelo{
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
    public function agregarViaje($destino_inicio, $destino_fin, $fecha_salida,$precio, $id_pasajero) { 
        $query = $this->db->prepare('INSERT INTO viaje(destino_inicio, destino_fin, fecha_salida, precio, id_pasajero) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$destino_inicio, $destino_fin, $fecha_salida, $precio, $id_pasajero]);    
        $id = $this->db->lastInsertId();// ID de la último que fue agrego a la base de datos   
        return $id;
    }

    // editar de la DB
    public function editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida, $precio, $id_pasajero) { 
        $query = $this->db->prepare('UPDATE `viaje` SET destino_inicio = ?, destino_fin = ?, fecha_salida = ?, precio = ?, id_pasajero = ? WHERE viaje.id_viaje = ?');
        $query->execute([$destino_inicio, $destino_fin, $fecha_salida, $precio, $id_pasajero, $id_viaje]);
    }
    
    // borrar de la DB
    public function borrarViaje($id){
        $query = $this->db->prepare('DELETE FROM viaje WHERE id_viaje = ?');
        $query->execute([$id]);
    }


}
