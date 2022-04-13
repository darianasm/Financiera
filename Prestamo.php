<?php

class Prestamo {

private $identificacion; 
private $codigoElectrodomestico; 
private $fechaOtorgamiento;
private $monto;
private $cantidadCuotas; 
private $tazaInteres; 
private $coleccionCuotas; 
private $referenciaPersona; // que solicito el préstamo.

public function  __construct($id, $monto, $cantCuotas, $interes, $objPersona){
    // Metodo constructor de la clase Prestamo
    $this->identificacion = $id;
    $this->codigoElectrodomestico = 0;
    $this->fechaOtorgamiento = " ";
    $this->monto = $monto;
    $this->cantidadCuotas = $cantCuotas;
    $this->tazaInteres = $interes;
    $this->coleccionCuotas = [];
    $this->referenciaPersona = $objPersona;
}

public function getIdentificacion(){
return $this->identificacion;
}
public function setIdentificacion($identificacion){
$this->identificacion = $identificacion;
}
public function getCodigoElectrodomestico(){
return $this->codigoElectrodomestico;
}
public function setCodigoElectrodomestico($codigoElectrodomestico){
$this->codigoElectrodomestico = $codigoElectrodomestico;
}
public function getFechaOtorgamiento(){
return $this->fechaOtorgamiento;
} 
public function setFechaOtorgamiento($fechaOtorgamiento){
$this->fechaOtorgamiento = $fechaOtorgamiento;
}
public function getMonto(){
return $this->monto;
} 
public function setMonto($monto){
$this->monto = $monto;
}
public function getCantidadCuotas(){
return $this->cantidadCuotas;
}
public function setCantidadCuotas($cantidadCuotas){
$this->cantidadCuotas = $cantidadCuotas;
}
public function getTazaInteres(){
return $this->tazaInteres;
}
public function setTazaInteres($tazaInteres){
$this->tazaInteres = $tazaInteres;
}
public function getColeccionCuotas(){
return $this->coleccionCuotas;
}
public function setColeccionCuotas($coleccionCuotas){
$this->coleccionCuotas = $coleccionCuotas;
}
public function getReferenciaPersona(){
return $this->referenciaPersona;
}
public function setReferenciaPersona($referenciaPersona){
$this->referenciaPersona = $referenciaPersona;
}

public function __toStringCuotas(){
$cuotas = $this->getColeccionCuotas();
$stringCuotas = "";

for($i = 0;$i<count($cuotas);$i++){
    for($x = 0; $x < count($cuotas[$i]);$x++){
$stringCuotas = $stringCuotas.$cuotas[$i][$x];
}}
return $stringCuotas;
}

public function __toString(){
return "Identificación: ".$this->getIdentificacion().
       "\nCódigo de electrodoméstico: ".$this->getCodigoElectrodomestico().
       "\nFecha de Otorgamiento: ".$this->getFechaOtorgamiento().
       "\nMonto: ".$this->getMonto().
       "\nCantidad de Cuotas: ".$this->getCantidadCuotas().
       "\nTaza de Interés: ".$this->getTazaInteres().
       "\nCuotas:\n".$this->__toStringCuotas().
       "\nDatos de la persona que solicitó el préstamo: \n".$this->getReferenciaPersona()."\n";
}

private function calcularInteresPrestamo($numCuota){

$cantCuotas = $this->getCantidadCuotas();
$montoTotal = $this->getMonto();
$interes = $this->getTazaInteres();

$interesCuota = ($montoTotal-(($montoTotal/$cantCuotas)*$numCuota))*$interes;

return $interesCuota;
}

public function otorgarPrestamo(){

$this->setFechaOtorgamiento(date("d")."/".date("m")."/".date("y"));

$cantCuotas = $this->getCantidadCuotas();
$montoTotal = $this->getMonto();

for($i = 0; $i<$cantCuotas; $i++){
$cuota = new Cuota($i+1,$montoTotal/$cantCuotas,$this->calcularInteresPrestamo($i));
$this->agregarCuotaColeccion($cuota);
}

}

public function agregarCuotaColeccion($cuota){
$cuotas = $this->getColeccionCuotas();

array_push($cuotas,$cuota);
$this->setColeccionCuotas($cuotas);

}

public function darSiguienteCuotaPagar(){
$cuotas = $this->getColeccionCuotas();
$cuotaPagar = 0;

while($cuotas[$cuotaPagar]->getCancelada() && $cuotaPagar != count($cuotas)){
    $cuotaPagar++;
}
if($cuotaPagar ==  count($cuotas)){
    $cuotaPagar = null;
}

return $cuotaPagar;
}
}


?>