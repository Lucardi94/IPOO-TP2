<?php
    class Tramite{
        private $tipo;
        private $horaCreacion;
        private $horaResolucion;

        public function __construct($tip, $horCre, $horRes)
        {
            $this->tipo = $tip;
            $this->horaCreacion = $horCre;
            $this->horaResolucion = $horRes;
        }

        public function getTipo(){
            return $this->tipo;
        }
        public function getHoraCreacion(){
            return $this->horaCreacion;
        }
        public function getHoraResolucion(){
            return $this->horaResolucion;
        }

        public function setTipo($nTip){
            $this->tipo = $nTip;
        }
        public function setHoraCreacion($nHorC){
            $this->horaCreacion = $nHorC;
        }
        public function setHoraResolucion($nHorR){
            $this->horaResolucion = $nHorR;
        }

        public function __toString()
        {
            return "Tramite: ".$this->getTipo()." - Desde ".$this->getHoraCreacion()." Hasta ".$this->getHoraResolucion();
        }
        
    }