<?php
    class Mostrador{
        private $listaTramite;
        private $listaObjCliente;
        private $capacidadTotal;
        private $capacidadActual;

        public function __construct($lisTra, $lisOC, $capT)
        {
            $this->listaTramite = $lisTra;
            $this->listaObjCliente = $lisOC;
            $this->capacidadTotal = $capT;
            $this->capacidadActual = count($lisOC);
        }

        public function getListaTramite(){
            return $this->listaTramite;
        }
        public function getListaObjCliente(){
            return $this->listaObjCliente;
        }
        public function getCapacidadTotal(){
            return $this->capacidadTotal;
        }
        public function getCapacidadActual(){
            return $this->capacidadActual;
        }

        public function setListaTramite($nLisT){
            $this->listaTramite = $nLisT;
        }
        public function setListaObjCliente($nLisOC){
            $this->listaObjCliente = $nLisOC;            
            $this->setCapacidadTotal(count($nLisOC));
        }
        public function setCapacidadTotal($nCapT){
            $this->capacidadTotal = $nCapT;
        }
        public function setCapacidadActual($nCapA){
            $this->listaTramite = $nCapA;
        }

        public function atiende($unTramite){
            $lista = $this->getListaTramite();
            $i = 0;
            $atiende = FALSE;

            while ($i<count($lista) && !$atiende){
                if ($lista[$i] == $unTramite){
                    $atiende = TRUE;
                }
                $i++;
            }
            return $atiende;
        }

        public function textoTramite(){
            $txt = "\n";
            foreach ($this->getListaTramite() as $tramite){
                $txt = $txt."                     -".$tramite."\n";
            }
            return $txt;
        }

        public function textoCliente(){
            $txt = "\n";
            foreach ($this->getListaObjCliente() as $cliente){
                $txt = $txt."                     -".$cliente->getApellido()."\n";
            }
            return $txt;
        }

        public function __toString()
        {
            return  "Tramites: ".$this->textoTramite().
                    "\n           Clientes: ".$this->textoCliente().
                    "\nCapacidad total ".$this->getCapacidadTotal()." personas".
                    "\nCapacidad actual ".$this->getCapacidadActual()." persona/s";
        }
    }