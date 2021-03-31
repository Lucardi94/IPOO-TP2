<?php
        include 'Persona.php';
        include 'Libro.php';
        include 'Lectura.php';

        $p = new Persona("Lucas", "Alvarado", "DNI", 38101883);
        $l = new Libro("asdasd", "La vela sucia", 1990, "Menoyo", $p, 1000, "Es muy buenoooo");
        
        $lecUno = new Lectura($l, 999);
        $lecDos = new Lectura($l, 1);

        echo $lecUno->siguientePagina()."\n";
        echo $lecUno->siguientePagina()."\n";

        echo $lecDos->retrocederPagina()."\n";
        echo $lecDos->retrocederPagina()."\n";

        echo $lecUno->irPagina(99)."\n";
        echo $lecUno->irPagina(10000)."\n";

