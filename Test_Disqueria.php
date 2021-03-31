<?php
    include 'Disquera.php';
    include 'Persona.php';

    $apertura = array ("hora" => 8, "minuto" => 30);
    $cierre = array ("hora" => 21, "minuto" => 30);

    $p = new Persona("Lucas", "Alvarado", "DNI", 38101883);
    $d = new Disquera($apertura, $cierre, FALSE, "Mitre 123", $p);

    echo $d."\n\n";

    $d->abrirDisquera(7, 28);
    echo $d."\n\n";

    $d->abrirDisquera(7, 31);
    echo $d."\n\n";

    $d->cerrarDisquera(22, 29);
    echo $d."\n\n";
    $d->cerrarDisquera(22, 32);
    echo $d."\n\n";