<?php
    require 'persistencia/PaisDAO.php';
class Pais {
    private $idpais; 
    private $nombre;
    private $paisDAO;
    
    function Pais($idpais="",$nombre=""){
        $this -> idpais = $idpais; 
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> paisDAO = new PaisDAO($idpais, $nombre);
    }
    
        
    function getId(){
        return $this -> idpais;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
       
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paisDAO -> consultarTodos());
        echo $this -> paisDAO -> consultarTodos();
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Pais($registro[0], $registro[1]);
        }
        return $registros;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paisDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idpais = $registro[0];
        $this -> nombre = $registro[1];
        $this -> conexion -> cerrar();
    }
} 
?>