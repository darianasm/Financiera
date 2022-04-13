<?php

class Persona{

private $nombrePersona;
private $apellidoPersona;
private $dniPersona;
private $direccionPersona;
private $mailPersona;
private $telefonoPersona;
private $netoPersona;

public function  __construct($nombre, $apellido, $dni,$direccion,$mail,$telefono,$neto){
    // Metodo constructor de la clase Persona
    $this->nombrePersona = $nombre;
    $this->apellidoPersona = $apellido;
    $this->dniPersona = $dni;
    $this->direccionPersona = $direccion;
    $this->mailPersona = $mail;
    $this->telefonoPersona = $telefono;
    $this->netoPersona = $neto;
}

public function getNombrePersona(){
return $this->nombrePersona;
}
public function setNombrePersona($nombrePersona){
$this->nombrePersona = $nombrePersona;
}
public function getApellidoPersona(){
return $this->apellidoPersona;
}
public function setApellidoPersona($apellidoPersona){
$this->apellidoPersona = $apellidoPersona;
}
public function getDniPersona(){
return $this->dniPersona;
} 
public function setDniPersona($dniPersona){
$this->dniPersona = $dniPersona;
}
public function getDireccionPersona(){
return $this->direccionPersona;
} 
public function setDireccionPersona($direccionPersona){
$this->direccionPersona = $direccionPersona;
}
public function getMailPersona(){
return $this->mailPersona;
}
public function setMailPersona($mailPersona){
$this->mailPersona = $mailPersona;
}
public function getTelefonoPersona(){
return $this->telefonoPersona;
}
public function setTelefonoPersona($telefonoPersona){
$this->telefonoPersona = $telefonoPersona;
}
public function getNetoPersona(){
return $this->netoPersona;
}
public function setNetoPersona($netoPersona){
$this->netoPersona = $netoPersona;
}
public function __toString(){
return "Nombre: ".$this->getNombrePersona().
       "\nApellido: ".$this->getApellidoPersona().
       "\nDNI: ".$this->getDniPersona().
       "\nDirección: ".$this->getDireccionPersona().
       "\nMail: ".$this->getMailPersona().
       "\nTeléfono: ".$this->getTelefonoPersona().
       "\nNeto: ".$this->getNetoPersona()."\n";
}
}
?>