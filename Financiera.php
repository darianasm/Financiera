<?php

class Financiera{

private $denominacion;
private $direccion; 
private $coleccionPrestamosOtorgados; 
  
public function  __construct($denom, $dire){

    $this->denominacion = $denom;
    $this->direccion = $dire;
    $this->coleccionPrestamosOtorgados = [];
    
}

public function getDenominacion(){
return $this->denominacion;
}
public function setDenominacion($denominacion){
$this->denominacion = $denominacion;
}
public function getDireccion(){
return $this->direccion;
}
public function setDireccion($direccion){
$this->direccion = $direccion;
}
public function getColeccionPrestamosOtorgados(){
return $this->coleccionPrestamosOtorgados;
}
public function setColeccionPrestamosOtorgados($coleccionPrestamosOtorgados){
$this->coleccionPrestamosOtorgados = $coleccionPrestamosOtorgados;
}

public function __toString(){
    return "Denominación: ".$this->getDenominacion().
           "\nDirección: ".$this->getDireccion().
           "\nPrestamos Otorgados: ".$this->stringPrestamos()."\n";
}

public function incorporarPrestamo($nuevoPrestamo){
$prestamos = $this->getColeccionPrestamosOtorgados();
    array_push($prestamos,$nuevoPrestamo);
    $this->setColeccionPrestamosOtorgados($prestamos);
}

public function stringPrestamos(){
    $string = "\n";
    $prestamos = $this->getColeccionPrestamosOtorgados();
    for($i = 0; $i<count($prestamos); $i++){
        $string = $string.$prestamos[$i]->__toString();
    }
return $string;
}

public function otorgarPrestamoSiCalifica(){

$prestamos = $this->getColeccionPrestamosOtorgados();

for($i = 0; $i < count($prestamos); $i++){
    if(count($prestamos[$i]->getColeccionCuotas())==0 && ($prestamos[$i]->getMonto()/$prestamos[$i]->getCantidadCuotas()) < (40*$prestamos[$i]->getReferenciaPersona()->getNetoPersona())/100){
            
            $prestamos[$i]->otorgarPrestamo();
            $this->incorporarPrestamo($prestamos[$i]);
        }
    }
}


public function informarCuotaPagar($idPrestamo){
$indiceCuotaPagar = null;
$prestamo = $this->getColeccionPrestamosOtorgados();
$i=0;
    while($prestamo[$i]->getIdentificacion()!= $idPrestamo && $i!=count($prestamo)){
        $i++;
    }    
    if($prestamo[$i]->getIdentificacion() == $idPrestamo && count($prestamo[$i]->getColeccionCuotas())!=0){
    $indiceCuotaPagar = $prestamo[$i]->darSiguienteCuotaPagar($idPrestamo);
    } 

return $indiceCuotaPagar;
}
}
?>