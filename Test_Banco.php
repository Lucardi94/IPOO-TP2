<?php
    include 'Mostrador.php';
    include 'Tramite.php';
    include 'Cliente.php';
    include 'Banco.php';
    
    $t1 = new Tramite("Judicial",18,0);
    $t2 = new Tramite("Perito",19,0);

    $c1 = new Cliente("pepe", "grillo", "LC", 90987987,$t1);
    $c2 = new Cliente("roberto", "emilio", "LC", 12312313,$t2);
    $listaCliente1 = [$c1, $c2, $c1, $c1];
    $listaCliente2 = [$c1, $c2];
    $listaCliente3 = [$c1, $c2, $c1];

    $m1 = new Mostrador(array ("Judicial", "Perito"), $listaCliente1, 8);
    $m2 = new Mostrador(array ("Judicial", "Perrunos"), $listaCliente2, 2);
    $m3 = new Mostrador(array ("Judicial"), $listaCliente3, 4);
    $listaMostrador = [$m1, $m2, $m3];
    $b = new Banco($listaMostrador);

    $t4 = new Tramite("asdsada",0,0);
    $c4 = new Cliente("Raul", "Gomerales", "DNI",8900989, $t4);
    
    echo $b->atender($c4);
    echo "\n".$b;
    
    /*if ($m1->atiende("Per")){
        echo "si atiende";
    } else echo "no atiende";*/

    /*foreach ($b->mostradoresQueAtienden("Perrunos") as $mostrador){
        echo $mostrador;
    }*/

    //echo $b->mejorMostradorPara("Judicial");