<?php
include 'DAOJugador.php';
$prod = new Jugador();
$dao = new DAOJugador();

    $premio=$_GET['premios'];    
    echo $dao->modificarApuesta($premio); 
    /*
    $salida="recargar.txt";
    $f=fopen($salida,"w+");
    fputs($f,"1,2");
    fclose($f);    
     * */
     

?>
<!--
<script>
    //window.opener.location.reload();
    //close();
</script>


<script>document.querySelector('.elije').innerHTML = 'El color es: ' + premios;</script>
<html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
</head>
<body>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3>Cabecera de la ventana</h3>
           </div>
           <div class="modal-body">
              <h4>Texto de la ventana</h4>
              <?php
                  $premio=$_GET['premios'];    
                  echo $dao->modificarApuesta($premio); 
              ?>
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
</body>
</html>

-->