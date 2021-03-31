<?php
    class Persona{
        /***
         * Representacion de la clase Persona.
         *  - Atributos
         *      + nombre
         *      + apellido
         *      + tipoDocumento
         *      + númeroDocumento
         */
        private $nombre;
        private $apellido;
        private $tipoDocumento;
        private $numeroDocumento;

        public function __construct($nom, $ape, $tipDoc, $nroDoc )
        {
            $this->nombre = $nom;
            $this->apellido = $ape;
            $this->tipoDocumento = $tipDoc;
            $this->numeroDocumento = $nroDoc;
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

        public function __toString()
        {
            return $this->getNombre()." ".$this->getApellido()." - ".$this->getTipoDocumento().": ".$this->getNumeroDocumento();
        }

        
        
    }