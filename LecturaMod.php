<?php
    class Lectura{
        private $objLibro;
        private $paginaActual;
        private $terminado;

        public function __construct($objL, $pagAct, $ter)
        {
            $this->objLibro = $objL;
            $this->paginaActual = $pagAct;
            $this->terminado = $ter;
        }

        public function getObjLibro(){
            return $this->objLibro;
        }
        public function getPaginaActual(){
            return $this->paginaActual;
        }
        public function getTerminado(){
            return $this->terminado;
        }

        public function setObjLibro($nObjL){
            $this->objLibro = $nObjL;
        }
        public function setPaginaActual($nPagAct){
            $this->paginaActual = $nPagAct;
        }
        public function setTerminado($nTer){
            $this->terminado = $nTer;
        }

        public function margenAlFinal(){
            if ($this->getPaginaActual() < $this->getObjLibro()->getCantidadPagina()){
                return TRUE;
            } elseif ($this->getPaginaActual() == $this->getObjLibro()->getCantidadPagina()){
                $this->setTerminado(TRUE);
                return FALSE;
            }
            else return FALSE;
        }

        public function margenAlPrincipío(){
            if ($this->getPaginaActual() > 1){
                return TRUE;
            } else return FALSE;
        }

        public function siguientePagina(){
            if ($this->margenAlFinal()){
                $this->setPaginaActual($this->getPaginaActual() + 1);
            }
            return $this->getPaginaActual();
        }

        public function retrocederPagina(){
            if ($this->margenAlPrincipío()){
                $this->setPaginaActual($this->getPaginaActual() - 1);
            }
            return $this->getPaginaActual();
        }
        public function irPagina($x){
            $pagAct = $this->getPaginaActual();
            $this->setPaginaActual($x);

            if (!($this->margenAlFinal() && $this->margenAlPrincipío())){
                $this->setPaginaActual($pagAct);
            }
            return $this->getPaginaActual();
        }

        public function textoTerminado(){
            if ($this->getTerminado()){
                return "Lo Terminaste Coraje";
            } else return "Continua con la lectura";
        }

        public function __toString()
        {
            return "Libro:\n".$this->getObjLibro().
            "Pagina Actual ".$this->getPaginaActual().
            "\n".$this->textoTerminado();
            ;
        }
    }