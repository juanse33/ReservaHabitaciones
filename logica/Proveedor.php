<?php

require 'persistencia/ProveedorDAO.php';
class Proveedor extends Persona{
    private $conexion;
    private $proveedorDAO;
    
    function Proveedor($id="", $nombre="", $apellido="", $correo="", $clave="", $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave, $estado);     
        $this -> conexion = new Conexion();
        $this -> proveedorDAO = new ProveedorDAO($id, $nombre, $apellido, $correo, $clave, $estado);
    }

    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> proveedorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1 ){
            $registro = $this -> conexion -> extraer();                        
            $this -> id = $registro[0];
            $this -> nombre = $registro[1];
            $this -> apellido = $registro[2];
            $this -> correo = $registro[3];
            $this -> estado = $registro[5];
            $this -> conexion -> cerrar();
            return true;
        }else{
            
            $this -> conexion -> cerrar();
            return false;
        }
    }   
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> proveedorDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> estado = $registro[5];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> proveedorDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Proveedor ($registro[0], $registro[1], $registro[2], $registro[3], "", $registro [4]);
        }
        return $registros;
    }

    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this -> proveedorDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> proveedorDAO -> actualizar());
        $datos = array();
        echo $this-> proveedorDAO -> actualizar();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $dato = $this -> conexion -> extraer();
            $datos[$i] = new Proveedor ($registro[0], $registro[1], $registro[2], $registro[3], "", $registro [5]);
        }
        return $datos;
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Proveedor($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4]);
        }
        return $registros;
    }
}
?>