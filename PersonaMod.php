<?php
    class Persona{
        /***
         * Representacion de la clase Persona.
         *  - Atributos
         *      + nombre
         *      + apellido
         *      + tipoDocumento
         *      + númeroDocumento
         *  - Funciones
         *      + libroLeido($titulo): retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del conjunto de libros leídos y false en caso contrario.
         *      + darSinopsis($titulo): retorna la sinopsis del libro cuyo título se recibe por parámetro.
         *      + leidosAnioEdicion($x): que retorne todos aquellos libros que fueron leídos y su año de edición es un año X recibido por parámetro.
         *      + darLibrosPorAutor($nombreAutor): retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro.
         */
        private $nombre;
        private $apellido;
        private $tipoDocumento;
        private $numeroDocumento;
        private $listaObjLectura;

        public function __construct($nom, $ape, $tipDoc, $nroDoc, $lisObjL )
        {
            $this->nombre = $nom;
            $this->apellido = $ape;
            $this->tipoDocumento = $tipDoc;
            $this->numeroDocumento = $nroDoc;
            $this->listaObjLectura = $lisObjL;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getTipoDocumento(){
            return $this->tipoDocumento;
        }
        public function getNumeroDocumento(){
            return $this->numeroDocumento;
        }
        public function getListaObjLectura(){
            return $this->listaObjLectura;
        }

        public function setNombre($nNom){
            $this->nombre = $nNom;
        }
        public function setApellido($nApe){
            $this->apellido = $nApe;
        }
        public function setTipoDocumento($nTipD){
            $this->tipoDocumento = $nTipD;
        }
        public function setNumeroDocumento($nNumD){
            $this->numeroDocumento = $nNumD;
        }
        public function setListaObjLectura($nLisOL){
            $this->listaObjLectura = $nLisOL;
        }

        public function libroLeido($titulo){
            $listaLectura = $this->getListaObjLectura();
            $leido = FALSE;
            $i=0;

            while ($i<count($listaLectura) && !$leido){
                if ($listaLectura[$i]->getObjLibro()->getTitulo() == $titulo && $listaLectura[$i]->getTerminado()){
                    $leido = TRUE;
                }
                $i++;
            }
            return $leido;
        }

        public function darSinopsis($titulo){
            $listaLectura = $this->getListaObjLectura();
            $encontrado = FALSE;
            $txt = "No lo lei a ese";
            $i=0;

            while ($i<count($listaLectura) && !$encontrado){
                if ($listaLectura[$i]->getObjLibro()->getTitulo() == $titulo && $listaLectura[$i]->getTerminado()){
                    $txt = $listaLectura[$i]->getObjLibro()->getSinopsis();
                }
                $i++;
            }
            return $txt;
        }

        public function leidosAnioEdicion($x){
            $listaLibros = array();
            foreach ($this->getListaObjLectura() as $lectura){
                if ($lectura->getObjLibro()->getAnioEdicion() == $x && $lectura->getTerminado()){
                    array_push($listaLibros,$lectura->getObjLibro());
                }
            }
            return $listaLibros;
        }

        public function darLibrosPorAutor($nombreAutor){
            $listaLibros = array();
            foreach ($this->getListaObjLectura() as $lectura){
                if ($lectura->getObjLibro()->getAutor()->getNombre() == $nombreAutor && $lectura->getTerminado()){
                    array_push($listaLibros,$lectura->getObjLibro());
                }
            }
            return $listaLibros;
        }

        public function mostrarLectura(){
            $txt = "Leiste:";
            foreach ($this->getListaObjLectura() as $lectura){
                $libro = $lectura->getObjLibro();
                $txt = $txt."\n".$libro->getTitulo();
            }
            return $txt;
        }

        public function __toString()
        {
            return $this->getNombre()." ".
            $this->getApellido()." - ".
            $this->getTipoDocumento().": ".
            $this->getNumeroDocumento()."\n".
            $this->mostrarLectura();
        }

        
        
    }