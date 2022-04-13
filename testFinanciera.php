<?php

include "Financiera.php";
include "Prestamo.php";
include "Persona.php";
include "Cuota.php";


$financiera = new Financiera ("Money", "Av. Argentina 1234");

$persona1 = new Persona("Pepe","Flores",0,"Bs As 12", "dir@mail.com" , 299444567, 40000);
$persona2 = new Persona("Luis","Suarez",0,"Bs As 123", "dir@mail.com" , 2994455, 4000);
$persona3 = new Persona("Luis","Suarez",0,"Bs As 123", "dir@mail.com" , 299444567, 40000);

$prestamo1 = new Prestamo(1,50000,5,0.1,$persona1);
$prestamo2 = new Prestamo(2,10000,4,0.1,$persona2);
$prestamo3 = new Prestamo(3,10000,2,0.1,$persona3);

$financiera->incorporarPrestamo($prestamo1);
$financiera->incorporarPrestamo($prestamo2);
$financiera->incorporarPrestamo($prestamo3);

$financiera->otorgarPrestamoSiCalifica();

$objCuota = $financiera->informarCuotaPagar(1);

echo $objCuota."\n";

print_r($financiera->getColeccionPrestamosOtorgados()[2]->getColeccionCuotas()[$objCuota]->darMontoFinalCuota());

?>