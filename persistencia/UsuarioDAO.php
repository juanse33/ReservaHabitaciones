<?php
class UsuarioDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $estado;
    
    function UsuarioDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $estado="", $fecha_registro="", $fecha_actualizacion=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;   
        $this -> estado = $estado;  
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;  
      
    }
    
    function autenticar(){
       
        return "select *
                from usuario u
                where u.correo = '" . $this -> correo . "' and u.clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select *
                from usuario u
                where u.idusuario = '" . $this -> id . "'";
    }

    function consultarTodos(){
        return "select idusuario, nombre, apellido, correo ,estado
                from usuario";
    }

    function insertar(){
        return "insert into `usuario` (`id`, `nombre`, `apellido`, `correo`, `clave`,`fecha_registro`,`fecha_actualizacion`,`estado`) 
                values (NULL, '" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', MD5('" . $this -> clave . "'),'" . date('y-m-d') . "','". date('y-m-d') ."','  1')";
    }

    function existeCorreo(){
        return "select correo 
                from usuario 
                where correo = '" . $this -> correo . "'";
    }

    function cambiarEstado() {
        return "update usuario
                set estado= NOT estado 
                where idusuario ='" . $this -> id . "'";
    }
    function actualizar(){
        return "update usuario
                set nombre='" . $this-> nombre ."', apellido='". $this-> apellido . "', correo='". $this-> correo . "', fecha_actualizacion='" . date('y-m-d') . "'
                where idusuario = '" .$this -> id . "'";
    }
    
    function actualizarFecha($id){
        return "update usuario
                set fecha_actualizacion='" . date('y-m-d') . "'
                where idusuario = '" .$this -> id . "'";
    }

    function buscar($filtro){
        return "select idusuario, nombre, apellido, correo, estado, fecha_registro, fecha_actualizacion
                from usuario
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%'";  
    }

    function consultarClave(){
        return "select clave 
                from usuario";
    }
    function actualizarClave($clave){
        return "update usuario
                set clave=MD5('" . $clave. "')
                where idusuario ='" . $this->id . "'";
    }
}
?>