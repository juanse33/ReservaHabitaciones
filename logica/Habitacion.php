<?php
require 'persistencia/HabitacionDAO.php';
class Habitacion {
    private $conexion;
    private $habitacionDAO;
    private $idhabitacion;
    private $numero;
    private $idhotel;
    private $num_personas;
    private $precio;

    function getIdhabitacion(){
        return $this -> idhabitacion;
    }
    
    function getIdhotel(){
        return $this -> idhotel;
    }
    
    function getNum_personas(){
        return $this -> num_personas;
    }
    
    function getPrecio(){
        return $this -> precio;
    }

    function getNumero(){
        return $this -> numero;
    }

    function getHotel(){
        return $this -> idhotel;
    }
     
    function Habitacion($idhabitacion="", $numero="", $idhotel="", $num_personas="", $precio=""){
        $this -> idhabitacion = $idhabitacion;
        $this -> numero = $numero;
        $this -> idhotel = $idhotel;
        $this -> num_personas = $num_personas;
        $this -> precio = $precio;    
        $this -> conexion = new Conexion();
        $this -> habitacionDAO = new HabitacionDAO($idhabitacion, $numero, $idhotel, $num_personas, $precio);   
    }    
        
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idhabitacion = $registro[0];
        $this -> numero = $registro[1];
        $this -> idhotel = $registro[2];
        $this -> num_personas = $registro[3];
        $this -> precio = $registro[4];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $hotel = new Hotel($registro[2]);
            $hotel -> consultar(); 
            $registros[$i] = new Habitacion("", $registro[1], $hotel, $registro[3], $registro[4]);
        }
        return $registros;
    }

    function consultarCapacidad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarCapacidad());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $hotel = new Hotel($registro[2]);
            $hotel -> consultar(); 
            $registros[$i] = new Habitacion("", $registro[1], $hotel, $registro[3], $registro[4]);
        }
        return $registros;
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> insertar());
        $this -> conexion -> cerrar();
    }
}
