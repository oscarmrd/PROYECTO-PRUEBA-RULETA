<?php
include './DAOJugador.php';
$prod = new Jugador();
$dao = new DAOJugador();



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JUGADORES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="sweetalert/sweetalert2.css">
    
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="sweetalert/sweetalert2.js"></script>
    
    <script src="js/jquery.js"></script>
    <script>
    function cargar(cod,nom,desc,pu,ex){
        document.formulario.txtCodigo.value=cod;
        document.formulario.txtNombre.value=nom;
        document.formulario.txtUsuario.value=desc;         
          document.formulario.txtSaldo.value=pu;
    }
    
    
    </script>
    
    
</head>
<body>
    <div align="center">
        <h4>Formulario registro de Jugadores</h4><hr>
        <div class="form-group" style="position: relative; margin: auto; width: 500px;">
            <form method="POST" action="#" name="formulario">
                <input type="text" name="txtCodigo" value="" size="30" placeholder="Codigo"
                       class="form-control"/> 
                 <input type="text" name="txtNombre" value="" size="30" placeholder="Nombre de jugador"
                       class="form-control"/>
                 <input type="text-area"  name="txtUsuario" value="" size="30" placeholder="Usuario"
                       class="form-control"/>                 
                 <input type="text" name="txtSaldo" value="15000" size="30" placeholder="$ Saldo actual"
                       class="form-control"/>
                 
                 <br>
                 <input type="submit" value="Guardar" name="btnGuardar" class="btn-primary"/>
                 <input type="submit" value="Eliminar" name="btnEliminar" class="btn-danger"/>
                 <input type="submit" value="Modificar" name="btnModificar" class="btn-dark"/>
            </form>
            <br><br><h4>Filtrar</h4><hr>
            <div class="form-inline" style="position: relative; margin: auto; width: 600px;">
                <form method="POST" action="#" name="busqueda">
                    <input type="text" name="txtBusqueda" value="" size="10" placeholder="Buscar...?"
                           class="form-control" style="width: 250px;">
                    Buscar por:
                    <select class="form-control" name="txtCriterio" style="width: 200px;">
                        <option value="codigo">Codigo </option>
                        <option value="nombre_jug">Nombre de jugador </option>
                        <option value="usuario">Usuario </option>    
                         <option value="saldo_actual">Saldo Actual $ </option>                          
                    </select><br>
                    <input type="submit" value="Buscar" name="btnBuscar" class="btn-success"/>
                    <input type="submit" value="Reiniciar" name="btnreset" class="btn-link"/>
                    <hr>
                </form>
            </div>
                <br><br>
        </div>
        
        
    </div>
    
    
    
    <div align="center" style="position: relative; margin: auto; width: 800px;">
    <?php
    if(isset($_REQUEST["btnGuardar"])){
        $prod->setCodigo($_REQUEST["txtCodigo"]);
        $prod->setNombreJugador($_REQUEST["txtNombre"]);
        $prod->setUsuario($_REQUEST["txtUsuario"]);
        $prod->setSaldoActual($_REQUEST["txtSaldo"]);        
        $dao->insertar($prod);
        echo $dao->getTabla(); 
        
    }elseif(isset($_REQUEST["btnModificar"])){
        $prod->setCodigo($_REQUEST["txtCodigo"]);
        $prod->setNombreJugador($_REQUEST["txtNombre"]);
        $prod->setUsuario($_REQUEST["txtUsuario"]);
        $prod->setSaldoActual($_REQUEST["txtSaldo"]);        
        $dao->modificar($prod);
        echo $dao->getTabla(); 
        
    }elseif(isset($_REQUEST["btnEliminar"])){
        $codigo = $_REQUEST["txtCodigo"];
        $dao->eliminar($codigo);
        echo $dao->getTabla();
    }elseif(isset($_REQUEST["btnBuscar"])){ 
        echo $dao->getFiltro($_REQUEST["txtBusqueda"],$_REQUEST["txtCriterio"]);
    }else{
         echo $dao->getTabla();
    }
    
    
    
    
    
    
       
    ?>
    </div>
</body>
</html>