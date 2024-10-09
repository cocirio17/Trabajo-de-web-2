<?php
class generalModelo{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=coletivo;charset=utf8', 'root', '');;
    }
}