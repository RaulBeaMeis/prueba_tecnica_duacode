<?php
//Se hace todo el routing para controlar las llamadas a los controladores y sus funciones
    function cargarControlador($controlador){

        $nombreControlador = ucwords($controlador)."Controller";
        $archivoControlador = 'Controller/'.ucwords($nombreControlador).'.php';
        

        if(!is_file($archivoControlador)){
            $archivoControlador = 'controllers/'.CONTROLADOR_PRINCIPAL.'.php';
        }
        require_once $archivoControlador;
        $control = new $nombreControlador();
        return $control;
    }

    function cargarAccion($controller, $accion, $id_jugador = null, $id_equipo = null){

        if(isset($accion) && method_exists($controller, $accion)) {
            if($id_jugador == null && $id_equipo == null){
                $controller->$accion();
            } elseif($id_jugador != null && $id_equipo == null) {
                $controller->$accion($id_jugador);
            } elseif($id_jugador == null && $id_equipo != null) {
                $controller->$accion($id_equipo);
            } else {
                $controller->$accion($id_jugador, $id_equipo);
            }
            
        } else {
            $controller->ACCION_PRINCIPAL();
        }

    }

?>