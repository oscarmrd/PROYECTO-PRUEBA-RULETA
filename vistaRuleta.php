<?php
include 'DAOJugador.php';
$prod = new Jugador();
$dao = new DAOJugador();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juego de la Ruleta</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="icon" href="data:,">
  
</head>

<body>
  <div id="premio">

      
    <table style=" margin: 0 auto;">
      <tr>
        <td>
          <p class="elije">SIMULACIÒN RULETA:</p>
        </td>
        <td><img src="image/cortesia.png" class="imgSorpresa"></td>

      </tr>
      <tr>
        <td>
          <!--<p class="contador">T: 0</p>-->
        </td>
      </tr>
      <tr>
          <td>    
            <?php
           // echo $dao->getTablaApuesta();            
            ?>
              
          <td>
      </tr>
    </table>

  </div>

  <div class="vara"></div>
  <div>
    <img src="image/imagen.png" id="ruleta">
  </div>
  <div>
    <div id="sonido" style="display: none;">
      <iframe src="sonido/ruleta.mp3" id="audio"></iframe>

    </div>
  </div>
  
 
  <script src="js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="js/script.js"></script>
</body>

</html>
