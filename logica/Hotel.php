<?php
require 'persistencia/HotelDAO.php';
class Hotel {
    private $conexion;
    private $hotelDAO;
    private $idhotel;
    private $nombre;
    private $direccion;
    private $idproveedor;
    private $idciudad;
  
   
    function Hotel($id="", $nombre="", $direccion="", $correo="", $idproveedor="", $idciudad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> correo = $correo;
        $this -> idproveedor = $idproveedor;
        $this -> idciudad = $idciudad;
        $this -> conexion = new Conexion();
        $this -> hotelDAO = new HotelDAO($id, $nombre, $direccion, $correo, $idproveedor, $idciudad);
    }              
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        
        return $this -> nombre;
    }
    
    function getDireccion(){
        return $this -> direccion;
    }

    function getCorreo(){
        return $this -> correo;
    }
    
    function getProveedor(){
        return $this -> idproveedor;
    }

    function getCiudad(){
        return $this -> idciudad;
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> direccion =$registro[2];
        $this -> correo = $registro[3];
        $this -> idproveedor = $registro[4];
        $this -> idciudad = $registro[5];
        $this -> conexion -> cerrar();
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $proveedor = new Proveedor($registro[4]);
            $proveedor -> consultar(); 
            $ciudad = new Ciudad($registro[5]);
            $ciudad -> consultar();          
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2], $registro[3], $proveedor, $ciudad);
        }
        return $registros;
    }

    function buscarProveedor($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> buscarProveedor($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $proveedor = new Proveedor($registro[4]);
            $proveedor -> consultar(); 
            $ciudad = new Ciudad($registro[5]);
            $ciudad -> consultar();          
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2], $registro[3], $proveedor, $ciudad);
        }
        return $registros;
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $proveedor = new Proveedor($registro[4]);
            $proveedor -> consultar(); 
            $ciudad = new Ciudad($registro[5]);
            $ciudad -> consultar();          
            $registros[$i] = new Hotel($registro[0], $registro[1], $registro[2], $registro[3], $proveedor, $ciudad);
        }
        return $registros;
    }
}

?>