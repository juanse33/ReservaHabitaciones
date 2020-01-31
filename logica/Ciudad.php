<?php
require 'persistencia/CiudadDAO.php';

class Ciudad {
    private $idciudad;
    private $idpais; 
    private $nombre;
    private $ciudadDAO;
    
    function Ciudad($idciudad="",$idpais="",$nombre=""){
        $this -> idciudad = $idciudad;
        $this -> idpais = $idpais; 
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> ciudadDAO = new CiudadDAO ($idciudad,$idpais,$nombre);
    }
    
    function getIdCiudad(){
        return $this -> idciudad;
    }
    
    function getPais(){
        return $this -> idpais;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
       
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ciudadDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $pais = new Pais($registro[1]);
            $pais -> consultar();
            $registros[$i] = new Ciudad($registro[0], $pais, $registro[2]);
        }
        return $registros;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ciudadDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idciudad = $registro[0];
        $this -> idpais = new Pais($registro[1]);
        $this -> idpais -> consultar();
        $this -> nombre = $registro[2];
        $this -> conexion -> cerrar();
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ciudadDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Ciudad($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }   
} 
?>