<?php
class Jugador{
    private $codigo;
    private $nombre_jug;
    private $usuario;
    private $saldo_actual;
    private $color;
    private $resultado;
    
    public function Jugador() {
        $this->codigo=0;
        $this->nombre_jug="";
        //etc...
    }
    //metodos get y set
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($cod){
        $this->codigo=$cod;
    }
    
    public function getNombreJugador(){
        return $this->nombre_jug;
    }
    public function setNombreJugador($nom){
        $this->nombre_jug=$nom;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($descrip){
        $this->usuario=$descrip;
    }
    
    public function getSaldoActual(){
        return $this->saldo_actual;
    }
    public function setSaldoActual($pu){
        $this->saldo_actual=$pu;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($pu){
        $this->color=$pu;
    }
    public function getResultado(){
        return $this->resultado;
    }
    public function setResultado($pu){
        $this->resultado=$pu;
    }
    
    
    
    
    
    
    
    
}




?>