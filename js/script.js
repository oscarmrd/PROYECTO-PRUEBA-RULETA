const ruleta = document.querySelector('#ruleta');

var boton = document.getElementById('boton');
var ver = document.getElementById('ver');

//ruleta.addEventListener('click', girar);
setInterval(girar, 180000);
giros = 0;
function girar(){
  if (giros < 99999999) {
    let rand = Math.random() * 7200;
    calcular(rand);
    giros++;
    var sonido = document.querySelector('#audio');
    sonido.setAttribute('src', 'sonido/ruleta.mp3');
   /// document.querySelector('.contador').innerHTML = 'TURNOS: ' + giros; 
  }else{
    Swal.fire({
      icon: 'success',
      title: 'VUELVA PRONTO EL JUEGO TERMINO!!',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Aceptar',
      allowOutsideClick: false
    }).then((result)=>{
      if (result.value == true) {
        giros = 0;
         //document.querySelector('.elije').innerHTML = 'TU CORTESIA ES: ';
         //document.querySelector('.contador').innerHTML = 'TURNOS: ' + giros;        
      }
    })
  }

function premio(premios){

  document.querySelector('.elije').innerHTML = 'El color ganador es: ' + premios;
  //alert("hola"+premios);
 
  ventana=open("vistaRuletaActualizar.php?premios="+premios,"reportes_ventana","scrollbars=yes,resizable=yes,toolbar=no,directories=no,menubar=no,width=420,height=310,Titlebar=RULETA,top=180,left=10");
  ventana.focus();  
  
  //document.write("<meta http-equiv='Refresh' content='0;URL=hhtp://localhost:3001/juego-ruleta-main/vistaRuleta.php?'premios="+premios+">");
}


 function calcular(rand) {

  valor = rand / 360;
  valor = (valor - parseInt(valor.toString().split(".")[0]))* 360;
  ruleta.style.transform = "rotate("+rand+"deg)";
  //vlr=9.72972972973;
  vlr=9.47368421053;
  //vlr=4.86486486486;
  //vlr=75;
  setTimeout(() => {
  switch (true) {   
   
     case valor > 0 && valor <= vlr*1:
     premio("Verde");
     break;
     case (valor > vlr*1 && valor <= vlr*2) || (valor > vlr*3 && valor <= vlr*4) || (valor > vlr*5 && valor <= vlr*6) || (valor > vlr*7 && valor <= vlr*8) || (valor > vlr*9 && valor <= vlr*10) || (valor > vlr*11 && valor <= vlr*12) || (valor > vlr*13 && valor <= vlr*14) || (valor > vlr*15 && valor <= vlr*16) || (valor > vlr*17 && valor <= vlr*18) || (valor > vlr*19 && valor <= vlr*20) || (valor > vlr*21 && valor <= vlr*22) || (valor > vlr*23 && valor <= vlr*24) || (valor > vlr*25 && valor <= vlr*26) || (valor > vlr*27 && valor <= vlr*28) || (valor > vlr*29 && valor <= vlr*30) || (valor > vlr*31 && valor <= vlr*32) || (valor > vlr*33 && valor <= vlr*34) || (valor > vlr*35 && valor <= vlr*36) || (valor > vlr*37 && valor <= vlr*38):
     premio("Negro");
     break;
     case (valor > vlr*2 && valor <= vlr*3) || (valor > vlr*4 && valor <= vlr*5) || (valor > vlr*6 && valor <= vlr*7) || (valor > vlr*8 && valor <= vlr*9) || (valor > vlr*10 && valor <= vlr*11) || (valor > vlr*12 && valor <= vlr*13) || (valor > vlr*14 && valor <= vlr*15) || (valor > vlr*16 && valor <= vlr*17) || (valor > vlr*18 && valor <= vlr*19) || (valor > vlr*20 && valor <= vlr*21) || (valor > vlr*22 && valor <= vlr*23) || (valor > vlr*24 && valor <= vlr*25) || (valor > vlr*26 && valor <= vlr*27) || (valor > vlr*28 && valor <= vlr*29) || (valor > vlr*30 && valor <= vlr*31) || (valor > vlr*32 && valor <= vlr*33) || (valor > vlr*34 && valor <= vlr*35) || (valor > vlr*36 && valor <= vlr*37):
     premio("Rojo");
     break;
    
  }

 }, 5000);

}
}
