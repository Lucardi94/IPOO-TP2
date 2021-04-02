<?php
    include 'Mostrador.php';
    include 'Tramite.php';
    include 'Cliente.php';
    
    $listaTramites = array ("Judicial", "Perito");

    $t1 = new Tramite("Judicial",18,0);
    $t2 = new Tramite("Perito",19,0);

    $c1 = new Cliente("pepe", "grillo", "LC", 90987987,$t1);
    $c2 = new Cliente("roberto", "emilio", "LC", 12312313,$t2);
    $listaCliente = [$c1, $c2];

    $m1 = new Mostrador($listaTramites, $listaCliente, 8);
    echo $m1; 
