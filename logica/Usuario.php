<?php
require 'persistencia/UsuarioDAO.php';
class Usuario extends Persona{
    private $conexion;
    private $usuarioDAO;
    private $fecha_registro;
    private $fecha_actualizacion;
    
    function Usuario($id="", $nombre="", $apellido="", $correo="", $clave="", $estado="", $fecha_registro="", $fecha_actualizacion=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave, $estado);      
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($id, $nombre, $apellido, $correo, $clave, $estado,$fecha_registro, $fecha_actualizacion);
    }

    function getFechaRegistro(){
        return $this -> fecha_registro;
    }

    function getFechaActualizacion(){
        return $this -> fecha_actualizacion;
    }
    

    function autenticar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> estado = $registro[5];
        $this -> fecha_registro = $registro[6];
        $this -> fecha_actualizacion = $registro[7];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar ($this -> usuarioDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Usuario($registro[0], $registro[1], $registro[2], $registro[3], "" ,$registro[4]);
        }
        return $registros;
    }

    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> usuarioDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }

    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> usuarioDAO -> actualizar());
        $datos = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $dato = $this -> conexion -> extraer();
            $datos[$i] = new Usuario($registro[0], $registro[1], $registro[2],$registro[3]);
        }
        return $datos;
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();           
            $registros[$i] = new Usuario($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4],$registro[5],$registro[6]);
        }
        return $registros;
        }

    function consultarClave(){
            $this -> conexion -> abrir();
            $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarClave());
            $registro = $this -> conexion -> extraer();
            $this -> clave = $registro[0];
            $this -> conexion -> cerrar();
            return $this -> clave;
        }

        
    function actualizarClave($clave){
            $this -> conexion -> abrir();
            $this -> conexion -> ejecutar($this -> usuarioDAO -> actualizarClave($clave));
            $this -> conexion -> cerrar();
    }

    function actualizarFecha($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> actualizarFecha($id));
        $this -> conexion -> cerrar();

}

}
?>