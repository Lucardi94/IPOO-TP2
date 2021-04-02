<?php
    include 'PersonaMod.php';
    include 'Libro.php';
    include 'LecturaMod.php';

    $p1 = new Persona("Lucas", "Alvarado", "DNI", 38101883,null);
    $p2 = new Persona("Tristan", "Markivic", "DNI", 123123123,null);

    $l1 = new Libro("AS", "Moster cni", 1990, "Menoyo", $p1, 1000, "Es muy buenoooo");    
    $l2 = new Libro("DC", "Pumper Nick", 1990, "Raloyo", $p2, 2000, "No eeeesta tan bueno");    
    $l3 = new Libro("FS", "Maconaldo", 2010, "cuscoyo", $p1, 3000, "Regular");

    $lec1 = new Lectura($l1, 999, FALSE);
    $lec2 = new Lectura($l2, 1, TRUE);
    $lec3 = new Lectura($l3, 1, TRUE);

    $listLectura = [$lec1, $lec2, $lec3];

    $lector = new Persona("Matias", "Jeszenszky" , "LC", 38101999,$listLectura);

    //echo $lector;

    /*if ($lector->libroLeido("Moster cni")){
        echo "\nLo leiste";
    } else echo "\nNo esta";
    if ($lector->libroLeido("Pumper Nick")){
        echo "\nLo leiste";
    } else echo "\nNo esta";*/

    /*foreach($lector->darLibrosPorAutor("Lucas") as $libro){
        echo "\n".$libro;
    }*/

    foreach($lector->leidosAnioEdicion(1990) as $libro){
        echo "\n".$libro;
    }

    //echo $lector->darSinopsis("Moster cni");


