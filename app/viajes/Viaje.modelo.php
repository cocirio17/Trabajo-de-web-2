<?php
class viajeModelo{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=coletivo;charset=utf8', 'root', '');;
    }
    
    // traer la DB completa fetchAll
    public function verViajes(){
        $query = $this->db->prepare('SELECT * FROM viaje');
        $query->execute();
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
        return $tasks;
    }
    
    // traer un solo elemento de la DB fetch
    public function verViaje($id) {    
        $query = $this->db->prepare('SELECT * FROM viaje WHERE id = ?');
        $query->execute([$id]);      
        $task = $query->fetch(PDO::FETCH_OBJ);    
        return $task;
    }

    //insertar a la DB 
    public function agregarViaje($destino_inicio, $destino_fin, $fecha_salida) { 
        $query = $this->db->prepare('INSERT INTO viaje(destino_inicio, destino_fin, fecha_salida) VALUES (?, ?, ?)');
        $query->execute([$destino_inicio, $destino_fin, $fecha_salida]);    
        $id = $this->db->lastInsertId();// ID de la último que fue agrego a la base de datos   
        return $id;
    }

    // editar de la DB
    public function editarViaje($id_viaje, $destino_inicio, $destino_fin, $fecha_salida) {        
        $query = $this->db->prepare('UPDATE viaje SET  destino_inicio = ?, destino_fin=?,fecha_salida =?  WHERE id = ?');
        $query->execute([$destino_inicio, $destino_fin, $fecha_salida, $id_viaje]);
        return $query->rowCount();
    }

    // borrar de la DB
    public function borrarViaje($id){
        $query = $this->db->prepare('DELETE FROM viaje WHERE id = ?');
        $query->execute([$id]);
    }


}
