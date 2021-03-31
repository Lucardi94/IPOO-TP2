<?php
    class Disquera{
        /***
         * Representacion de la clase disquera.
         *  - Atributos:
         *      + hora_desde
         *      + hora_hasta
         *      + estado
         *      + dirección
         *      + dueño
         *  - Funciones
         *      + dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false en caso contrario.
         *      + abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
         *      + cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
         */
        private $horaDesde;
        private $horaHasta;
        private $estado;
        private $direccion;
        private $duenio;

        public function __construct($horD, $horH, $est, $dir, $due)
        {
            $this->horaDesde = $horD;
            $this->horaHasta = $horH;
            $this->estado = $est;
            $this->direccion = $dir;
            $this->duenio = $due;
        }

        public function getHoraDesde(){
            return $this->horaDesde;
        }
        public function getHoraHasta(){
            return $this->horaHasta;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getDuenio(){
            return $this->duenio;
        }

        public function setHoraDesde($nHorD){
            $this->horaDesde = $nHorD;
        }
        public function setHoraHasta($nHorH){
            $this->horaHasta = $nHorH;
        }
        public function setEstado($nEst){
            $this->estado = $nEst;
        }
        public function setDireccion($nDir){
            $this->direccion = $nDir;
        }
        public function setDuenio($ndue){
            $this->duenio = $ndue;
        }

        public function mayorHora($hora,$minutos){
            $horD = $this->getHoraDesde();
            if (($horD["hora"] < $hora) || (($horD["hora"] == $hora) && ($horD["minuto"] < $minutos))) {
                return TRUE;
            } else return FALSE;
        }

        public function menorHora($hora,$minutos){
            $horH = $this->getHoraHasta();
            if (($horH["hora"] > $hora) || (($horH["hora"] == $hora) && ($horH["minuto"] > $minutos))) {
                return TRUE;
            } else return FALSE;
        }

        public function dentroHorarioAtencion($hora,$minutos){
            if ($this->mayorHora($hora,$minutos) && $this->menorHora($hora,$minutos)){
                return TRUE;
            } else return FALSE;
        }

        public function abrirDisquera($hora,$minutos){
            if ($this->dentroHorarioAtencion($hora,$minutos)){
                $this->setEstado(TRUE);
            }
        }

        public function cerrarDisquera($hora,$minutos){
            if (!$this->dentroHorarioAtencion($hora,$minutos)){
                $this->setEstado(FALSE);
            }
        }

        public function abiertoCerrado(){
            if ($this->getEstado()){
                return "ABIERTO";
            } else return "CERRADO";
        }

        public function __toString()
        {
            return "(Desde ".$this->getHoraDesde()["hora"].":".$this->getHoraDesde()["minuto"].
            " Hasta ".$this->getHoraHasta()["hora"].":".$this->getHoraHasta()["minuto"].
            ") Actualmente: ".$this->abiertoCerrado().
            "\n".$this->getDireccion().
            "\n".$this->getDuenio();
        }

    }