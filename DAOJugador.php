<?php
include 'credenciales.php';
include 'Jugador.php';

class DAOJugador {
    private $con;
    
    public function __construct() {
        
    }
    public function conectar(){
        try {
             $this->con= new mysqli(SERVIDOR, USUARIO, CONTRA,BD) or die ("Error al conectar");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
  
    }
    public function desconectar(){
        $this->con->close();
    }
    public function getTabla(){
        $sql ="select * from jugador";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th width='20%'>CODIGO</th>"
                    . "<th width='20%'>NOMBRE JUGADOR</th>"
                    . "<th width='20%'>USUARIO</th>"
                    . "<th width='20%'>SALDO ACTUAL ($)</th>"                    
                    . "<th>ACCION</th>"
                . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<tr>"
                        . "<td>".$fila["codigo"]."</td>"
                        . "<td>".$fila["nombre_jug"]."</td>"
                        . "<td>".$fila["usuario"]."</td>"
                        . "<td>".$fila["saldo_actual"]."</td>"                        
                        . "<td><a href=\"javascript:cargar('".$fila["codigo"]."','".$fila["nombre_jug"]."','".$fila["usuario"]."','".$fila["saldo_actual"]."')\">Seleccionar</a></td>"
                    . "</tr>";  
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
    
    public function getTablaApuesta(){
        $sql ="select * from jugador";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th width='30%'>Usuario</th>"
                    . "<th width='30%'>Apuesta ($)</th>"                    
                    . "<th>Color</th>"
                   
                . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            if($fila["saldo_actual"]>1000){
                $tabla .= "<tr>"                    
                        . "<td>".$fila["usuario"]."</td>"
                        . "<td>".$fila["saldo_actual"]*0.12."</td>"
                        . "<td>".$fila["color"]."</td>"
                        
                        . "</tr>";  
            }    
            else if($fila["saldo_actual"]>0 && $fila["saldo_actual"]<=1000){
                $tabla .= "<tr>"                    
                        . "<td>".$fila["usuario"]."</td>"
                        . "<td>".$fila["saldo_actual"]."</td>"
                        . "<td>".$fila["color"]."</td>"
                        
                        . "</tr>";  
            }    
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
    
    public function insertar($obj){
        $prod = new Jugador();
        $prod = $obj;
        $sql="insert into jugador values(".$prod->getCodigo().",'".$prod->getNombreJugador()."','".$prod->getUsuario()."',".$prod->getSaldoActual().",'".$prod->getUsuario()."',".$prod->getSaldoActual().")";
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo insertar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function modificar($obj){
        $prod = new Jugador();
        $prod = $obj;
        $sql="update jugador set nombre_jug='".$prod->getNombreJugador()."',usuario='".$prod->getUsuario()."',saldo_actual=".$prod->getSaldoActual()." where codigo=".$prod->getCodigo();
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo modificar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function modificarApuesta($premio){
        $sql ="select * from jugador";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        
        $tabla = "<table class='table' align=center>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr><th align=center COLSPAN=4>RESULTADOS DE APUESTAS</th></tr>"
                    . "<th width='10%'>Usuario</th>"              
                    . "<th width='25%'>Nombre</th>"
                    . "<th width='10%'>Aposto a</th>"
                    . "<th width='15%'>Apuesta ($)</th>"                    
                    . "<th width='15%'>Total Premio</th></tr>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $cod=$fila["codigo"];   
            $usu=$fila["usuario"];   
            $nom=$fila["nombre_jug"];  
            $col=$fila["color"];   
            $aposto=$fila["saldo_actual"]*0.12;
           
            if($fila["color"]==$premio){              
                 if('Rojo'==$premio || 'Negro'==$premio)              
                       $cantpremio=2;        
                 else
                       $cantpremio=10;
                  
                 $totalpremio=$aposto*$cantpremio;
                 $totalpremio= round($totalpremio);
                 $saldo=$fila["saldo_actual"]+($totalpremio);
                 $saldo=$saldo-$aposto;
                 
                 $tabla .= "<tr>"
                        . "<td>".$usu."</td>"
                        . "<td>".$nom."</td>"
                        . "<td>".$aposto."</td>"
                        . "<td>".$col."</td>"
                        . "<td>".$totalpremio."</td>"                        
                    . "</tr>";  
            }
            else{
                if($fila["saldo_actual"]>1000)
                 $saldo=$fila["saldo_actual"]-$aposto;
                else
                 $saldo=0;  
                $totalpremio=0;
                if($aposto>0){              
                    $tabla .= "<tr>"
                        . "<td>".$usu."</td>"
                        . "<td>".$nom."</td>"
                        . "<td>".$aposto."</td>"
                        . "<td>".$col."</td>"
                        . "<td>".$totalpremio."</td>"                        
                    . "</tr>";  
                }
            }
            $saldo= round($saldo);
            $sql="update jugador set saldo_actual=".$saldo.", resultado=".$totalpremio."  where codigo=".$cod;
            $this->conectar();
            $this->con->query($sql);
            
        }
                
        //echo "Codigo=".$sql="update jugador set saldo_actual=".$saldo." where codigo=".$cod;
        //$this->conectar();
        /*if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue insetado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo modificar',type:'error'});</script>";
        }*/
        $this->desconectar();
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
    
    public function eliminar($codigo){
        $sql="delete from jugador where codigo=$codigo";
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue eliminado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo eliminar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function getFiltro($buscar, $criterio){
        $sql ="select * from jugador where $criterio like '%$buscar%'";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th>CODIGO</th>"
                    . "<th>NOMBRE JUGADOR</th>"
                    . "<th>USUARIO</th>"
                    . "<th>SALDO ACTUAL ($)</th>"                    
                    . "<th>ACCION</th>"
                . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<tr>"
                        . "<td>".$fila["codigo"]."</td>"
                        . "<td>".$fila["nombre_jug"]."</td>"
                        . "<td>".$fila["usuario"]."</td>"
                        . "<td>".$fila["saldo_actual"]."</td>"                        
                        . "<td><a href=\"javascript:cargar('".$fila["codigo"]."','".$fila["nombre_jug"]."','".$fila["usuario"]."','".$fila["saldo_actual"]."')\">Select</a></td>"
                    . "</tr>";  
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
 
 
}
?>
