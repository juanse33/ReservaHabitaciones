<?php
class ReservaDAO{

    private $fecha_entrada;
    private $fecha_salida;
    private $num_personas;
    private $idusuario;
    private $idhotel;
    private $precio;


    function ReservaDAO($fecha_entrada="", $fecha_salida="", $num_personas="", $idusuario="", $idhotel="", $precio=""){
        $this -> fecha_entrada = $fecha_entrada;
        $this -> fecha_salida = $fecha_salida;
        $this -> num_personas = $num_personas;
        $this -> idusuario = $idusuario;
        $this -> idhotel = $idhotel;
        $this -> precio = $precio;
    }

    function consultarDisponibilidad(){        
        return "select *
                from reserva
                where idhotel = '" . $this -> idhotel . "' and num_personas= '". $this -> num_personas ."' and fecha_entrada= '". $this -> fecha_entrada ."' and fecha_salida= '". $this -> fecha_salida ."'";
    } 

    function insertar(){
        return "insert into reserva(fecha_entrada, fecha_salida, num_personas, idusuario, idhotel, precio) 
                values('" . $this -> fecha_entrada . "', '" . $this -> fecha_salida . "', '" . $this -> num_personas . "'
                ,'". $this -> idusuario  ."', '" . $this -> idhotel .  "', '". $this -> precio . "')";
    } 

    function consultarTodosUs(){        
        return "select *
                from reserva 
                where idusuario = '" . $this -> idusuario . "'";
    } 

    function consultarTodosProv(){        
        return "select *
                from reserva 
                where idusuario = '" . $this -> idhotel . "'";
    } 

    function consultar(){        
        return "select *
                from reserva 
                where idhotel = '" . $this -> idhotel . "' and num_personas = '". $this -> num_personas ."'";
    } 

    function buscar($filtro){
        return "select *                
                from reserva
                where idusuario in (select idusuario from usuario where nombre like '" . $filtro . "%' or apellido like'" . $filtro . "')";
                
    }
    
} 
?>

