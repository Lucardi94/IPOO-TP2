<?php
include 'CuentaBancaria.php';
include 'Persona.php';

$p = new Persona("Lucas", "Alvarado", "DNI", 38101883);
$c = new CuentaBancaria(1,$p,1000,3);
echo $p."\n";
echo $c;