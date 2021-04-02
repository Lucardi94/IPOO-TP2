<?php
    class Libro{
        /***
         * Representacion de la clase libro.
         *  - Atributo:
         *      + SBN
         *      + titulo
         *      + año de edición
         *      + editorial
         *      + autor.
         *      + cantidadPagina
         *      + sinopsi
         *  - Funciones:
         *      + perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro una editorial y devuelve un valor verdadero/falso.
         *      + iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por parámetro ya se encuentra en dicha colección.
         *      + aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.
         *      + librodeEditoriales($arregloautor, $peditorial): método que retorna un arreglo asociativo con todos los libros publicados por la editorial dada.
         * 
         */
    
        private $sbn;
        private $titulo;
        private $anioEdicion;
        private $editorial;
        private $autor;
        private $cantidadPagina;
        private $sinopsis;

        public function __construct($s, $tit, $aEdi, $edi, $aut, $canPag, $sin) {
            $this->sbn = $s;
            $this->titulo = $tit;
            $this->anioEdicion = $aEdi;
            $this->editorial = $edi;
            $this->autor = $aut;
            $this->cantidadPagina = $canPag;
            $this->sinopsis = $sin;
        }

        public function getSbn(){
            return $this->sbn;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getAnioEdicion(){
            return $this->anioEdicion;
        }
        public function getEditorial(){
            return $this->editorial;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getCantidadPagina(){
            return $this->cantidadPagina;
        }
        public function getSinopsis(){
            return $this->sinopsis;
        }

        public function setSbn($nSbn){
            $this->sbn = $nSbn;
        }
        public function setTitulo($ntit){
            $this->titulo = $ntit;
        }
        public function setAnioEdicion($nAniE){
            $this->anioEdicion = $nAniE;
        }
        public function setEditorial($nEdi){
            $this->editorial = $nEdi;
        }
        public function setAutor($nAut){
            $this->autor = $nAut;
        }
        public function setCantidadPagina($nCanP){
            $this->cantidadPagina = $nCanP;
        }
        public function setSinopsis($nSin){
            $this->sinopsis = $nSin;
        }

        public function perteneceEditorial($peditorial){
            /***
             * Retorna un verdadero o falso si la editorial es la misma que la ingresda por parametro.
             */
            if ($this->getEditorial() == $peditorial){
                return TRUE;
            } else return FALSE;
        }

        public function iguales($plibro,$parreglo){
            /***
             * Busca en el arreglo ingresado por parametro si existe la clase ingresada por parametro en este arreglo.
             * Utiliza una busqueda parcial
             */
            $aparece = FALSE;
            $i=0;
            while ($i < count($parreglo) && !$aparece){
                $libro = $parreglo[$i];
                $i++;                
                if ($plibro === $libro){
                    $aparece = TRUE;
                }
            }
            return $aparece;
        }

        public function aniosdesdeEdicion(){
            /* Retorna la antiguedad del libro desde su primera edicion */
            return 2021 - $this->getAnioEdicion();
        }

        public function librodeEditoriales($arregloLibro, $peditorial){
            /***
             * Retorna un arreglo asosiativo con los libros ingresado por parametros que sea de la editoria ingresada por parametro
             * Lo hace atraves de una busqueda exautiva.
             */
            $listLibro = array();
            foreach ($arregloLibro as $libro){
                if ($libro->getEditorial() == $peditorial){
                    $libroMatriz = array ("sbn" => $libro->getSbn(),
                                        "titulo" => $libro->getTitulo(),
                                        "anioEdicion" => $libro->getAnioEdicion(),
                                        "editorial" => $libro->getEditorial(),
                                        "nombreAutor" => $libro->getAutor(),
                                        "cantidadPagina" => $libro->getCantidadPagina(),
                                        "sinopsis" => $libro->getSinopsis());
                    array_push($listLibro, $libroMatriz);
                }
            }
            return $listLibro;
        }

        public function __toString()
        {
            return  $this->getAnioEdicion()." - ".
                    $this->getSbn()." - ".
                    $this->getTitulo()."\n".
                    $this->getEditorial()." - ".
                    $this->getAutor()->getNombre()." ".$this->getAutor()->getApellido()." - ".
                    $this->getCantidadPagina()."\n".
                    $this->getSinopsis()."\n";
        }

        


        
    }