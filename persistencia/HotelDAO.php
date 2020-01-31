<?php
class HotelDAO {
    private $id;
    private $nombre;
    private $direccion;
    private $correo;
    private $idproveedor;
    private $idciudad;
 
  
    function HotelDAO($id="", $nombre="", $direccion="", $correo="", $idproveedor="", $idciudad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> correo = $correo;
        $this -> idproveedor = $idproveedor;
        $this -> idciudad = $idciudad;
    }  
    
    function consultar(){        
        return "select *
                from hotel h
                where h.idhotel = '" . $this -> id . "'";
    }        
              
    function insertar(){
        return "insert into hotel(nombre, direccion, correo, idproveedor, idciudad) 
                values('" . $this -> nombre . "', '" . $this -> direccion . "', '" . $this -> correo . "'
                ,'". $this -> idproveedor  ."', '" . $this -> idciudad .  "')";
    }   
    
    function existeCorreo(){
        return "select correo 
                from hotel 
                where correo = '" . $this -> correo . "'";
    }

    function buscar($filtro){
        return "select idhotel, nombre, direccion, correo, idproveedor, idciudad
                from hotel
                where nombre like '" . $filtro . "%'";
                
    }

    function buscarProveedor($filtro){
        return "select idhotel, nombre, direccion, correo, idproveedor, idciudad
                from hotel
                where nombre like '" . $filtro . "%' and idproveedor='". $this -> idproveedor ."'";
                
    }
 
    function consultarTodos(){
        return "select *
                from hotel
                where idciudad='". $this -> idciudad ."'";
    } 

}
?>
