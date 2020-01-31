<?php
require 'persistencia/ReservaDAO.php';
class Reserva{
    private $conexion;
    private $reservaDAO;
    private $fecha_entrada;
    private $fecha_salida;
    private $num_personas;
    private $idusuario;
    private $idhotel;
    private $precio;

    function getFecha_entrada(){
        return $this -> fecha_entrada;
    }

    function getFecha_salida(){
        return $this -> fecha_salida;
    }

    function getNum_personas(){
        return $this -> num_personas;
    }

    function getUsuario(){
        return $this -> idusuario;
    }
    
    function getHotel(){
        return $this -> idhotel;
    }

    function getPrecio(){
        return $this -> precio;
    }

    function Reserva($fecha_entrada="", $fecha_salida="", $num_personas="", $idusuario="", $idhotel="", $precio=""){
        $this -> fecha_entrada = $fecha_entrada;
        $this -> fecha_salida = $fecha_salida;
        $this -> num_personas = $num_personas;
        $this -> idusuario = $idusuario;
        $this -> idhotel = $idhotel;
        $this -> precio = $precio;
        $this -> conexion = new Conexion();
        $this -> reservaDAO = new ReservaDAO($fecha_entrada, $fecha_salida, $num_personas, $idusuario, $idhotel, $precio);
    }

    function consultarDisponibilidad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarDisponibilidad());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $usuario = new Usuario($registro[3]);
            $usuario -> consultar(); 
            $hotel = new Hotel($registro[4]);
            $hotel -> consultar();
            $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $usuario, $hotel);
        }
        return $registros;
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultarTodosUs(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodosUs());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $usuario = new Usuario($registro[3]);
            $usuario -> consultar();
            $hotel = new Hotel($registro[4]);
            $hotel -> consultar(); 
            $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $usuario, $hotel, $registro[5]);
        }
        return $registros;
    }

    function consultarTodosProv(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodosProv());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $usuario = new Usuario($registro[3]);
            $usuario -> consultar();
            $hotel = new Hotel($registro[4]);
            $hotel -> consultar(); 
            $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $usuario, $hotel, $registro[5]);
        }
        return $registros;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultar());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $usuario = new Usuario($registro[3]);
            $usuario -> consultar();
            $hotel = new Hotel($registro[4]);
            $hotel -> consultar(); 
            $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $usuario, $hotel, $registro[5]);
        }
        return $registros;
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $usuario = new Usuario($registro[3]);
            $usuario -> consultar();
            $hotel = new Hotel($registro[4]);
            $hotel -> consultar(); 
            $registros[$i] = new Reserva($registro[0], $registro[1], $registro[2], $usuario, $hotel, $registro[5]);
        }
        return $registros;
    }

}

?>