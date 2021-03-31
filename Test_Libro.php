<?php
    include 'Persona.php';
    include 'Libro.php';

    $p = new Persona("Lucas", "Alvarado", "DNI", 38101883);
    $l = new Libro("asdasd", "La vela sucia", 1990, "Menoyo", $p, 1000, "Es muy buenoooo");

    $s = new Persona("Matias", "Jeszenszky", "LC", 24861861);

    $l->setSbn("Lo Cambie");
    $l->setTitulo("La Vela Limpia");
    $l->setAnioEdicion(2000);
    $l->setEditorial("Mamoyo");
    $l->setAutor($s);
    $l->setCantidadPagina(2000);
    $l->setSinopsis("No esta tan bueno");

    echo $l;


