<?php

class MvcControlador {

    #LLamada a la plantilla
    #-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

    public function plantilla() {

        #include() se utuliza para invocar elarchivo que contiene código html.
        include "Vistas/template.php";
    }

    #    Interaccion del Usuario#-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
    public function enlacesPaginasControlador() {

        $enlacesControlador = $_GET["action"];

        #echo $enlacesControlador;

        $respuesta =  EnlacesPaginas::enlacesPaginasModelo($enlacesControlador);

        include $respuesta;

    }
}

?>