<?php
    class Banco{
        private $listaObjMostrador;

        public function __construct($lisoM)
        {
            $this->listaObjMostrador = $lisoM;
        }

        public function getListaObjMostrador(){
            return $this->listaObjMostrador;
        }

        public function setListaObjMostrador($nListOM){
            $this->listaObjMostrador = $nListOM;
        }

        public function mostradoresQueAtienden($unTramite){
            $listaAtiende = array();
            foreach ($this->getListaObjMostrador() as $mostrador){
                if ($mostrador->atiende($unTramite)){
                    array_push($listaAtiende,$mostrador);
                }
            }
            return $listaAtiende;
        }

        public function mejorMostradorPara($unTramite){
            $listaMostrador = $this->mostradoresQueAtienden($unTramite);
            $menor = FALSE;
            if ($listaMostrador){                
                $nroEspera = $listaMostrador[0]->getCapacidadActual();
            }
            foreach ($listaMostrador as $mostrador){
                if ($mostrador->getCapacidadActual() <= $nroEspera && $mostrador->getCapacidadActual() <> $mostrador->getCapacidadTotal()){
                    $menor = $mostrador;
                    $nroEspera = $menor->getCapacidadActual();
                }
            }
            return $menor;
        }

        public function atender($unCliente){
            $mejMos = $this->mejorMostradorPara($unCliente->getObjTramite()->getTipo());
            if ($mejMos){
                $lisMos = $this->getListaObjMostrador();
                $encontro = FALSE;
                $i=0;

                while ($i < count($lisMos) && !$encontro){
                    if ($lisMos[$i] === $mejMos){
                        $lisCli = $lisMos[$i]->getListaObjCliente();
                        echo $lisMos[$i]->textoCliente();
                        array_push($lisCli, $unCliente);
                        $lisMos[$i]->setListaObjCliente($lisCli);
                        $this->setListaObjMostrador($lisMos);
                        return "cargado con exito";
                    }
                    $i++;
                }
            } else {
                return "será antendido en cuanto haya lugar en un mostrador";
            }
        }

        public function __toString()
        {
            $txt = "";
            foreach ($this->getListaObjMostrador() as $indice => $mostrador){
                $i = $indice + 1;
                $txt = $txt."[Mostrador".$i."]".$mostrador."\n";
            }
            return $txt;
        }
    }
