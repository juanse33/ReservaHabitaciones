<?php
class HabitacionDAO {
    private $idhabitacion;
    private $numero;
    private $idhotel;
    private $num_personas;
    private $precio;

    
    function HabitacionDAO($idhabitacion="", $numero="", $idhotel="", $num_personas="", $precio=""){
        $this -> idhabitacion = $idhabitacion;
        $this -> numero = $numero;
        $this -> idhotel = $idhotel;
        $this -> num_personas = $num_personas;
        $this -> precio = $precio;       
    }    
    
    function consultarTodos(){        
        return "select *
                from habitacion 
                where idhotel = '" . $this -> idhotel . "'";
    }    

    function insertar(){
        return "insert into habitacion(numero, idhotel, num_personas, precio) 
                values('" . $this -> numero . "', '" . $this -> idhotel."', '"
                . $this -> num_personas . "', '" . $this-> precio . "')";
    }

    function consultarCapacidad(){        
        return "select *
                from habitacion 
                where idhotel = '" . $this -> idhotel . "' and num_personas= '". $this -> num_personas ."'";
    }    

   

}
?>