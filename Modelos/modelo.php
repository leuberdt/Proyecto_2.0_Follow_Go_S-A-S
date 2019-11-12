<?php


class EnlacesPaginas {

    public function enlacesPaginasModelo($enlacesModelo) {


        if ($enlacesModelo == "inicio" ||
        $enlacesModelo == "informacionTyC" ||  
        $enlacesModelo == "informacionNosotros" ||  
        $enlacesModelo == "informacionUsuarios" ||  
        $enlacesModelo == "contactenos" ||
        $enlacesModelo == "formularioUsuario") {

            $modulo = "Vistas/modulos/".$enlacesModelo.".php";
        }


        return $modulo;

    }

}



?>