<?php

class Cuota{
    
private $numero;
private $montoCuota; 
private $montoInteres; 
private $cancelada;// (atributo que va a contener un valor true, si la cuota esta paga y false en caso contrario)
  
public function  __construct($nro, $cuota, $interes){

    $this->numero = $nro;
    $this->montoCuota = $cuota;
    $this->montoInteres = $interes;
    $this->cancelada = false;
    
}

public function getNumero(){
return $this->numero;
}
public function setNumero($numero){
$this->numero = $numero;
}
public function getMontoCuota(){
return $this->montoCuota;
}
public function setMontoCuota($montoCuota){
$this->montoCuota = $montoCuota;
}
public function getMontoInteres(){
return $this->montoInteres;
}
public function setMontoInteres($montoInteres){
$this->montoInteres = $montoInteres;
}
public function getCancelada(){
return $this->cancelada;
}
public function setCancelada($cancelada){
$this->cancelada = $cancelada;
}

public function __toString(){
    return "<<<<<Número de cuota: ".$this->getNumero().">>>>>".
           "\nMonto de la cuota: ".$this->getMontoCuota().
           "\nMonto de interés: ".$this->getMontoInteres().
           "\nCancelado: ".$this->getCancelada()."\n";
}

public function darMontoFinalCuota(){
    $importeTotal = $this->getMontoCuota() + $this->getMontoInteres();
    return $importeTotal;
}

}
?>